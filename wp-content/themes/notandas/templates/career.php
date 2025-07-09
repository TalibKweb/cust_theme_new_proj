<?php

/**
 * Template Name: Career Page
 */
get_header();
?>

<!-- innerBanner -->
<section class="homeBanner">
    <div class="container-fluid p-0">
        <div class="innerSlide">
            <?php if (get_field('banner_img')): ?>
                <img src="<?php echo the_field('banner_img') ?>" class="img-fluid w-100" />
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Anchorlink Section -->
<section class="linkSection d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center links">
            <ul class="d-flex align-items-center mb-0 ps-0">
                <li><a href="#grow-with-us">Grow With Us</a></li>
                <li><a href="#join-our-team">Join Our Team</a></li>
            </ul>
            <a href="contact.html" class="cta">Reach out</a>
        </div>
    </div>
</section>


<!-- Grow With Us -->
<section id="grow-with-us" class="py-lg-5 projects overflow-hidden">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-lg-6 col-md-6 order-2 order-lg-1 order-md-1" data-aos="fade-right" data-aos-duration="1000">
                <?php if (get_field('grow_sec_img')): ?>
                    <img src="<?php echo the_field('grow_sec_img') ?>" class="img-fluid">
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-6 order-1 order-lg-2 order-md-2" data-aos="fade-left" data-aos-duration="1000">
                <div class="projectDetails px-lg-4 px-0">

                    <?php if (get_field('grow_sec_slug')): ?>
                        <h5><?php echo the_field('grow_sec_slug') ?></h5>
                    <?php endif; ?>

                    <?php if (get_field('grow_sec_title')): ?>
                        <h3><?php echo the_field('grow_sec_title') ?></h3>
                    <?php endif; ?>

                    <?php if (get_field('grow_sec_desc')): ?>
                        <p><?php echo the_field('grow_sec_desc') ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<h4>Page is Remaining!</h4>

<!-- Join Our Team -->
<section class="py-5" id="join-our-team">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto Detailpagehead text-center mb-4">

                <?php if (get_field('join_title')): ?>
                    <h2><?php echo the_field('join_title') ?></h2>
                <?php endif; ?>

                <?php if (get_field('join_desc')): ?>
                    <p><?php echo the_field('join_desc') ?></p>
                <?php endif; ?>

            </div>
            <div class="accordion" id="jobAccordion">
                <!-- Job 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <div class="accordion-button collapsed row w-auto g-3 align-items-start justify-content-between align-items-lg-center text-start" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                            <!-- Icon + Title -->
                            <div class="col-12 col-lg-4 d-flex align-items-center gap-3">
                                <div class="teamIcon flex-shrink-0">
                                    <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M34.124 1L34.6465 1.01172C37.2545 1.12729 39.7615 2.08057 41.791 3.7373C43.9557 5.50443 45.4448 7.96406 46.0078 10.7012L46.1719 11.5H49.874L50.4746 11.5156C53.4706 11.6676 56.3131 12.9244 58.4443 15.0557C60.5756 17.1869 61.8324 20.0294 61.9844 23.0254L62 23.626V49.875C61.9958 53.0895 60.7173 56.1713 58.4443 58.4443C56.1711 60.7176 53.0888 61.9961 49.874 62H13.126C9.91117 61.9961 6.82888 60.7176 4.55566 58.4443C2.42441 56.3131 1.16756 53.4706 1.01562 50.4746L1 49.874V23.626C1.00391 20.4112 2.28245 17.3289 4.55566 15.0557C6.68692 12.9244 9.52938 11.6676 12.5254 11.5156L13.126 11.5H16.8281L16.9922 10.7012C17.5552 7.96406 19.0443 5.50443 21.209 3.7373C23.2385 2.08057 25.7455 1.12729 28.3535 1.01172L28.876 1H34.124ZM4.25 49.875C4.25 52.2288 5.18522 54.486 6.84961 56.1504C8.40989 57.7107 10.4911 58.6304 12.6846 58.7393L13.125 58.75H49.875C52.2288 58.75 54.486 57.8148 56.1504 56.1504C57.8148 54.486 58.75 52.2288 58.75 49.875V35.75H33.125V39.375C33.125 39.806 32.9542 40.2197 32.6494 40.5244C32.3447 40.8292 31.931 41 31.5 41C31.069 41 30.6553 40.8292 30.3506 40.5244C30.0458 40.2197 29.875 39.806 29.875 39.375V35.75H4.25V49.875ZM13.125 14.75C10.7712 14.75 8.51399 15.6852 6.84961 17.3496C5.18522 19.014 4.25 21.2712 4.25 23.625V32.5H58.75V23.625L58.7393 23.1846C58.6304 20.9911 57.7107 18.9099 56.1504 17.3496C54.486 15.6852 52.2288 14.75 49.875 14.75H13.125ZM28.8711 4.25C27.0421 4.25758 25.2598 4.83055 23.7686 5.88965C22.2775 6.94873 21.1497 8.44266 20.54 10.167L20.0684 11.5H42.9316L42.46 10.167C41.8503 8.44266 40.7225 6.94873 39.2314 5.88965C37.8335 4.89678 36.1799 4.33087 34.4717 4.25781L34.1289 4.25H28.8711Z" fill="#DCA86A" stroke="#DCA86A" stroke-width="2" />
                                    </svg>
                                </div>
                                <h4>ACCOUNT MANAGEMENT TEAM LEADER</h4>
                            </div>

                            <!-- Location -->
                            <div class="col-12 col-sm-6 col-lg-2">
                                <div class="careerLocation">
                                    <span><strong>Location:</strong> Mumbai</span>
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="col-12 col-sm-6 col-lg-2">
                                <div class="careerLocation">
                                    <span><strong>Education:</strong> Graduate</span>
                                </div>
                            </div>

                            <!-- Experience -->
                            <div class="col-12 col-sm-6 col-lg-2">
                                <div class="careerLocation">
                                    <span><strong>Experience:</strong> 5 years</span>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-8 col-sm-6 col-lg-auto text-lg-end">
                                <button class="btn cta w-100 w-lg-auto" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#jobAccordion">
                        <div class="accordion-body">
                            <h4>FULL JOB DESCRIPTION</h4>
                            <p>At our company we are leveraging analytics and technology, as we invent for life on behalf of patients around the world. We are seeking those who have a passion for using data, analytics, and insights to drive decision making, that will allow us to tackle some of the world’s greatest health threats. Within our commercial Insights, Analytics, and Data organization we are transforming to better power decision-making across our end-to-end commercialization process, from business development to late lifecycle management.
                            </p>
                            <h4>ROLES & RESPONSIBILITIES</h4>
                            <ul>
                                <li>Understand the current QA processes, tools...</li>
                                <li>Familiarize yourself with the product architecture...</li>
                                <li>Establish relationships with cross-functional teams to understand their expectations from your group/domain</li>
                                <li>Review existing projects and documentation to assess coverage and effectiveness.</li>
                                <li>Participate in the different ceremonies. Understand their purpose. Get acquainted with our stakeholders</li>
                                <li>Shore up your knowledge on Pharmaceutical Processes around Forecasting</li>
                            </ul>
                            <h4>How to Apply</h4>
                            <p>Interested candidates can apply for this position by submitting their resume through the "Apply Now" option below. In addition to the resume, applicants are required to provide the following:</p>
                            <ul>
                                <li>List and description of the transactions that the Applicant was a part of and their specific role.</li>
                                <li>Note of specialisations and what role they can perform independently.</li>
                                <li>Current CTC (excluding bonus, if any)</li>
                                <li>Expected CTC</li>
                                <li>Notice Period</li>
                            </ul>
                            <a class="cta" data-fancybox data-src="#apply-form">Apply Now</a>
                        </div>
                    </div>
                </div>

                <!-- Job 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <div class="accordion-button row w-auto g-3 align-items-start justify-content-between align-items-lg-center text-start" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                            <!-- Icon + Title -->
                            <div class="col-12 col-lg-4 d-flex align-items-center gap-3">
                                <div class="teamIcon flex-shrink-0">
                                    <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M34.124 1L34.6465 1.01172C37.2545 1.12729 39.7615 2.08057 41.791 3.7373C43.9557 5.50443 45.4448 7.96406 46.0078 10.7012L46.1719 11.5H49.874L50.4746 11.5156C53.4706 11.6676 56.3131 12.9244 58.4443 15.0557C60.5756 17.1869 61.8324 20.0294 61.9844 23.0254L62 23.626V49.875C61.9958 53.0895 60.7173 56.1713 58.4443 58.4443C56.1711 60.7176 53.0888 61.9961 49.874 62H13.126C9.91117 61.9961 6.82888 60.7176 4.55566 58.4443C2.42441 56.3131 1.16756 53.4706 1.01562 50.4746L1 49.874V23.626C1.00391 20.4112 2.28245 17.3289 4.55566 15.0557C6.68692 12.9244 9.52938 11.6676 12.5254 11.5156L13.126 11.5H16.8281L16.9922 10.7012C17.5552 7.96406 19.0443 5.50443 21.209 3.7373C23.2385 2.08057 25.7455 1.12729 28.3535 1.01172L28.876 1H34.124ZM4.25 49.875C4.25 52.2288 5.18522 54.486 6.84961 56.1504C8.40989 57.7107 10.4911 58.6304 12.6846 58.7393L13.125 58.75H49.875C52.2288 58.75 54.486 57.8148 56.1504 56.1504C57.8148 54.486 58.75 52.2288 58.75 49.875V35.75H33.125V39.375C33.125 39.806 32.9542 40.2197 32.6494 40.5244C32.3447 40.8292 31.931 41 31.5 41C31.069 41 30.6553 40.8292 30.3506 40.5244C30.0458 40.2197 29.875 39.806 29.875 39.375V35.75H4.25V49.875ZM13.125 14.75C10.7712 14.75 8.51399 15.6852 6.84961 17.3496C5.18522 19.014 4.25 21.2712 4.25 23.625V32.5H58.75V23.625L58.7393 23.1846C58.6304 20.9911 57.7107 18.9099 56.1504 17.3496C54.486 15.6852 52.2288 14.75 49.875 14.75H13.125ZM28.8711 4.25C27.0421 4.25758 25.2598 4.83055 23.7686 5.88965C22.2775 6.94873 21.1497 8.44266 20.54 10.167L20.0684 11.5H42.9316L42.46 10.167C41.8503 8.44266 40.7225 6.94873 39.2314 5.88965C37.8335 4.89678 36.1799 4.33087 34.4717 4.25781L34.1289 4.25H28.8711Z" fill="#DCA86A" stroke="#DCA86A" stroke-width="2" />
                                    </svg>
                                </div>
                                <h4>Quality Assurance Specialist</h4>
                            </div>

                            <!-- Location -->
                            <div class="col-12 col-sm-6 col-lg-2">
                                <div class="careerLocation">
                                    <span><strong>Location:</strong> Mumbai</span>
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="col-12 col-sm-6 col-lg-2">
                                <div class="careerLocation">
                                    <span><strong>Education:</strong> Graduate</span>
                                </div>
                            </div>

                            <!-- Experience -->
                            <div class="col-12 col-sm-6 col-lg-2">
                                <div class="careerLocation">
                                    <span><strong>Experience:</strong> 5 years</span>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-8 col-sm-6 col-lg-auto text-lg-end">
                                <button class="btn cta w-100 w-lg-auto" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </h2>

                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#jobAccordion">
                        <div class="accordion-body">
                            <h4>FULL JOB DESCRIPTION</h4>
                            <p>At our company we are leveraging analytics and technology, as we invent for life on behalf of patients around the world. We are seeking those who have a passion for using data, analytics, and insights to drive decision making, that will allow us to tackle some of the world’s greatest health threats. Within our commercial Insights, Analytics, and Data organization we are transforming to better power decision-making across our end-to-end commercialization process, from business development to late lifecycle management.
                            </p>
                            <h4>ROLES & RESPONSIBILITIES</h4>
                            <ul>
                                <li>Understand the current QA processes, tools...</li>
                                <li>Familiarize yourself with the product architecture...</li>
                                <li>Establish relationships with cross-functional teams to understand their expectations from your group/domain</li>
                                <li>Review existing projects and documentation to assess coverage and effectiveness.</li>
                                <li>Participate in the different ceremonies. Understand their purpose. Get acquainted with our stakeholders</li>
                                <li>Shore up your knowledge on Pharmaceutical Processes around Forecasting</li>
                            </ul>
                            <h4>How to Apply</h4>
                            <p>Interested candidates can apply for this position by submitting their resume through the "Apply Now" option below. In addition to the resume, applicants are required to provide the following:</p>
                            <ul>
                                <li>List and description of the transactions that the Applicant was a part of and their specific role.</li>
                                <li>Note of specialisations and what role they can perform independently.</li>
                                <li>Current CTC (excluding bonus, if any)</li>
                                <li>Expected CTC</li>
                                <li>Notice Period</li>
                            </ul>
                            <a class="cta" data-fancybox data-src="#apply-form">Apply Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Apply form -->
<div class="applyForm" id="apply-form">
    <form action="" method="POST" class="contactForm">
        <h4 class="mb-4 text-center"><strong>Apply for the Position</strong></h4>
        <div class="py-2"><input type="text" placeholder="NAME" /></div>
        <div class="py-2"><input type="email" placeholder="EMAIL" /></div>
        <div class="py-2"><input type="number" placeholder="MOBILE" /></div>
        <div class="py-2"><input type="text" placeholder="Current Employer" /></div>
        <div class="py-2"><input type="text" placeholder="Current Title" /></div>
        <div class="py-2">
            <select name="Total Years of Experience" id="Experience" required>
                <option value="" disabled selected hidden>Total Years of Experience</option>
                <option value="1">1</option>
                <option value="2-5">2-5</option>
                <option value="6-10">6-10</option>
                <option value="10-15">10-15</option>
                <option value="15+">15+</option>
            </select>
        </div>

        <div class="py-2">
            <select name="Notice Period" id="Notice" required>
                <option value="" disabled selected hidden>Notice Period</option>
                <option value="1 Month">1 Month</option>
                <option value="2 Month">2 Month</option>
                <option value="3+ Months">3+ Months</option>
            </select>
        </div>
        <div class="py-2 position-relative">
            <input type="file" name="resume" id="resume" class="form-control d-none">

            <label for="resume" class="custom-file-label w-100 text-start">
                <span id="file-placeholder" class="fileResume">Upload Resume</span>
                <span class="float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 31 31" fill="none">
                        <path d="M15.247 21.5978V5.08184" stroke="#DCA86A" stroke-width="2" stroke-linecap="round" />
                        <path d="M8.89453 10.1637L15.2468 3.81137L21.5991 10.1637" stroke="#DCA86A" stroke-width="2" stroke-linecap="round" />
                        <path d="M25.4094 26.6796H5.08203" stroke="#DCA86A" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </span>
            </label>
            <h6>Resume * [ File types : .pdf, .docx, .doc | File size : up to 5 MB ]</h6>
        </div>

        <div class="py-2 text-center"><button class="cta mx-auto">Submit</button></div>
    </form>
</div>


<!-- Line -->
<section>
    <div class="container">
        <div class="line"></div>
    </div>
</section>

<?php echo get_template_directory_uri(); ?>
hello world

<?php
get_footer();
?>