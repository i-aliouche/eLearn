<?php get_header() ?>

<?php
// Check if there are posts to display
if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display the page banner
        page_banner() ?>
        <!-- Container for teacher profile -->
        <div class="container">
            <div class="row py-3 mt-4">
                <div class="col-lg-4">
                    <div class="teach-thumb mt-5 mb-3 mb-lg-0">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="Teacher Thumbnail">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="teach-info px-4">
                        <div class="teach-content">
                            <h3 class="fw-bold mt-4"><?php the_title() ?></h3>
                            <h6 class="mt-2 mb-3"><?php echo get_field('teacher_profession') ?></h6>
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
            <h3 class="fw-bold py-2 px-0">Course(s) instructed</h3>
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