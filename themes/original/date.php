<?php get_header(); ?>
<div class="container">


<div class="contents ichiran">
<h3><?php single_month_title(); ?></h3>

<?php if(have_posts()):while(have_posts()):
the_post(); ?>
	<?php get_template_part('content', 'excerpt'); ?>
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