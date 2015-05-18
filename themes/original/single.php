<?php get_header(); ?>
<div class="container">

<div id="breadcrumb">
<div itemscope itemtype="htt://data-vacablary.org/Breadcrumb">
	<a href="<?php echo home_url(); ?>">
	<span itemprop="title">トップ</span>
	</a> &raquo;
</div>

<?php $postcat = get_the_category(); ?>
<?php $catid = $postcat[0]->cat_ID; ?>
<div itemscope itemtype="htt://data-vacablary.org/Breadcrumb">
	<a href="<?php echo get_category_link($catid); ?>" itemprop="url">
	<span itemprop="title"><?php echo get_cat_name($catid); ?></span>
	</a> &raquo;
</div>

<div><?php the_title(); ?></div>
</div>



<div class="contents">
<?php if(have_posts()):while(have_posts()):
the_post(); ?>

<article <?php post_class(); ?>>
<div class="box">

<figure class="figure"><?php echo get_the_post_thumbnail($post->ID,'600t'); ?></figure>
<div class="postinfo">
	<time datetime="<?php echo get_the_date('Y.m.d'); ?>">
	<i class="fa fa-clock-o"></i>
	<?php echo get_the_date(); ?>
	</time>
	
	<span class="postcat">
	<i class="fa fa-folder-open"></i>
	<?php the_category(','); ?>
	</span>
	
	<span class="postcom">
	<i class="fa fa-comment"></i>
	<a href="<?php comments_link(); ?>">
	<?php comments_number(
		'コメント',
		'コメント（1件）',
		'コメント（%件）'
	); ?>
	</a>
	</span>
</div>

<?php if(is_single()): ?>
<h2><?php the_title(); ?></h2>
<?php else: ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php endif; ?>

<?php the_content(); ?>


<?php comments_template(); ?>

</article>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 468✕60PR -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-2231992030256137"
     data-ad-slot="4664495807"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<?php if(function_exists('related_posts')): ?>
<?php related_posts(); ?>
<?php endif; ?>

<?php endwhile; endif; ?>

<?php if($wp_query->max_num_pages > 1): ?>
<div class="pagenav">
	<span class="old">
	<?php previous_post_link('<i class="fa fa-chevron-circle-left"></i>'); ?>
	</span>
	<span class="new">
	<?php next_post_link('<i class="fa fa-chevron-circle-right"></i>' ,''); ?>
	</span>
</div>
<?php endif; ?>


</div><!-- contents-->

<div class="sidemenu">
<ul>
<?php dynamic_sidebar(); ?>
<li class="widget">
	<ul>
	<li>
	<a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss-square"></i>RSS</a>
	</li>
	</ul>
</li>
</ul>
</div>

</div> <!-- container-->

<?php get_footer(); ?>