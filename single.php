<?php get_header();

if (have_posts()):
    while (have_posts()) : the_post(); ?>
        <div class="container my-container">
        <?php if (is_attachment()):?>
            <div class="row">
                <div class="col-xs-5">
                    <h1 class="breadcrumbs">
                        <a href="javascript:history.back()">Go Back</a>
                    </h1>
                </div>
            </div>
        <?php
            echo wp_get_attachment_image(get_the_ID(),'full');
        ?>
        <?php else:?>
            <div class="row">
                <div class="col-xs-5">
                    <h1 class="breadcrumbs">
                        <?php
                        $cat=get_the_category();
                        if (count($cat) && isset($cat[0]->name)):
                            echo $cat[0]->name; endif;if( get_field( "subtitle" ) ):
                        ?>
                        <span class="grey">&nbsp;&gt;&nbsp;
                            <?php the_field("subtitle"); ?>
                        </span>
                        <?php
                        endif;
                        ?>
                    </h1>
                </div>
            </div> <!-- /.row -->

            <div class="row">
                <div class="col-md-2 col-md-push-3">
                    <div class="single small">
                        <div class="description">
                        <?php
                        $exclude=array('subtitle','gallery','attachment','more_files');
                        $fields = get_field_objects();
                        usort($fields, function($a, $b) {
                            return $a['menu_order'] - $b['menu_order'];
                        });

                        foreach ($fields as $key=>$field):
                            if (!in_array($field['name'],$exclude) && isset($field['value']) && $field['value']!=""):
                        ?>

                                <div class="row">
                                    <div class="first-col upper"><?php echo $field['label']; ?></div>
                                    <div class="second-col">&gt;</div>
                                    <div class="third-col grey dont-break-out"><?php echo $field['value']; ?></div>

                                </div> <!-- /.row -->
                        <?php
                            endif;
                        endforeach;
                        ?>
                        </div>
                        <div class="text content ">
                            <?php the_content(); ?>
                            <?php
                            $pdf=get_field("attachment");
                            if ($pdf):
                            ?>
                                <a class="upper grey" href="<?php echo $pdf['url']; ?>"><?php echo $pdf['title']; ?></a><br />
                            <?php
                            endif;
                            ?>

                            <?php
                            $files=get_field("more_files");
                            if ($files && count($files)):
                                foreach ($files as $file):
                                    if (isset($file['file'])):
                                        $pdf=$file['file'];
                            ?>
                                        <a class="upper grey" href="<?php echo $pdf['url']; ?>"><?php echo $pdf['title']; ?></a>
                                        <br />
                            <?php
                                    endif;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div><!--single -->
                </div>

                <div class="col-md-3 col-md-pull-2">
                    <div class="inner">
                        <?php
                        $images = get_field('gallery');
                        if( $images ):
                        ?>

                            <?php
                            foreach( $images as $image ):
                                if (1==1 || $image['description']!="nolightbox" && $image['width']<1500 && $image['height']<1500):
                            ?>
                                    <a href="<?php echo $image['url']; ?>" data-rel="lightbox" title="<?php echo $image['caption']; ?>">
                                        <img class="img-responsive homeimage" src="<?php echo $image['sizes']['homeimage']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </a>
                            <?php
                                else:
                            ?>
                                    <a href="<?php bloginfo('url')?>/?attachment_id=<?php echo $image['ID'];?>" title="<?php echo $image['caption']; ?>" class="view-full-size">
                                        <img class="img-responsive homeimage" src="<?php echo $image['sizes']['homeimage']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </a>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php endif; ?>
        </div> <!-- /.container -->
<?php
    endwhile;
?>

<?php
endif;
?>

<?php get_footer(); ?>
