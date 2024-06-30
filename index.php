<?php get_header();

// Display a banner with a title and subtitle
page_banner(array(
    'title'     => 'Our Blog!',
    'subtitle'  => 'Keep Up With The Latest Stories',
)) ?>
<!-- Section for displaying blog posts -->
<section class="blog-cards my-5">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="card h-100">
                            <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <p class="card-date">
                                    <i class="fa-regular fa-user fa-fw"></i> <?php the_author_posts_link() ?>
                                    <i class="fa-regular fa-clock fa-fw ps-2"></i> <?php the_time('F j, Y') ?>
                                </p>
                                <h4 class="card-title fw-bold"><?php the_title() ?></h4>
                                <p class="card-text text-black-50"><?php echo wp_trim_words(get_the_content(), 20, '...') ?></p>
                                <a href="<?php the_permalink() ?>" class="btn btn-1 btn btn-1 mt-auto align-self-start">Read More</a>
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