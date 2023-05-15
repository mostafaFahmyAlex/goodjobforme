<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package job_stack
 */


$job_stack_options = job_stack_theme_options();

$show_image = $job_stack_options['show_image'];
$show_blog_author = $job_stack_options['show_blog_author'];
$show_blog_date = $job_stack_options['show_blog_date'];
$show_excerpts = $job_stack_options['show_excerpts'];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if($show_image){ ?>
	<?php job_stack_post_thumbnail(); ?>
	<?php } ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				if($show_blog_date){ 
				job_stack_posted_on();
				}
				if($show_blog_author){ 
				job_stack_posted_by();
				}
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	


	<div class="entry-content">
            <?php

            global $numpages;
            if (is_archive() || is_home()){
				if ( $show_excerpts ) :
                    echo wp_kses_post(job_stack_get_excerpt($post->ID, 450));
				endif;
			}	
            else{
                the_content(sprintf(wp_kses(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'job-stack'),array('span' => array('class' => array(),),)),get_the_title()));
			}
            if(is_single()) {
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'job-stack'),
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ));
            }
            ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
