<?php get_header();

// Display a banner with a title and subtitle
page_banner(array(
    'title'     => 'Past Events',
    'subtitle'  => 'Recollection of Past Events!'
))
?>
<!-- Section for displaying past events -->
<section class="blog-cards my-5">
    <div class="container">
        <div class="row">
            <?php
            $today = date('Ymd');
            $pastEventsArr = array(
                'paged'             => get_query_var('paged', 1), // Handle pagination
                'post_type'         => 'event', // Fetch 'event' post type
                'meta_key'          => 'event_date', // Use 'event_date' custom field
                'order'             => 'ASC', // Sort in ascending order
                'orderby'           => 'meta_value_num',  // Sort by numeric value
                'meta_query'        => array(
                    array(
                        'key'       => 'event_date', // Filter by 'event_date'
                        'compare'   => '<', // Show dates less than today
                        'value'     => $today, // Today's date
                        'meta_type' => 'NUMERIC' // Specify that 'event_date' is a numeric value
                    )
                )
            );
            $pastEvents = new WP_Query($pastEventsArr);
            // Check if there are past events to display
            if ($pastEvents->have_posts()) {
                while ($pastEvents->have_posts()) {
                    $pastEvents->the_post();
                    get_template_part('template-parts/event', 'template');
                }
            } ?>
        </div>
        <!-- Pagination for past events -->
        <?php
        echo numbering_pagination($pastEvents);
        ?>
    </div>
</section>

<?php get_footer() ?>