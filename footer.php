<footer class="py-5">
    <div class="container">
        <div class="row">
            <!-- Site information and contact details -->
            <div class="col-12 col-lg-4">
                <div class="info mb-4">
                    <a class="text-decoration-none text-white fs-2 fw-bold" href="<?php echo home_url(); ?>"><?php bloginfo("name") ?></a>
                    <ul class="info-contact list-unstyled lh-lg my-2">
                        <li><i class="fa-solid fa-house mt-2 pe-3"></i>(Alacant), Alicante 03001 Spain</li>
                        <li><i class="fa-solid fa-phone mt-2 pe-3"></i>+34 604 9x 5x</li>
                        <li><i class="fa-solid fa-envelope mt-2 pe-3"></i>info@example.com</li>
                    </ul>
                    <ul class="social-icons list-unstyled d-flex flex-wrap gap-3 mt-3">
                        <li><a href="#"> <i class="fa-brands fa-facebook fs-4"></i> </a></li>
                        <li><a href="#"> <i class="fa-brands fa-twitter fs-4"></i> </a></li>
                        <li><a href="#"> <i class="fa-brands fa-instagram fs-4"></i> </a></li>
                        <li><a href="#"> <i class="fa-brands fa-youtube fs-4"></i> </a></li>
                    </ul>
                </div>
            </div>
            <!-- Navigation links for exploring the site -->
            <div class="col-6 col-lg-2">
                <div class="links mb-4">
                    <h4>Explore</h4>
                    <ul class="list-unstyled lh-lg">
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="<?php echo home_url('/about'); ?>">About Us</a></li>
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="<?php echo get_post_type_archive_link('course'); ?>">Courses</a></li>
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="#">Find Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- Navigation links for exploring the site -->
            <div class="col-6 col-lg-2">
                <div class="links mb-4">
                    <h4>Resources</h4>
                    <ul class="list-unstyled lh-lg">
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="#">FAQs</a></li>
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="#">Legal</a></li>
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="<?php echo home_url('/privacy'); ?>">Privacy</a></li>
                        <li><i class="fa-solid fa-arrow-right"></i> <a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- Working days and hours -->
            <div class="col-12 col-lg-4">
                <div class="work-day mb-4">
                    <h4>Working Day & time</h4>
                    <ul class="list-unstyled mt-3 lh-lg">
                        <li><span>Mon - Tues:</span>8.00 am - 11.00 pm</li>
                        <li><span>Wed - Thur:</span>8.00 am - 6.00 pm</li>
                        <li><span>Friday:</span>3.00 pm - 8.00 pm</li>
                        <li><span>Sunday:</span>Closed</li>
                    </ul>
                </div>
            </div>
            <!-- Copyright notice -->
            <div class="text-center">
                <hr>
                Copyright &copy; <?php echo date('Y') ?> <strong><span><?php bloginfo("name") ?></span></strong>. All Rights Reserved
            </div>
        </div>
</footer>

<?php wp_footer() ?>
</body>

</html>