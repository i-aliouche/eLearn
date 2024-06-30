<?php get_header() ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display the page banner
        page_banner() ?>
        <!-- Main content section for a page -->
        <section class="page-section my-5">
            <div class="container position-relative">
                <!-- Get the ID of the parent page if it exists -->
                <?php $parent = wp_get_post_parent_id((get_the_ID()));
                if ($parent) { ?>
                    <!-- Breadcrumb navigation for parent page -->
                    <div class="metabox page-pos mb-5">
                        <p>
                            <a class="text-decoration-none text-white p-2" href="<?php echo get_the_permalink($parent) ?>">
                                <i class="fa-solid fa-house text-white pe-2"></i>Back to <?php echo get_the_title($parent) ?></a>
                            <span class="text-white-50 p-2"><?php the_title() ?></span>
                        </p>
                    </div>
                <?php } ?>
                <div class="row">
                    <!-- Main content area -->
                    <div class="col-md-8 col-lg-8 order-1 order-md-0 order-lg-0">
                        <div class="page-content">
                            <p><?php the_content() ?></p>
                        </div>
                    </div>
                    <!-- Sidebar area for child pages -->
                    <div class="col-md-4 col-lg-4 order-0 order-md-2 order-lg-2  text-center">
                        <?php
                        // Set the current page as parent if no parent exists
                        if (!$parent) {
                            $parent = get_the_ID();
                        }
                        // Get child pages of the current page
                        $pages = get_pages(array(
                            'child_of'    => $parent,
                            'sort_column' => 'menu_order'
                        ));
                        if ($pages) { ?>
                            <!-- Navigation card for parent and child pages -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <a class="text-decoration-none text-white" href="<?php echo get_the_permalink($parent) ?>">
                                        <?php echo get_the_title($parent) ?>
                                    </a>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                    // List each child page
                                    foreach ($pages as $page) {
                                        echo "<li class=\"list-group-item\"><a href=\"" . get_permalink($page->ID) . "\">" . get_the_title($page->ID) . "</a></li>";
                                    };
                                    ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
} ?>

<?php get_footer() ?>