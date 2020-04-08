<?php

$args=array(
'post_type' => 'realty',
'showposts'=>12
);

	$realty = get_posts($args);
		foreach ($realty as $post) :
			setup_postdata($post);
			?>
				
			<div class="col-md-3 realty" id="realty-content">
			<p class="badge badge-secondary"><?php the_terms( $post->ID, 'city' , ' ' ); ?></p>
			<h4><?php the_title(); ?></h4>
			<p>Площадь: <?php the_field('area'); ?> м²</p>
			<div class="img_content"><img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>" class="img-thumbnail" alt="<?php the_title(); ?>"></div>
			<h5 class="price-realty">Стоимость: <?php the_field('price'); ?> ₽</h5>
			<a type="button" href="<?php the_permalink(); ?>" class="btn btn-info btn-block">Смотреть объект</a>
			</div>
			
<?php endforeach; ?>