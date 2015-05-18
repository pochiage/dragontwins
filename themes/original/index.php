<?php get_header(); ?>
<div class="container">


<div class="contents">
<?php if(have_posts()):while(have_posts()):
the_post(); ?>


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
<h1><?php the_title(); ?></h1>
<?php else: ?>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php endif; ?>

<?php the_content(); ?>


<?php if(is_single()): ?>
<div class="pagenav">
	<span class="old">
	<?php previous_post_link('%link','<i class="fa fa-chevron-circle-left"></i> %title'); ?>
	</span>
	
	<span class="new">
	<?php next_post_link('%link','<i class="fa fa-chevron-circle-right"></i> %title'); ?>
	</span>
</div>
<?php endif; ?>


<?php comments_template(); ?>

</article>
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