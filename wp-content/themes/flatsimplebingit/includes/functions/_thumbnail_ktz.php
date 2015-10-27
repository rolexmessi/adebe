<?php
/*
/*-----------------------------------------------*/
/* KENTOOZ THEMES FUNCTION
/* Website    : http://www.kentooz.com
/* The Author : Gian Mokhammad Ramadhan (http://www.gianmr.com)
/* Twitter    : http://www.twitter.com/g14nnakal 
/* Facebook   : http://www.facebook.com/gianmr
/*-----------------------------------------------*/

/*
* Add featured images * first in kabar themes
* If has_thumb elseif firstimage else no image
* BFI_thumbs https://github.com/bfintal/bfi_thumb
*/
function get_first_image_src() {
    $content = get_the_content();
    $image_regex = "/<img [^>]*src=[\"']([^\"^']*)[\"']/";
    preg_match($image_regex, $content, $match);

    if (empty($match))
        return "";
    return $match[1];
}
function get_first_image_src_forhead() {
	global $post;
	if (!is_page()) {
		$content = apply_filters('the_content', $post->post_content);
	} else {
		$content = get_the_content();
	}
    $image_regex = "/<img [^>]*src=[\"']([^\"^']*)[\"']/";
    preg_match($image_regex, $content, $match);

    if (empty($match))
        return "";
    return $match[1];
}
function ktz_getpost_images_upload() {
    global $post,$wpdb;
    $postid = $post->ID;
    $results = '';
	$attachment_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_parent = $postid AND post_type = 'attachment' AND post_mime_type LIKE 'image/%%' LIMIT 1 ;" );
    // get the correct image html for the selected size
	$image = wp_get_attachment_image_src($attachment_id, 'full');
	$results = $image[0];
    return $results;
}
if ( !function_exists('ktz_featured_just_img_link') ) :
function ktz_featured_just_img_link( $width, $height ) { 
	global $post;
	$permalink = get_permalink();
	$title = get_the_title();
	$get_imgpost_upload = ktz_getpost_images_upload();
	$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$fisrtimg_url = get_first_image_src(); 
	$image = bfi_thumb( $img_url, $params ); //resize & crop featured image
	$first_image = bfi_thumb( $fisrtimg_url, $params ); 
	$img_default = get_template_directory_uri() . '/includes/assets/img/no-image/image-blank.jpg'; 
	$default_image = bfi_thumb( $img_default, $params ); 
	if ( $image ) { 
		echo $image;
	} elseif ( $first_image ) {
		echo $first_image;
	} elseif ( $get_imgpost_upload ) {
		echo $get_imgpost_upload;
	} else { 
		echo $default_image;
	} 
} 
endif;
if ( !function_exists('ktz_featured_just_img') ) :
function ktz_featured_just_img( $width, $height ) { 
	global $post;
	$permalink = get_permalink();
	$title = get_the_title();
	$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$fisrtimg_url = get_first_image_src(); 
	$image = bfi_thumb( $img_url, $params ); //resize & crop featured image
	$first_image = bfi_thumb( $fisrtimg_url, $params ); 
	$get_imgpost_upload = ktz_getpost_images_upload();
	$image_upload = bfi_thumb( $get_imgpost_upload, $params );
	$img_default = get_template_directory_uri() . '/includes/assets/img/no-image/image-blank.jpg'; 
	$default_image = bfi_thumb( $img_default, $params ); 
	if ( $image ) { 
		echo '<img src="' . $image . '" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
	} elseif ( $first_image ) {
		echo '<img src="' . $first_image . '" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
	} elseif ( $image_upload ) {
		echo '<img src="' . $image_upload . '" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';;
	} else { 
		echo '<img src="' . $default_image . '" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
	} 
} 
endif;
if ( !function_exists('ktz_featured_just_img_width') ) :
function ktz_featured_just_img_width( $width ) { 
	global $post;
	$permalink = get_permalink();
	$title = get_the_title();
	$params = array( 'width' => $width );
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$fisrtimg_url = get_first_image_src(); 
	$image = bfi_thumb( $img_url, $params ); //resize & crop featured image
	$first_image = bfi_thumb( $fisrtimg_url, $params ); 
	$get_imgpost_upload = ktz_getpost_images_upload();
	$image_upload = bfi_thumb( $get_imgpost_upload, $params );
	$img_default = get_template_directory_uri() . '/includes/assets/img/no-image/image-blank.jpg'; 
	$default_image = bfi_thumb( $img_default, $params ); 
	if ( $image ) { 
		echo '<img src="' . $image . '" alt="' . $title . '" width="'.$width.'" height="auto" title="' . $title . '" />';
	} elseif ( $first_image ) {
		echo '<img src="' . $first_image . '" alt="' . $title . '" width="'.$width.'" height="auto" title="' . $title . '" />';
	} elseif ( $image_upload ) {
		echo '<img src="' . $image_upload . '" alt="' . $title . '" width="'.$width.'" height="auto" title="' . $title . '" />';;
	} else { 
		echo '<img src="' . $default_image . '" alt="' . $title . '" width="'.$width.'" height="auto" title="' . $title . '" />';
	} 
} 
endif;
if ( !function_exists('ktz_featured_img') ) :
function ktz_featured_img( $width, $height ) { 
	global $post;
	$permalink = get_permalink();
	$title = get_the_title();
	$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$fisrtimg_url = get_first_image_src(); 
	$image = bfi_thumb( $img_url, $params ); //resize & crop featured image
	$first_image = bfi_thumb( $fisrtimg_url, $params ); 
	$get_imgpost_upload = ktz_getpost_images_upload();
	$image_upload = bfi_thumb( $get_imgpost_upload, $params );
	$img_default = get_template_directory_uri() . '/includes/assets/img/no-image/image-blank.jpg'; 
	$default_image = bfi_thumb( $img_default, $params ); 
	if ( $image ) { 
		echo '<a href="' . $permalink . '" class="ktz_thumbnail pull-left" title="Permalink to ' . $title . '">';
		echo '<img src="' . $image . '" class="media-object" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
		echo '</a>';
	} elseif ( $first_image ) {
		echo '<a href="' . $permalink . '" class="ktz_thumbnail pull-left" title="Permalink to ' . $title . '">';
		echo '<img src="' . $first_image . '" class="media-object" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
		echo '</a>';
	} elseif ( $image_upload ) {
		echo '<a href="' . $permalink . '" class="ktz_thumbnail pull-left" title="Permalink to ' . $title . '">';
		echo '<img src="' . $image_upload . '" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
		echo '</a>';
	} else { 
		echo '<a href="' . $permalink . '" class="ktz_thumbnail pull-left" title="Permalink to ' . $title . '">';
		echo '<img src="' . $default_image . '" class="media-object" alt="' . $title . '" width="'.$width.'" height="'.$height.'" title="' . $title . '" />';
		echo '</a>';
	} 
} 
endif;

if ( !function_exists('ktz_featured_img_width') ) :
function ktz_featured_img_width( $width ) { 
	global $post;
	$permalink = get_permalink();
	$title = get_the_title();
	$params = array( 'width' => $width );
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$fisrtimg_url = get_first_image_src(); 
	$image = bfi_thumb( $img_url, $params ); //resize & crop featured image
	$first_image = bfi_thumb( $fisrtimg_url, $params ); 
	$get_imgpost_upload = ktz_getpost_images_upload();
	$image_upload = bfi_thumb( $get_imgpost_upload, $params );
	$img_default = get_template_directory_uri() . '/includes/assets/img/no-image/image-blank.jpg'; 
	$default_image = bfi_thumb( $img_default, $params ); 
	if ( $image ) { 
		echo '<a href="' . $permalink . '" class="ktz_thumbnail" title="Permalink to ' . $title . '">';
		echo '<img src="' . $image . '" class="media-object" alt="Permalink to ' . $title . '" width="'.$width.'" height="auto" title="Permalink to ' . $title . '" />';
		echo '</a>';
	} elseif ( $first_image ) {
		echo '<a href="' . $permalink . '" class="ktz_thumbnail" title="Permalink to ' . $title . '">';
		echo '<img src="' . $first_image . '" class="media-object" alt="Permalink to ' . $title . '" width="'.$width.'" height="auto" title="Permalink to ' . $title . '" />';
		echo '</a>';
	} elseif ( $image_upload ) {
		echo '<a href="' . $permalink . '" class="ktz_thumbnail" title="Permalink to ' . $title . '">';
		echo '<img src="' . $image_upload . '" alt="Permalink to ' . $title . '" width="'.$width.'" height="auto" title="Permalink to ' . $title . '" />';
		echo '</a>';
	} else { 
		echo '<a href="' . $permalink . '" class="ktz_thumbnail" title="Permalink to ' . $title . '">';
		echo '<img src="' . $default_image . '" class="media-object" alt="Permalink to ' . $title . '" width="'.$width.'" height="auto" title="Permalink to ' . $title . '" />';
		echo '</a>';
	} 
} 
endif;

if ( !function_exists('ktz_get_dl_image') ) :
function ktz_get_dl_image() { 
	global $post;
	$title = get_the_title();
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$fisrtimg_url = get_first_image_src(); 
		if ( $img_url ) { 
			echo '<a href="' . $img_url . '" class="btn btn-block btn-default ktz-downloadbtn" target="_blank" title="' . $title . '">Download Full Image</a>';
		} elseif ( $fisrtimg_url ) {
			echo '<a href="' . $fisrtimg_url . '" class="btn btn-block btn-default ktz-downloadbtn" target="_blank" title="' . $title . '">Download Full Image</a>';
		} else {
			echo '';
		} 
}
add_action( 'ktz_get_dl_image', 'ktz_get_dl_image' );
endif;

?>