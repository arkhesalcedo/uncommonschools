<?php get_header(); the_post(); ?>

<div class="section" style="margin-top: 100px;">
	<div class="container">
		<div class="columns">
			<div class="column">
				<h1 class="is-size-1"><?php the_title(); ?></h1>

				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>  