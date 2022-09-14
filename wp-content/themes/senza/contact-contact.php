<?php  
//Template Name:contact
get_header(); ?>

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-5">
            <h1> <i class="fa-solid fa-mobile-screen text-secondary"></i></h1>


            <div class="d-flex">
                <h5>Phone no:</h5>
                <?php the_field('phone_numaber_1',66); ?>

            </div>

            <div class="d-flex">
                <h5>website link :</h5>
                <a href="mailto:<?php the_field('website_link',66); ?>" class="text-info" target="blank"></a>
                <?php the_field('website_link',66); ?>
            </div>

            <div class="d-flex">
                <h5>Email:</h5>
                <a href="mailto:<?php the_field('email',66); ?>"></a>
                <?php the_field('email',66);  ?>
            </div>

            <div class="d-flex">

            </div>

        </div>

        <div class="col-lg-3">
            <h1><i class="fa-solid fa-location-dot text-secondary"></i></h1>
            <h5>address:</h5>
            <?php the_field('address',66); ?>
        </div>
    </div>
</div>


<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center pb-2">
            <h6 class="text-uppercase">Contact Us</h6>
            <h1 class="mb-4">Contact For Any Query</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="form-row">
                            <div class="col-sm-6 control-group">
                                <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-sm-6 control-group">
                                <input type="email" class="form-control p-4" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div>
                            <button class="btn btn-primary btn-block" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-6" style="min-height: 400px;">
                <div class="position-relative h-100 rounded overflow-hidden">
                    <iframe style="width: 100%; height: 100%; object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3127.909296035494!2d72.7840613429969!3d21.202803132956973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d9b131ca2b7%3A0x9b1bed2fdd65d931!2sSenza%20Park!5e0!3m2!1sen!2sin!4v1657109545887!5m2!1sen!2sin"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<?php   get_footer(); ?>