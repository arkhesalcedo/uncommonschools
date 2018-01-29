<?php get_header(); ?>

	<ucs-banner 
	    page="<?php the_ID(); ?>" 
	    read-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/white-arrow-right.png"
	></ucs-banner>

	<ucs-video
	    play-clip-image="<?php echo get_template_directory_uri(); ?>/assets/images/white-arrow-right.png"
	></ucs-video>

	<ucs-3-blocks-across
	    page="<?php the_ID(); ?>" 
	    image-link="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-yellow.png"
	></ucs-3-blocks-across>

	<ucs-justice 
		circle-image="<?php echo get_template_directory_uri(); ?>/assets/images/circle.png" 
		circle-image-alt="<?php echo get_template_directory_uri(); ?>/assets/images/circle-alt.png" 
		image-link="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-yellow.png"
	></ucs-justice>

	<ucs-cta 
	    page="<?php the_ID(); ?>" 
	    learn-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/white-arrow-right.png"
	></ucs-cta>

	<ucs-steps 
		page="<?php the_ID(); ?>" 
		read-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/white-arrow-right.png"
	></ucs-steps>

	<ucs-profiles 
		page="<?php the_ID(); ?>" 
		image-link="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-yellow.png"
	></ucs-profiles>

	<ucs-social 
		page="<?php the_ID(); ?>" 
	    load-more-image="<?php echo get_template_directory_uri(); ?>/assets/images/black-arrow-right.png"
	></ucs-social>

<?php get_footer(); ?>  