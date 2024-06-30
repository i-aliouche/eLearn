<?php get_header();

// Display a banner with a title and subtitle
page_banner(array(
    'title'     => 'Page Not Found',
    'subtitle'  => 'English Language Learning School',
)) ?>
<!-- Section for the 404 Not Found page content -->
<section class="not-found-page mb-5">
    <div class="container">
        <div class="not-found-content py-5 text-center">
            <h1>404</h1>
            <h2>Page Not Found</h2>
            <p>The page you're searching for isn't accessible or it might have been deleted.</p>
            <a class="btn rounded-pill btn-1 p-2" href="<?php echo home_url() ?>">Back To Home</a>
        </div>
    </div>
</section>

<?php get_footer() ?>