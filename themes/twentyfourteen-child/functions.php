<?php
	add_action( 'pre_get_posts', 'foo_modify_query_exclude_category' ); // pre_get_postsにフック
// フック時に使う関数
function foo_modify_query_exclude_category( $query ) {
   if ( ! is_admin() && $query->is_main_query() && $query->is_home() )
           $query->set( 'posts_per_page', '1' );
}

if ( ! isset( $content_width ) ) {
	$content_width = 650;
}


