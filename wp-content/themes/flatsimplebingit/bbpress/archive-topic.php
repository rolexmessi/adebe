<?php

/**
 * bbPress - Topic Archive
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>
	<section class="col-md-12">

	<?php do_action( 'bbp_before_main_content' ); ?>

	<?php do_action( 'bbp_template_notices' ); ?>

	<div id="topic-front" class="bbp-topics-front">
	<section class="new-content">
	<div class="box-post">
		<div class="inner-box">
		<h1 class="entry-title page-title clearfix"><span><?php bbp_topic_archive_title(); ?></span></h1>
		<div class="entry-content">

			<?php bbp_get_template_part( 'content', 'archive-topic' ); ?>

		</div>
		</div>
	</div>
	</section>
	</div><!-- #topic-front -->

	<?php do_action( 'bbp_after_main_content' ); ?>

	</section>
<?php get_footer(); ?>
