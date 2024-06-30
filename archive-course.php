<?php get_header();

// Display a banner with a title and subtitle
page_banner(array(
    'title'     => 'All courses',
    'subtitle'  => 'There\'s something here for everyone. Feel free to explore',
)) ?>
<!-- Section for displaying courses -->
<section class="blog-cards my-5">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <div class="card my-2">
                        <div class="row">
                            <div class="course-letter d-flex justify-content-center align-items-center">
                                <p class="text-white mb-0 py-2"><?php echo get_the_title()[0]; ?></p>
                            </div>
                            <div class="course-info w-75">
                                <div class="card-body">
                                    <h4><a class="text-decoration-none" href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                    <p><i class="fa-regular fa-clock"></i> Duration: <?php echo get_field('course_duration') ?> Week(s)</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer() ?>