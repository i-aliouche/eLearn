<?php get_header() ?>

<!-- Hero section with dynamic background image -->
<section class="hero" style="background-image: url(<?php $bgBanner = get_field('page_banner_background');
                                                    if ($bgBanner) {
                                                        echo $bgBanner;
                                                    } else {
                                                        echo get_template_directory_uri() . "/imgs/hero-bg.png";
                                                    } ?>)">
    <div class="container">
        <div class="hero-content text-center d-flex flex-column justify-content-center align-items-center">
            <h1 class="py-3"><span class="d-block">Build your Successful</span>Tomorrow at <?php bloginfo("name") ?></h1>
            <p class="text-white opacity-75">Discover courses that align with your interests</p>
            <form action="#">
                <div class="form-input">
                    <input class="rounded-pill" type="text" name="search" placeholder="Enter your keyword..." autocomplete="off">
                    <button class="btn rounded-pill btn-1 fw-bold" type="submit">Search</button>
                    <i class="fas fa-search"></i>
                    <div class="loader"></div>
                    <div id="suggestion-box" class="suggestion-box"></div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Blog section to display latest posts -->
<section class="blog my-5 pt-5">
    <div class="container">
        <div class="title text-center">
            <h5>Latest Stories</h5>
            <h2>From Our Blog</h2>
        </div>
        <div class="row mt-5">
            <?php
            // Fetch and display the 3 most recent blog posts
            $recentPostsArr = array(
                'posts_per_page' => 3,
                'order' => 'DSC'
            );
            $recentPosts = new WP_Query($recentPostsArr);
            if ($recentPosts->have_posts()) {
                while ($recentPosts->have_posts()) {
                    $recentPosts->the_post(); ?>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="card h-100">
                            <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <p class="card-date"><i class="fa-regular fa-clock pe-1"></i><?php the_time('F j, Y') ?></p>
                                <h4 class="card-title fw-bold"><?php the_title() ?></h4>
                                <p class="card-text text-black-50"><?php echo wp_trim_words(get_the_content(), 30, ' ...') ?></p>
                                <a href="<?php echo get_permalink() ?>" class="btn btn-1 mt-auto align-self-start">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<!-- Events section to display upcoming events -->
<section class="events my-5 pt-5">
    <div class="container">
        <div class="title text-center">
            <h5>Join With Us</h5>
            <h2>Upcoming Events</h2>
        </div>
        <div class="row">
            <?php
            // Fetch and display upcoming events
            $today = date('Ymd');
            $comingEventsArr = array(
                'posts_per_page'    => 4,
                'post_type'         => 'event',
                'meta_key'          => 'event_date',
                'order'             => 'ASC',
                'orderby'           => 'meta_value_num',
                'meta_query'        => array(
                    array(
                        'key'       => 'event_date',
                        'compare'   => '>=',
                        'value'     => $today,
                        'meta_type' => 'NUMERIC'
                    )
                )
            );
            $comingEvents = new WP_Query($comingEventsArr);
            if ($comingEvents->have_posts()) {
                while ($comingEvents->have_posts()) {
                    $comingEvents->the_post();
                    get_template_part('template-parts/event', 'template');
                }
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer() ?>