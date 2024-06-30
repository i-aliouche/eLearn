<?php get_header();

// Display a banner with a title and subtitle
page_banner(array(
    'title'     => get_the_archive_title(),
    'subtitle'  => get_the_archive_description()
)) ?>
<!-- Section for displaying a list of posts -->
<section class="blog-cards my-5">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="card">
                            <img class="img-fluid" src="<?php the_post_thumbnail_url() ?>" alt="post image">
                            <div class="card-body">
                                <p class="card-date">
                                    <i class="fa-regular fa-user fa-fw"></i> <?php the_author() ?>
                                    <i class="fa-regular fa-clock fa-fw ps-2"></i> <?php the_time('F j, Y') ?>
                                </p>
                                <h4 class="card-title fw-bold"><?php the_title() ?></h4>
                                <p class="card-text text-black-50"><?php echo wp_trim_words(get_the_content(), 20, '...') ?></p>
                                <a href="<?php the_permalink() ?>" class="btn btn-1">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <!-- Pagination for navigating through posts -->
        <?php
        echo numbering_pagination();
        ?>
    </div>
</section>

<?php get_footer() ?>