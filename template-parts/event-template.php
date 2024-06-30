<div class="col-sm-6 col-md-6 col-lg-6 mt-5 mb-3">
    <div class="card h-100">
        <div class="row g-0 flex-grow-1">
            <div class="event-date d-flex text-center justify-content-center align-items-center col-md-4 ">
                <p class=" text-white mb-0 py-2">
                    <?php
                    $eventDate = new DateTime(get_post_field('event_date'));
                    echo $eventDate->format('M j');
                    ?>
                    <span class="d-block fs-1 fw-bold">
                        <?php
                        echo $eventDate->format('Y');
                        ?>
                    </span>
                </p>
            </div>
            <div class="col-md-8">
                <div class="event-info">
                    <div class="card-body">
                        <h4><a class="text-decoration-none" href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                        <p><?php echo wp_trim_words(get_the_content(), 10, ' ...') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>