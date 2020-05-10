<?php get_header(); ?>

<div class="container my-container"  >
	<div class="row">
    <?php
		$args = array(
			'type'                     => 'post',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'menu_order',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => 5,
			'taxonomy'                 => 'category',
			'pad_counts'               => false
		);

		$categories=get_categories($args);
		$j=0;
		$special=0;
		array_swap($categories,0,$special);
		foreach ($categories as $category):
	?>

		<div class="col-md-1 <?php echo ($j++==$special?"col-md-pull-".$special:($j<=$special?"col-md-push-1":"")); ?>">
			<h2 class="visible-md visible-lg"><?php echo $category->name; ?></h2>
			<a class="collapselink visible-xs visible-sm"  data-toggle="collapse" href="#collapse<?php echo $j; ?>" aria-expanded="false" aria-controls="collapse<?php echo $j; ?>">
				<?php echo $category->name; ?>
				<span class="caret"></span>
			</a>

			<div class="collapse" id="collapse<?php echo $j; ?>">
			<?php
			$args = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => $category->term_id,
				'category_name'    => '',
				'orderby'          => 'menu_order',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'author'	   => '',
				'post_status'      => 'publish',
				'suppress_filters' => true
			);
			$posts=get_posts($args);
			$i=0;

			foreach ($posts as $post):
				if ( has_post_thumbnail() ):
	   				$url= get_the_permalink();
	   				$target="_self";
				   	if( get_field( "link" ) && get_field( "link" )!=""):
						$url=get_field( "link" );$target="_blank";
					endif; ?>

      				<a href="<?php echo $url; ?>" target="<?php echo $target; ?>" title="<?php the_title_attribute(); ?>">
					<?php
						the_post_thumbnail('homeimage',array('class'=>'homeimage img-responsive'));
					?>
   					</a>

	   				<?php
				endif;
			?>

       		<?php endforeach;?>
       		</div>
		</div>
        <?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>
