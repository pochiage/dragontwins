<?php get_header(); ?>
<div class="container">


<div class="contents">
<p id="desc">女性ならほとんどの人が経験するであろう、妊娠（双子）、出産（予定帝王切開）。<br>
それが、あれほどまでに大変だとは。（体重は22キロ増）<br>
思い出したくもないと、メモ魔の私がペンを取らなくなった。 <br>
でも、今、あんだけ頑張った自分の記憶が薄れるのももったいないし、<br>
これから妊娠する人へ、参考になればと思ったんだ。 <br>
ま、最初で最後の育児を楽しもうと思います。</p>

<p>と、初めたブログがリスタートしました</p>

<!--
<h3>最近購入</h3>
<?php do_action('slideshow_deploy', '315'); ?>
-->



<h3>記事一覧</h3>
<?php if(have_posts()):while(have_posts()):
the_post(); ?>
<div class="halfbox">
<article <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>">

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
</a>
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