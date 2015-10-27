<?php

/**
 * Topic Tag Edit
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>
	<section class="col-md-12">
	<?php do_action( 'bbp_before_main_content' ); ?>

	<?php do_action( 'bbp_template_notices' ); ?>

	<div id="topic-tag" class="bbp-topic-tag">
	<section class="new-content">
	<div class="box-post">
		<div class="inner-box">
		<h1 class="entry-title page-title clearfix"><span><?php printf( __( 'Topic Tag: %s', 'bbpress' ), '<span>' . bbp_get_topic_tag_name() . '</span>' ); ?></span></h1>

		<div class="entry-content">

			<?php bbp_get_template_part( 'content', 'topic-tag-edit' ); ?>

		</div>
		</div>
	</div>
	</section>
	</div><!-- #topic-front -->

	<?php do_action( 'bbp_after_main_content' ); ?>
	</section>
<?php get_footer(); ?>
