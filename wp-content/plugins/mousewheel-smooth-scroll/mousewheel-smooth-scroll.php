<?php
/*
	Plugin Name: MouseWheel Smooth Scroll
	Plugin URI: https://kubiq.sk
	Description: MouseWheel smooth scrolling for your WordPress website
	Version: 6.7.2
	Author: KubiQ
	Author URI: https://kubiq.sk
	Text Domain: wpmss
	Domain Path: /languages
*/

class wpmss{

	var $settings;
	var $uploads;

	function __construct(){
		add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ] );
		add_action( 'admin_menu', [ $this, 'plugin_menu_link' ] );
		add_action( 'init', [ $this, 'plugin_init' ] );
	}

	function plugins_loaded(){
		load_plugin_textdomain( 'wpmss', FALSE, basename( __DIR__ ) . '/languages/' );
	}

	function filter_plugin_actions( $links, $file ){
		$settings_link = '<a href="options-general.php?page=' . basename( __FILE__ ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}

	function plugin_menu_link(){
		add_submenu_page(
			'options-general.php',
			__( 'Smooth Scroll', 'wpmss' ),
			__( 'Smooth Scroll', 'wpmss' ),
			'manage_options',
			basename( __FILE__ ),
			[ $this, 'admin_options_page' ]
		);
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [ $this, 'filter_plugin_actions' ], 10, 2 );
	}

	function plugin_init(){
		$this->settings = get_option( 'wpmss_settings', [] );
		if( ! isset( $this->settings['general']['timestamp'] ) ){
			$this->settings['js_library'] = 'darkroomengineering';
			$this->settings['general']['timestamp'] = time();
			$this->settings['general']['pulseAlgorithm'] = 1;
			$this->settings['general']['keyboardSupport'] = 1;
			update_option( 'wpmss_settings', $this->settings );
		}else{
			if( ! isset( $this->settings['js_library'] ) ){
				$this->settings['js_library'] = 'gblazex';
			}
		}

		$this->uploads = wp_get_upload_dir();

		$this->process_settings();

		add_action( 'wp_enqueue_scripts', [ $this, 'plugin_scripts_load' ] );
	}

	function process_settings(){
		$unsanitized_settings = $this->settings;
		$this->settings = [
			'js_library' => '',
			'general' => [],
			'lenis' => [],
		];

		if( empty( $unsanitized_settings['js_library'] ) ){
			$this->settings['js_library'] = 'darkroomengineering';
		}else{
			$this->settings['js_library'] = in_array( $unsanitized_settings['js_library'], [ 'gblazex', 'darkroomengineering' ] ) ? $unsanitized_settings['js_library'] : 'darkroomengineering';
		}
		
		$this->settings['general']['timestamp'] = empty( $unsanitized_settings['general']['timestamp'] ) ? time() : intval( $unsanitized_settings['general']['timestamp'] );

		$this->settings['lenis']['lerp'] = empty( $unsanitized_settings['lenis']['lerp'] ) ? 0.1 : floatval( $unsanitized_settings['lenis']['lerp'] );
		$this->settings['lenis']['duration'] = empty( $unsanitized_settings['lenis']['duration'] ) ? 1.2 : floatval( $unsanitized_settings['lenis']['duration'] );
		$this->settings['lenis']['wheelMultiplier'] = empty( $unsanitized_settings['lenis']['wheelMultiplier'] ) ? 1 : floatval( $unsanitized_settings['lenis']['wheelMultiplier'] );
		$this->settings['lenis']['easing'] = empty( $unsanitized_settings['lenis']['easing'] ) ? 'Math.min(1,1.001-Math.pow(2,-10*x))' : sanitize_text_field( $unsanitized_settings['lenis']['easing'] );

		$this->settings['general']['frameRate'] = empty( $unsanitized_settings['general']['frameRate'] ) ? 150 : intval( $unsanitized_settings['general']['frameRate'] );
		$this->settings['general']['animationTime'] = empty( $unsanitized_settings['general']['animationTime'] ) ? 1000 : intval( $unsanitized_settings['general']['animationTime'] );
		$this->settings['general']['stepSize'] = empty( $unsanitized_settings['general']['stepSize'] ) ? 100 : intval( $unsanitized_settings['general']['stepSize'] );
		$this->settings['general']['pulseAlgorithm'] = empty( $unsanitized_settings['general']['pulseAlgorithm'] ) ? 0 : intval( $unsanitized_settings['general']['pulseAlgorithm'] );
		$this->settings['general']['pulseScale'] = empty( $unsanitized_settings['general']['pulseScale'] ) ? 4 : intval( $unsanitized_settings['general']['pulseScale'] );
		$this->settings['general']['pulseNormalize'] = empty( $unsanitized_settings['general']['pulseNormalize'] ) ? 1 : intval( $unsanitized_settings['general']['pulseNormalize'] );
		$this->settings['general']['accelerationDelta'] = empty( $unsanitized_settings['general']['accelerationDelta'] ) ? 50 : intval( $unsanitized_settings['general']['accelerationDelta'] );
		$this->settings['general']['accelerationMax'] = empty( $unsanitized_settings['general']['accelerationMax'] ) ? 3 : intval( $unsanitized_settings['general']['accelerationMax'] );
		$this->settings['general']['keyboardSupport'] = empty( $unsanitized_settings['general']['keyboardSupport'] ) ? 0 : intval( $unsanitized_settings['general']['keyboardSupport'] );
		$this->settings['general']['arrowScroll'] = empty( $unsanitized_settings['general']['arrowScroll'] ) ? 50 : intval( $unsanitized_settings['general']['arrowScroll'] );
		$this->settings['general']['allowedBrowsers'] = empty( $unsanitized_settings['general']['allowedBrowsers'] ) ? [ 'IEWin7', 'Chrome', 'Safari' ] : array_intersect( [ 'Mobile', 'IEWin7', 'Edge', 'Chrome', 'Safari', 'Firefox', 'other' ], $unsanitized_settings['general']['allowedBrowsers'] );

		if(
			( $this->settings['js_library'] == 'gblazex' && ! file_exists( $this->uploads['basedir'] . '/wpmss/wpmss.min.js' ) )
			|| ( $this->settings['js_library'] == 'darkroomengineering' && ! file_exists( $this->uploads['basedir'] . '/wpmss/lenis-init.min.js' ) )
		){
			$this->save_js_config();
		}
	}

	function plugin_scripts_load(){
		switch( $this->settings['js_library'] ){
			case 'darkroomengineering':
				wp_enqueue_script( 'lenis', plugins_url( 'js/lenis.min.js', __FILE__ ), [], '1.1.19', 1 );
				wp_enqueue_script( 'lenis-init', $this->uploads['baseurl'] . '/wpmss/lenis-init.min.js', ['lenis'], $this->settings['general']['timestamp'], 1 );
				break;
			case 'gblazex':
				wp_enqueue_script( 'wpmssab', $this->uploads['baseurl'] . '/wpmss/wpmssab.min.js', [], $this->settings['general']['timestamp'], 1 );
				wp_enqueue_script( 'SmoothScroll', plugins_url( 'js/SmoothScroll.min.js', __FILE__ ), ['wpmssab'], '1.5.1', 1 );
				wp_enqueue_script( 'wpmss', $this->uploads['baseurl'] . '/wpmss/wpmss.min.js', ['SmoothScroll'], $this->settings['general']['timestamp'], 1 );
				break;
		}
	}

	function plugin_admin_tabs( $current = 'general' ){
		$tabs = [ 'general' => __('General'), 'info' => __('Help') ]; ?>
		<h2 class="nav-tab-wrapper">
		<?php foreach( $tabs as $tab => $name ){ ?>
			<a class="nav-tab <?php echo ( $tab == $current ) ? "nav-tab-active" : "" ?>" href="?page=<?php echo basename( __FILE__ ) ?>&amp;tab=<?php echo $tab ?>"><?php echo $name ?></a>
		<?php } ?>
		</h2><br><?php
	}

	function save_js_config(){
		if( ! file_exists( $this->uploads['basedir'] . '/wpmss' ) ){
			mkdir( $this->uploads['basedir'] . '/wpmss', 0777, true );
		}

		if( $this->settings['js_library'] == 'darkroomengineering' ){
			$content = sprintf(
				'window.lenisInstance=new Lenis({' . 
					'autoRaf:true,' . 
					'lerp:%s,' . 
					'duration:%s,' . 
					'wheelMultiplier:%s,' . 
					'easing:x=>%s' . 
				'})',
				floatval( $this->settings['lenis']['lerp'] ),
				floatval( $this->settings['lenis']['duration'] ),
				floatval( $this->settings['lenis']['wheelMultiplier'] ),
				esc_html( $this->settings['lenis']['easing'] ),
			);
			file_put_contents( $this->uploads['basedir'] . '/wpmss/lenis-init.min.js', $content );
		}

		if( $this->settings['js_library'] == 'gblazex' ){
			$allowedBrowsers = sprintf(
				'var allowedBrowsers=["%s"];',
				implode( '","', $this->settings['general']['allowedBrowsers'] )
			);
			file_put_contents( $this->uploads['basedir'] . '/wpmss/wpmssab.min.js', $allowedBrowsers );

			$content = sprintf(
				'SmoothScroll({'.
					'frameRate:%d,'.
					'animationTime:%d,'.
					'stepSize:%d,'.
					'pulseAlgorithm:%d,'.
					'pulseScale:%d,'.
					'pulseNormalize:%d,'.
					'accelerationDelta:%d,'.
					'accelerationMax:%d,'.
					'keyboardSupport:%d,'.
					'arrowScroll:%d,'.
				'})',
				intval( $this->settings['general']['frameRate'] ),
				intval( $this->settings['general']['animationTime'] ),
				intval( $this->settings['general']['stepSize'] ),
				intval( $this->settings['general']['pulseAlgorithm'] ),
				intval( $this->settings['general']['pulseScale'] ),
				intval( $this->settings['general']['pulseNormalize'] ),
				intval( $this->settings['general']['accelerationDelta'] ),
				intval( $this->settings['general']['accelerationMax'] ),
				intval( $this->settings['general']['keyboardSupport'] ),
				intval( $this->settings['general']['arrowScroll'] )
			);
			file_put_contents( $this->uploads['basedir'] . '/wpmss/wpmss.min.js', $content );
		}
	}

	function admin_options_page(){
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
		if( ! empty( $_POST['wpmss_nonce'] ) && check_admin_referer( 'wpmss_data', 'wpmss_nonce' ) ){
			$this->settings = $_POST;
			$this->process_settings();
			update_option( 'wpmss_settings', $this->settings );
			$this->save_js_config();
		} ?>
		<div class="wrap">
			<h2><?php _e( 'MouseWheel Smooth Scroll', 'wpmss' ); ?></h2>
			<?php if( isset( $_POST['wpmss_nonce'] ) ) echo '<div id="message" class="below-h2 updated"><p>' . __('Settings saved.') . '</p></div>' ?>
			<form method="post" action="<?php admin_url( 'options-general.php?page=' . basename( __FILE__ ) ) ?>"><?php
				wp_nonce_field( 'wpmss_data', 'wpmss_nonce' );
				$this->plugin_admin_tabs( $tab );
				switch( $tab ):
					case 'general':
						$this->plugin_general_options();
						break;
					case 'info':
						$this->plugin_info_options();
						break;
				endswitch; ?>
			</form>
		</div><?php
	}

	function plugin_general_options(){ ?>
		<style>.default{color:#a0a5aa}</style>
		<input type="hidden" name="general[timestamp]" value="<?php echo time() ?>">
		<table class="form-table">
			<tr>
				<th colspan="2">
					<h3><?php _e( 'Scrolling JS library script', 'wpmss' ) ?></h3>
				</th>
			</tr>
			<tr>
				<th>
					<label for="q_field_0"><?php _e( 'JS library', 'wpmss' ) ?>:</label> 
				</th>
				<td>
					<select name="js_library" id="q_field_0">
						<option value="darkroomengineering" <?php selected( $this->settings['js_library'], 'darkroomengineering' ) ?>>LENIS from darkroomengineering</option>
						<option value="gblazex" <?php selected( $this->settings['js_library'], 'gblazex' ) ?>>SmoothScroll from gblazex</option>
					</select>
				</td>
			</tr>


			<tr class="library-visibility darkroomengineering">
				<th colspan="2">
					<?php printf( __( '%sClick here%s to read more about these settings in the GitHub readme.', 'wpmss' ), '<a href="https://github.com/darkroomengineering/lenis?tab=readme-ov-file#instance-settings" target="_blank">', '</a>' ) ?><br>
					<?php _e( 'If you need more settings in here, just let me know ;)', 'wpmss' ) ?>
				</th>
			</tr>
			<tr class="library-visibility darkroomengineering">
				<th>
					<label for="lenis_1">lerp:<br><small style="font-weight:400"><?php _e( 'Linear interpolation intensity', 'wpmss' ) ?><br><?php _e( '(between 0 and 1)', 'wpmss' ) ?></small></label> 
				</th>
				<td>
					<input type="number" name="lenis[lerp]" placeholder="0.1" min="0" max="1" step="0.1" value="<?php echo $this->settings['lenis']['lerp'] ?>" id="lenis_1">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 0.1</small>
				</td>
			</tr>
			<tr class="library-visibility darkroomengineering">
				<th>
					<label for="lenis_2">duration:<br><small style="font-weight:400"><?php _e( 'The duration of scroll animation', 'wpmss' ) ?></small></label> 
				</th>
				<td>
					<input type="number" name="lenis[duration]" placeholder="1.2" step="0.1" value="<?php echo $this->settings['lenis']['duration'] ?>" id="lenis_2"> s
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 1.2</small>
				</td>
			</tr>
			<tr class="library-visibility darkroomengineering">
				<th>
					<label for="lenis_3">wheelMultiplier:<br><small style="font-weight:400"><?php _e( 'The multiplier to use for mouse wheel events', 'wpmss' ) ?></small></label> 
				</th>
				<td>
					<input type="number" name="lenis[wheelMultiplier]" placeholder="1" value="<?php echo $this->settings['lenis']['wheelMultiplier'] ?>" id="lenis_3">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 1</small>
				</td>
			</tr>
			<tr class="library-visibility darkroomengineering">
				<th>
					<label for="lenis_4">easing:<br><small style="font-weight:400"><?php _e( 'The easing function to use for the scroll animation.', 'wpmss' ) ?><br><?php printf( __( 'You can pick one from %sEasings.net%s', 'wpmss' ), '<a href="https://easings.net" target="_blank">', '</a>' ) ?></small></label> 
				</th>
				<td>
					<input type="text" name="lenis[easing]" placeholder="Math.min(1,1.001-Math.pow(2,-10*x))" value="<?php echo $this->settings['lenis']['easing'] ?>" id="lenis_4" style="width:260px">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> Math.min(1,1.001-Math.pow(2,-10*x))</small>
				</td>
			</tr>


			<tr class="library-visibility gblazex">
				<th colspan="2">
					<h3><?php _e( 'Scrolling Core', 'wpmss' ) ?></h3>
				</th>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_1">frameRate:</label> 
				</th>
				<td>
					<input type="number" name="general[frameRate]" placeholder="150" value="<?php echo $this->settings['general']['frameRate'] ?>" id="q_field_1">
					[Hz]&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 150</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_2">animationTime:</label> 
				</th>
				<td>
					<input type="number" name="general[animationTime]" placeholder="1000" value="<?php echo $this->settings['general']['animationTime'] ?>" id="q_field_2">
					[ms]&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 1000</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_3">stepSize:</label> 
				</th>
				<td>
					<input type="number" name="general[stepSize]" placeholder="100" value="<?php echo $this->settings['general']['stepSize'] ?>" id="q_field_3">
					[px]&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 100</small>
				</td>
			</tr>

			<tr class="library-visibility gblazex">
				<th colspan="2">
					<h3><?php _e( 'Pulse (less tweakable)<br>ratio of "tail" to "acceleration"', 'wpmss' ) ?></h3>
				</th>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_35">pulseAlgorithm:</label> 
				</th>
				<td>
					<input type="hidden" name="general[pulseAlgorithm]" value="0">
					<input type="checkbox" name="general[pulseAlgorithm]" value="1" <?php echo $this->settings['general']['pulseAlgorithm'] ? 'checked="checked"' : '' ?> id="q_field_35">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> on</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_4">pulseScale:</label> 
				</th>
				<td>
					<input type="number" name="general[pulseScale]" placeholder="4" value="<?php echo $this->settings['general']['pulseScale'] ?>" id="q_field_4">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 4</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_5">pulseNormalize:</label> 
				</th>
				<td>
					<input type="number" name="general[pulseNormalize]" placeholder="1" value="<?php echo $this->settings['general']['pulseNormalize'] ?>" id="q_field_5">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 1</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th colspan="2">
					<h3><?php _e( 'Acceleration', 'wpmss' ) ?></h3>
				</th>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_6">accelerationDelta:</label> 
				</th>
				<td>
					<input type="number" name="general[accelerationDelta]" placeholder="50" value="<?php echo $this->settings['general']['accelerationDelta'] ?>" id="q_field_6">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 50</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_7">accelerationMax:</label> 
				</th>
				<td>
					<input type="number" name="general[accelerationMax]" placeholder="3" value="<?php echo $this->settings['general']['accelerationMax'] ?>" id="q_field_7">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 3</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th colspan="2">
					<h3><?php _e( 'Keyboard Settings', 'wpmss' ) ?></h3>
				</th>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_75">keyboardSupport:</label> 
				</th>
				<td>
					<input type="hidden" name="general[keyboardSupport]" value="0">
					<input type="checkbox" name="general[keyboardSupport]" value="1" <?php echo $this->settings['general']['keyboardSupport'] ? 'checked="checked"' : '' ?> id="q_field_75">
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> on</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_8">arrowScroll:</label> 
				</th>
				<td>
					<input type="number" name="general[arrowScroll]" placeholder="50" value="<?php echo $this->settings['general']['arrowScroll'] ?>" id="q_field_8">
					[px]&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> 50</small>
				</td>
			</tr>
			<tr class="library-visibility gblazex">
				<th colspan="2">
					<h3><?php _e( 'Other', 'wpmss' ) ?></h3>
				</th>
			</tr>
			<tr class="library-visibility gblazex">
				<th>
					<label for="q_field_11">allowedBrowsers:</label> 
				</th>
				<td>
					<select name="general[allowedBrowsers][]" id="q_field_11" multiple="multiple" style="height:150px">
						<?php foreach([
							'Mobile' => 'mobile browsers',
							'IEWin7' => 'IEWin7',
							'Edge' => 'Edge',
							'Chrome' => 'Chrome',
							'Safari' => 'Safari',
							'Firefox' => 'Firefox',
							'other' => 'all other browsers',
						] as $key => $value ){
							echo '<option value="' . $key . '"' . ( in_array( $key, $this->settings['general']['allowedBrowsers'] ) ? ' selected="selected"' : '' ) . '>' . $value . '</option>';
						} ?>
					</select>
					&emsp;<small class="default"><?php _e( 'default:', 'wpmss' ) ?> IEWin7, Chrome, Safari</small>
				</td>
			</tr>
		</table>
		<p class="submit"><input type="submit" class="button button-primary button-large" value="<?php _e('Save') ?>"></p>
		<style>.library-visibility{display:none}</style>
		<style id="library-visibility-css">.library-visibility.<?php echo $this->settings['js_library'] ?>{display:table-row}</style>
		<script>
		const js_library_select = document.querySelector('select[name=js_library]');
		js_library_select.addEventListener( 'change', () => document.querySelector('#library-visibility-css').innerHTML = `.library-visibility.${ js_library_select.value }{display:table-row}`, true );
		</script><?php
	}

	function plugin_info_options(){ ?>
		<div style="max-width:580px">
			<p><?php _e( 'This plugin is just a WordPress implementation of various JS smooth scroll library scripts.', 'wpmss' ) ?></p>
			<ul>
				<li>1. <a href="https://github.com/gblazex/smoothscroll-for-websites" target="_blank">SmoothScroll from gblazex</a></li>
				<li>2. <a href="https://github.com/darkroomengineering/lenis" target="_blank">LENIS from darkroomengineering</a></li>
			</ul>
			<p><?php _e( 'You can find many answers or discussions in their GIT repositories.', 'wpmss' ) ?></p>
		</div><?php
	}
}

$wpmss = new wpmss();