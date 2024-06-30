<?php

// Add Styles
function add_styles()
{
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null, 'all');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font_awesome-css', get_template_directory_uri() . '/css/all.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', array(), rand(11, 9999), "all");
}
add_action('wp_enqueue_scripts', 'add_styles');

// Add Scripts
function add_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('font_awesome-js', get_template_directory_uri() . '/js/all.min.js', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'add_scripts');

// Add Theme Support for features
function add_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('landscape', 370, 485, true);
    add_image_size('portrait', 370, 370, true);
    add_image_size('page-banner', 1400, 450, true);
}
add_action('after_setup_theme', 'add_features');


require_once('navwalker.php');
// register a new menu
register_nav_menu('header', 'Header Menu');

function header_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'header',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => '__return_false',
        'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul> ',
        'depth' => 2,
        'walker' => new bootstrap_5_wp_nav_menu_walker()
    ));
}

// Page Banner
function page_banner($args = NULL)
{
    if (!$args) {
        $args = array();
    }
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }
    if (!isset($args['subtitle'])) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!isset($args['image'])) {
        $args['image'] = get_field('page_banner_background');
        if (!$args['image']) {
            $args['image'] = get_template_directory_uri() . '/imgs/hero-bg.png';
        }
    }
?>
    <section class="page-banner" style="background-image: url(<?php echo $args['image'] ?>)">
        <div class="container">
            <div class="banner-content">
                <h2><?php echo $args['title'] ?></h2>
                <p class="text-light fs-4 fw-light"><?php echo $args['subtitle'] ?></p>
            </div>
        </div>
    </section>
<?php }

// Generate numbered pagination
function numbering_pagination($wp_query = null)
{
    if (null === $wp_query) {
        global $wp_query;
    }
    $paged = max(1, get_query_var('paged'));
    $max   = $wp_query->max_num_pages;
    if ($max <= 1) return;
    $links = paginate_links(array(
        'base'      => get_pagenum_link() . '%_%',
        'format'    => '?paged=%#%',
        'current'   => $paged,
        'total'     => $max,
        'prev_text' => __('Previous'),
        'next_text' => __('Next'),
        'type'      => 'array',
        'end_size'  => 1,
        'mid_size'  => 1
    ));
    if (!empty($links)) {
        $pagination = '<nav class="mt-4"><ul class="pagination justify-content-center">';
        $pagination .= !($paged > 1) ? '<li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a></li>' : '';
        foreach ($links as $link) {
            $pagination .= '<li class="page-item' . (strpos($link, 'current') !== false ? ' active' : '') .
                '"> ' . str_replace('page-numbers', 'page-link', $link) . '</li>';
        }
        $pagination .= !($paged < $max) ? '<li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Next</a></li>' : '';
        return $pagination .= '</ul></nav>';
    }
}

// Register Custom Post Types
function custom_post_types()
{
    // teacher Post Type
    register_post_type('teacher', array(
        'show_in_rest'   => true,
        'public'         => true,
        'menu_icon'      => 'dashicons-businessman',
        'supports'       => array('title', 'editor', 'thumbnail'),
        'labels'         => array(
            'name'          => 'Teachers',
            'singular_name' => 'Teacher',
            'add_new'       => "Add New Teacher",
            'add_new_item'  => 'Add New Teacher',
            'edit_item'     => 'Edit Teacher',
            'all_items'     => 'All Teachers',
        )
    ));
    // course Post Type
    register_post_type('course', array(
        'has_archive'    => true,
        'show_in_rest'   => true,
        'public'         => true,
        'menu_icon'      => 'dashicons-portfolio',
        'supports'       => array('title', 'editor'),
        'rewrite'        => array('slug' => 'courses'),
        'taxonomies'     => array('post_tag'),
        'labels'         => array(
            'name'          => 'Courses',
            'singular_name' => 'Course',
            'add_new'       => "Add New Course",
            'add_new_item'  => 'Add New Course',
            'edit_item'     => 'Edit Course',
            'all_items'     => 'All Courses',
        )
    ));
    // Event Post Type
    register_post_type('event', array(
        'has_archive'    => true,
        'show_in_rest'   => true,
        'public'         => true,
        'menu_icon'      => 'dashicons-calendar-alt',
        'supports'       => array('title', 'editor', 'thumbnail'),
        'rewrite'        => array('slug' => 'events'),
        'taxonomies'     => array('post_tag'),
        'labels'         => array(
            'name'          => 'Events',
            'singular_name' => 'Event',
            'add_new'       => "Add New Event",
            'add_new_item'  => 'Add New Event',
            'edit_item'     => 'Edit Event',
            'all_items'     => 'All Events',
        )
    ));
}
add_action('init', 'custom_post_types');

// Adjust default query
function adjust_default_query($query)
{
    if (!is_admin() && is_post_type_archive('course') && $query->is_main_query()) {
        $query->set('posts_per_page', '-1');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key'       => 'event_date',
                'compare'   => '>=',
                'value'     => $today,
                'meta_type' => 'NUMERIC'
            )
        ));
    }
}
add_action('pre_get_posts', 'adjust_default_query');
