<?php get_header(); ?>
<div class="container">


<div class="contents">

<?php if(have_posts()):while(have_posts()):
the_post(); ?>
<div class="box">
<article <?php post_class(); ?>>

<h3><?php the_title(); ?></h3>

<?php the_content(); ?>

</article>
</div>
<?php endwhile; endif; ?>


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