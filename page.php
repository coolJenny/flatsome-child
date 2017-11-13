<?php
/**
 * The template for displaying all pages.
 *
 * @package flatsome
 */


if(flatsome_option('pages_layout') != 'default') {
	
	// Get default template from theme options.
	echo get_template_part('page', flatsome_option('pages_layout'));
	return;

} else {

get_header();
do_action( 'flatsome_before_page' ); ?>
<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col">
			<div class="col-inner">
				<?php if(is_page('happy-human-test')): ?>
				
					<h1>Welcome happy human!</h1>
					<div class="row large-columns-4 medium-columns- small-columns-2 row-small" >
						<div class="large-3" >
							<a href="#sharediv" title="Share your Story" class="wplightbox">
								<img src="http://staging.healthyhumanlife.com/wp-content/uploads/2017/05/Screenshot_16.png" class="attachment-thumbnail size-thumbnail wp-post-image" style="height:280px;"></img>
							</a>
						</div>

						<div id="sharediv" style="display:none;">
							<?php echo do_shortcode( '[gravityform id="2" title="true" description="true"]' ); ?>
						</div>
					<?php
 
					// The Query
					$the_query = new WP_Query( array('category_name' => 'photo-gallery') );
					 
					// The Loop
					if ( $the_query->have_posts() ) {

						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							
							echo '<div class="large-3"><a href="#' . get_the_ID() . '" title="' . esc_attr( get_the_title() ) . '" class="wplightbox" data-group="photo-gallery">';
							echo get_the_post_thumbnail( $the_query->ID, 'thumbnail' );
							echo '</a></div>';
							?>
							<div id="<?php echo get_the_ID(); ?>" style="display:none;">
							  <div class="lightboxcontainer">
								<div class="lightboxleft">
									 <?php echo get_the_post_thumbnail( $the_query->ID, 'large' ) ?>
								</div>
								<div class="lightboxright">
									<div class="divtext" >
										<p class="divtitle" style="font-size:16px;font-weight:bold;margin:12px 0px;"><?php echo esc_attr(get_the_title()); ?></p>
										<p class="divdescription" style="font-size:14px;line-height:20px;">
										<?php the_excerpt();?>
										</p>
									</div>
								</div>
								<div style="clear:both;"></div>
							  </div>
							</div>
					<?php
						}
						
					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata(); 
				
					?>
					</div>
				<?php else: ?>
					<?php if(get_theme_mod('default_title', 0)){ ?>
					<header class="entry-header">
						<h1 class="entry-title mb uppercase"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					<?php } ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php do_action( 'flatsome_before_page_content' ); ?>
						
							<?php the_content(); ?>

							<?php if ( comments_open() || '0' != get_comments_number() ){
								comments_template(); } ?>

						<?php do_action( 'flatsome_after_page_content' ); ?>
					<?php endwhile; // end of the loop. ?>
				<?php endif; ?>
			</div><!-- .col-inner -->
		</div><!-- .large-12 -->
	</div><!-- .row -->
</div>

<?php
do_action( 'flatsome_after_page' );
get_footer();

}

?>