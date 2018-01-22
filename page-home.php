<?php get_header(); ?>

	<ucs-banner 
	    page="<?php the_ID(); ?>" 
	    read-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/read-more.png"
	></ucs-banner>

	<ucs-3-blocks-across
	    page="<?php the_ID(); ?>" 
	    image-link="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-yellow.png"
	></ucs-3-blocks-across>

	<ucs-cta 
	    page="<?php the_ID(); ?>" 
	    learn-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/learn-more.png"
	></ucs-cta>

	<ucs-steps 
		page="<?php the_ID(); ?>" 
		read-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/read-more.png"
	></ucs-steps>

	<ucs-social 
		page="<?php the_ID(); ?>" 
	    load-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/load-more.png"
	></ucs-social>

<?php get_footer(); ?>  