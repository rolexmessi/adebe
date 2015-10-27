<?php

/**
 * Edit handler for topics
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>
	<section class="col-md-12">
	<?php do_action( 'bbp_before_main_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<div id="bbp-edit-page" class="bbp-edit-page">
	<section class="new-content">
	<div class="box-post">
		<div class="inner-box">
		<h1 class="entry-title page-title clearfix"><span><?php the_title(); ?></span></h1>
			<div class="entry-content">

				<?php bbp_get_template_part( 'form', 'topic' ); ?>

			</div>
		</div>
	</div>
	</section>
	</div><!-- #topic-front -->

	<?php endwhile; ?>

	<?php do_action( 'bbp_after_main_content' ); ?>
	</section>
<?php get_footer(); ?>
