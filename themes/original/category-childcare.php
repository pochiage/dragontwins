<?php get_header(); ?>
<div class="container">


<div class="contents">

<p id="desc">
いろいろ振り返ってまとめて見る
</p>

<h3><?php single_cat_title(); ?></h3>
<?php if(have_posts()):while(have_posts()):
the_post(); ?>
<div class="halfbox">
<article <?php post_class(); ?>>


<figure class="figure"><?php the_post_thumbnail('thumbnail'); ?></figure>
<div class="postinfo">
	<time datetime="<?php echo get_the_date('Y.m.d'); ?>">
	<i class="fa fa-clock-o"></i>
	<?php echo get_the_date(); ?>
	</time>
	
	<div class="postcat">
	<i class="fa fa-folder-open"></i>
	<?php the_category(','); ?>
	</div>
</div>

<?php if(is_single()): ?>
<h2><?php the_title(); ?></h2>
<?php else: ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php endif; ?>

</article>
</div>
<?php endwhile; endif; ?>


<?php if($wp_query->max_num_pages > 1): ?>
<div class="pagenav">
	<span class="old">
	<?php next_posts_link('<i class="fa fa-chevron-circle-left"></i>　古い記事'); ?>
	</span>
	<span class="new">
	<?php previous_posts_link('<i class="fa fa-chevron-circle-right"></i>　新しい記事'); ?>
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