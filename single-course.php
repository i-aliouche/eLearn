<?php get_header() ?>

<?php
// Check if there are posts to display
if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display the page banner
        page_banner() ?>
        <!-- Container for course content -->
        <div class="container position-relative">
            <!-- Breadcrumb navigation for course -->
            <div class="metabox single-pos">
                <p>
                    <a class="text-decoration-none text-white p-2" href="<?php echo get_post_type_archive_link('course'); ?>">
                        <i class="fa-solid fa-house text-white pe-2"></i>All courses</a>
                    <span class=" text-decoration-none text-white-50 p-2"><?php the_title() ?></span>
                </p>
            </div>
            <div class="row">
                <div class="col-lg-8 my-5">
                    <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                    <?php the_content() ?>
                </div>
            </div>
        </div>
<?php
    }
} ?>
<!-- Container for related teachers and upcoming events -->
<div class="container">
    <?php
    // Query for related teachers
    $relatedProfsArr = array(
        'post_type'         => 'teacher', // Fetch 'teacher' post type
        'order'             => 'ASC', // Sort in ascending order
        'orderby'           => 'title', // Sort by title
        'meta_query'        => array(
            array(
                'key'       => 'related_courses', // Filter by related courses
                'compare'   => 'LIKE', // Use LIKE to find matches within serialized arrays
                'value'     => '"' . get_the_ID() . '"', //wrapping the ID of the course in quotes ensures it matches the format stored in the database
            )
        )
    );
    $relatedProfs = new WP_Query($relatedProfsArr);
    // Check if there are related teachers to display
    if ($relatedProfs->have_posts()) { ?>
        <!-- Section for related teachers -->
        <div>
            <h3 class="fw-bold border-top pt-3 pb-2"><?php the_title() ?> Teacher(s)</h3>
        </div>
        <div class="row">
            <?php while ($relatedProfs->have_posts()) {
                $relatedProfs->the_post(); ?>
                <div class="col-sm-6 col-md-6 col-lg-4 mt-2 mb-5">
                    <div class="card" style="max-width: 250px;">
                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title fw-bold"><?php the_title() ?></h4>
                            <p class="card-text text-black-50"><?php echo wp_trim_words(get_the_content(), 10, '...') ?></p>
                            <a href="<?php the_permalink() ?>" class="btn btn-1">Read More</a>
                        </div>
                    </div>
                </div>
        </div>
    <?php }
        }
        // Reset post data
        wp_reset_postdata();
        // Query for upcoming events related to the course
        $today = date('Ymd');
        $comingEventsArr = array(
            'post_type'         => 'event', // Fetch 'event' post type
            'meta_key'          => 'event_date', // Use 'event_date' custom field for sorting
            'order'             => 'ASC', // Sort in ascending order
            'orderby'           => 'meta_value_num', // Sort by numeric value of 'event_date'
            'meta_query'        => array(
                array(
                    'key'       => 'event_date', // Filter by 'event_date'
                    'compare'   => '>=', // Show dates greater than or equal to today
                    'value'     => $today, // Today's date for comparison
                    'meta_type' => 'NUMERIC' // Specify that 'event_date' is a numeric value
                ),
                array(
                    'key'       => 'related_courses', // Filter by related courses
                    'compare'   => 'LIKE', // Use LIKE to find matches within serialized arrays
                    'value'     => '"' . get_the_ID() . '"', // The ID of the current course, wrapped in quotes
                )
            )
        );
        $comingEvents = new WP_Query($comingEventsArr);
        // Check if there are upcoming events to display
        if ($comingEvents->have_posts()) { ?>
    <!-- Section for upcoming events -->
    <div>
        <h3 class="fw-bold border-top pt-3 pb-2">Upcoming <?php the_title() ?> Events</h3>
    </div>
    <div class="row mb-5">
    <?php while ($comingEvents->have_posts()) {
                $comingEvents->the_post();
                // Get the event template part
                get_template_part('template-parts/event', 'template');
            }
        } ?>
    </div>

</div>
<?php get_footer() ?>