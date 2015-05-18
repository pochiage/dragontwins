<article <?php post_class(); ?>>



<div class="postinfo">
	<time datetime="<?php echo get_the_date('Y.m.d'); ?>">
	<i class="fa fa-clock-o"></i>
	<?php echo get_the_date(); ?>
	</time>
	
	<span class="postcat">
	<i class="fa fa-folder-open"></i>
	<?php the_category(','); ?>
	</span>
</div>

<?php if(is_single()): ?>
<h2><?php the_title(); ?></h2>
<?php else: ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
