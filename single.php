<?php get_header() ?>

<?php
// Check if there are posts to display
if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display the page banner
        page_banner() ?>
        <!-- Container for the blog post -->
        <div class="container position-relative">
            <!-- Breadcrumb navigation for blog post -->
            <div class="metabox single-pos">
                <p>
                    <a class="text-decoration-none text-white p-2" href="<?php echo home_url('/blog') ?>">
                        <i class="fa-solid fa-house text-white pe-2"></i>Blog Home</a>
                    <span class=" text-decoration-none text-white-50 p-2"><?php the_title() ?></span>
                </p>
            </div>
            <!-- Blog post content -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="py-3 mt-5">
                        <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                    </div>
                    <div class="post-info">
                        <div class="post-content pt-3 mb-5">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
<?php get_footer() ?>