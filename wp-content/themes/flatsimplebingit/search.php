<?php 
/**
 * KENTOOZ SEARCH PAGE TEMPLATE
**/
if (isset($_REQUEST['s'])) {
$termstring = urldecode($_REQUEST['s']);
} else {
$termstring = '';}
get_header(); ?>
	<section class="col-md-12">
		<section class="new-content">
		<div class="ktz-titlepage"><h1><?php printf( '<h1>' . __( '%s', ktz_theme_textdomain ), '' . get_search_query() . '</h1>' ); ?></h1>		</div>
		<?php
$keyword = get_search_query();
$template = 'socmed.html'; // jeut gantoe dengan nama fle yg laen, lage games, homedesign, car, dan socmed. Tergantung niche.
$hack = '';
echo spp($keyword, $template, $hack);
?>
		<?php if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			if ( ot_get_option('ktz_content_layout') == 'layout_blog' ) :
			get_template_part( 'content', 'mini' );
			else :
			get_template_part( 'content', get_post_format() );
			endif;
		endwhile; ?>
		<nav id="nav-index">
			<?php do_action( 'ktz_navigation' ); // function in _navigation_ktz.php  ?>
		</nav>
		<?php else : $termstring = $s;
		if (ot_get_option('ktz_agc_activated') == "yes") {
	if ($s!='') {
	$googleresults = perform_google_web_search($termstring);
	if (is_array($googleresults))
	{
	foreach ($googleresults as $result) {
	$link = urldecode(CleanFileNameBan(strip_tags($result['Oriurl'])));
		print '<div class="box-post ktz-agc-search">';
		print '<h2><a href="'.get_search_link(CleanFileNameBan(hilangkan_spesial_karakter($result['title']))).'">'.CleanFileNameBan(hilangkan_spesial_karakter($result['title'])).'</a></h2>';
		print '<p>'.CleanFileNameBan(hilangkan_spesial_karakter($result['abstract'])).'</p>';
		print '<p>Sumber: '.$result['Oriurl'].'</p>';
		print '</div>';
		}
	}
	} 
	} else {
		do_action( '//ktz_post_notfound' ); // function in _content_ktz.php
	} 
	endif; ?>
		</section>
	</section>
<?php get_footer(); ?>
