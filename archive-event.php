<?php get_header();

// Display a banner with a title and subtitle
page_banner(array(
    'title'     => 'All Events',
    'subtitle'  => 'See our exciting upcoming events',
));
?>
<!-- Section for displaying a list of events -->
<section class="blog-cards my-5">
    <div class="container">
        <div class="row">
            <?php
            // Loop through the events and display each one using a template part
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/event', 'template');
                }
            } ?>
        </div>
        <!-- Pagination for navigating through events -->
        <?php
        echo numbering_pagination();
        ?>
        <!-- Link to the archive of past events -->
        <div class="past-events border my-5 p-4">
            <p class="mb-0">Interested in a collection of our previous events?
                <a class="text-decoration-none" href="<?php echo home_url('past-events') ?>">Explore our past event archive. </a>
            </p>
        </div>
    </div>
</section>

<?php get_footer() ?>