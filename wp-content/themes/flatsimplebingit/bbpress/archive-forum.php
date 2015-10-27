<?php 
/**
 * KENTOOZ PAGE TEMPLATE
**/
get_header(); ?>
	<section class="col-md-12">

	<?php do_action( 'bbp_before_main_content' ); ?>

	<?php do_action( 'bbp_template_notices' ); ?>

	<div id="forum-front" class="bbp-forum-front">
	<section class="new-content">
	<div class="box-post">
		<div class="inner-box">
		<h1 class="entry-title page-title clearfix"><span><?php bbp_forum_archive_title(); ?></span></h1>
		<div class="entry-content">

			<?php bbp_get_template_part( 'content', 'archive-forum' ); ?>

		</div>
		</div>
	</div>
	</section>
	</div><!-- #forum-front -->

	<?php do_action( 'bbp_after_main_content' ); ?>

	</section>
<?php get_footer(); ?>
