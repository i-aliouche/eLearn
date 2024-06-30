<?php get_header() ?>

<?php
// Check if there are posts to display
if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display the page banner
        page_banner() ?>
        <!-- Container for event content -->
        <div class="container position-relative">
            <div class="metabox single-pos">
                <p>
                    <a class="text-decoration-none text-white p-2" href="<?php echo get_post_type_archive_link('event'); ?>">
                        <i class="fa-solid fa-house text-white pe-2"></i>Events Home</a>
                    <span class=" text-decoration-none text-white-50 p-2"><?php the_title() ?></span>
                </p>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="py-3 mt-5">
                        <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                    </div>
                    <div class="post-info">
                        <div class="post-content">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
// Fetch related courses
$relatedcourses = get_post_field('related_courses');
if ($relatedcourses) {
    ?>
    <!-- Container for related courses -->
    <div class="container my-5">
        <div class="row border-top pt-2">
            <h3 class="fw-bold py-2 px-0">Related courses</h3>
            <?php
            // Check if related courses is an array
            if (is_array($relatedcourses)) {
                foreach ($relatedcourses as $course) { ?>
                    <div class="col-12 my-2">
                        <div>
                            <a class="btn btn-1" href="<?php echo get_the_permalink($course); ?>">
                                <?php echo get_the_title($course) ?></a>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

<?php }
get_footer() ?>