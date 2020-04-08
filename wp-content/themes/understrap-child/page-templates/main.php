<?php
/**
 * Template Name: Главная страница
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"  type="text/javascript"></script>
<script src="'/../wp-content/themes/understrap-child/js/form2.js"  type="text/javascript"></script>


</script>


<?php
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row" id="realty-cont">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/understrap-child/loop-templates/realty-content.php'; ?>
		</div>	
			
		<div class="row">	  
			<div class="col-md-12 city_list" id="primary">
			<hr>

		
			    <?php $args = array(
            	'show_option_all'    => '',
            	'show_option_none'   => __('No categories'),
            	'orderby'            => 'name',
            	'order'              => 'ASC',
            	'style'              => 'list',
            	'show_count'         => 0,
            	'hide_empty'         => 0,
            	'use_desc_for_title' => 1,
            	'child_of'           => 0,
            	'hierarchical'       => true,
            	'title_li'           => '',
            	'number'             => NULL,
            	'echo'               => 1,
            	'depth'              => 0,
            	'current_category'   => 0,
            	'taxonomy'           => 'city',
            	'walker'             => 'Walker_Category',
            	'separator'          => '',
            	'hide_title_if_empty' => false,
                ); 
            
                wp_list_categories($args);
                ?>
    
        <hr>
	    </div>
	    </div>
	    
        <div class="row">
        <div class="col-md-12" id="primary">
        
        <form id="formdata" class="form-horizontal" enctype="multipart/form-data">
		<fieldset>
		   
		<!-- Form Name -->
			<div class="form-row">
			
			<h3>Добавить объект недвижимости (PHP+JS+AJAX)</h3>
			</div>
			
			<p>Все поля необходимо заполнить обязательно!</p>
			
			<hr>
			
			<div class="messages" style="margin-bottom: 1rem;"></div>
		
		   
    	<div class="form-row">
		
			 <!-- Title object-->
			 <div class="form-group col-md-6">
			 <div class="input-group">
			 <div class="input-group-prepend">
			 <div class="input-group-text">Название</div>
			 </div>
			 <input id="title_new" type="text" class="form-control input-md rfield" value="">
			 </div>
			 </div>
			 
			
			 <!-- Price object-->
			 <div class="form-group col-md-6">
			 <div class="input-group">
			 <div class="input-group-prepend">
			 <div class="input-group-text">Стоимость</div>
			 </div>
			 <input oninput: () id="price_new" type="number" placeholder="Укажите в рублях, во сколько оцениваете ваш объект" class="form-control input-md rfield" value="">
			 </div>
			 </div>
		</div>
    	
    	
		<div class="form-row">
		 
		<!-- Select City -->   
		<div class="form-group col-md-6">
		<div class="input-group">
		<div class="input-group-prepend">
		<div class="input-group-text">Город</div>
		</div>
		<?php 
		$args = array( 
		  'taxonomy' => 'city', 
		  'name' => 'city_new', 
		  'id'                 => 'city_new',
		  'class'              => 'form-control rfield',
		  'hide_empty' => 0,
		  'value_field' => 'slug',
		  'required'    => true,
		  'selected' => false,
		); 
		$cat = wp_dropdown_categories($args); ?>
		</div>
		</div>
		
		<!-- Select Type Realty -->
		<div class="form-group col-md-6">
		<div class="input-group">
		<div class="input-group-prepend">
		<div class="input-group-text">Тип объекта</div>
		</div>
		<?php 
		$args = array( 
		  'taxonomy' => 'realty', 
		  'name' => 'realty_new', 
		  'hierarchical' => 1,
		  'class'              => 'form-control rfield',
		  'id'                 => 'realty_new',
		  'hide_empty' => 0,
		  'value_field' => 'slug',
		  'required' => true,
		  'selected' => false,
		); 
		$cat = wp_dropdown_categories($args); ?>
		</div>
		</div>
        </div>				
	
		<div class="form-row">

		 <!-- Area object-->
		 <div class="form-group col-md-6">
		 <div class="input-group">
		 <div class="input-group-prepend">
		  <div class="input-group-text">Площадь объекта</div>
		 </div>
		  <input id="area_new" name="area_new" type="number" placeholder="Укажите площадь объекта" class="form-control input-md rfield" required>
		</div>
		 </div>

		 <!-- Live Area object-->
		 <div class="form-group col-md-6">
		 <div class="input-group">
		 <div class="input-group-prepend">
		  <div class="input-group-text">Жилая площадь</div>
		 </div>
		 <input id="live_area_new" name="live_area_new" type="number" placeholder="Укажите количество метров" class="form-control input-md rfield" required>
		 </div>
		 </div>
		</div>

		<div class="form-row">

		 <!-- Floor object-->
		 <div class="form-group col-md-6">
		 <div class="input-group">
		 <div class="input-group-prepend">
		  <div class="input-group-text">Этаж</div>
		 </div>
		 <input id="floor_new" name="floor_new" type="number" placeholder="На каком этаже объект недвижимости" class="form-control input-md rfield" required>
		 </div>
		 </div>

		 <!-- Address object-->
		 <div class="form-group col-md-6">
    		 <div class="input-group">
        		 <div class="input-group-prepend">
            		 <div class="input-group-text">Адрес</div>
        		 </div>
        		 <input id="address_new" name="address_new" type="text" placeholder="Укажите улицу, адрес дома, номер квартиры и т.д." class="form-control input-md rfield" required>
    		 </div>
		</div>
		</div>
		
		
		<div class="form-row">
		
		<!-- Media object-->
		<div class="form-group col-md-6">
		<div class="input-group-text">Добавьте изображение</div>
	    </div>
	    
		<div class="form-group col-md-6">
		<input type="file" class="rfield" name="image_file" id="image_file" required accept="image/png,image/jpeg"/>
	
		</div>
		</div>
		
		<!-- Description object -->
		<div class="form-row">
            <div class="form-group col-md-12">
			   <textarea class="form-control rfield" id="description_new" placeholder="Полное описание объекта (подробности и детали)" value=""></textarea>
			</div>
		</div>
    	
        <!-- Button -->
        <div class="form-row">
    		 <div class="form-group col-md-6">
    		    <input type="button" value="Отправить" id="btn_submit" class="btn btn-primary" />
    		 </div>
		</div>
		
		</fieldset>
		</form>
		
        </div>
        </div>
        
			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
