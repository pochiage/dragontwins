<?php

//ウィジット
register_sidebar();

//RSSフィード
add_theme_support('automatic-feed-links');

//カスタムメニュー
register_nav_menu('navigation','ナビゲーション');

//カスタムヘッダー
add_theme_support('custom-header',array(
'width' =>750,
'height' => 130,
'default-image' => '%s/logopicture.png',
'header-text' => false
));

//カスタム背景
add_theme_support('custom-background');

//アイキャッチ画像
add_theme_support('post-thumbnails');

add_image_size('600t',600,200,true);
add_image_size('150t',150,150,true);



//wordpress バージョン情報出力停止
remove_action('wp_head','wp_generator');

//概要の省略記号
function my_excerpt_more($more){
	return '…';
}
add_filter('excerpt_more','my_excerpt_more');