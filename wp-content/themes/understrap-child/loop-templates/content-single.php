<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<div class="well info-block">
            Стоимость: <span class="badge badge-secondary"><?php $price = the_field('price'); $final_price = number_format($price, 2, ',', ' '); echo $final_price; ?> ₽</span>
            Город: <span class="badge badge-secondary"><?php the_terms( $post->ID, 'city' , ' ' ); ?></span>
            Адрес: <span class="badge badge-secondary"><?php the_field('address'); ?></span>
        </div>
		<hr>
		


	</header><!-- .entry-header -->
		<div class="margin-8"></div>
		<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>" class="img-fluid" alt="<?php the_title(); ?>">
        <div class="margin-8"></div>
		<div class="well info-block text-center">
            Этаж: <span class="badge badge-secondary"><?php the_field('floor'); ?></span>
            Общая площадь: <span class="badge badge-secondary"><?php the_field('area'); ?> м²</span>
            Жилая площадь: <span class="badge badge-secondary"><?php the_field('live-area'); ?> м²</span>
        </div>
		<hr>
		
	


	<div class="entry-content">
		<div class="margin-8"></div>
		
	<h2>Описание объекта недвижимости</h2>
          <hr>

          <div class="well">
             <?php the_content(); ?>
          </div>
		
		

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
	    <div class="entry-meta d-none">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
