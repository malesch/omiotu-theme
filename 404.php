
<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }
                ?>
            </div>

            <div class="single">
                <h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
                <div class="text content">

                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>

<?php get_footer(); ?>

