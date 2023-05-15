<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package job_stack
 */

$job_stack_options = job_stack_theme_options();

$show_prefooter = $job_stack_options['show_prefooter'];

?>

<footer id="colophon" class="site-footer">


	<?php if ($show_prefooter== 1){ ?>
	    <section class="footer-sec">
	        <div class="container">
	            <div class="row">
	                <?php if (is_active_sidebar('job_stack_footer_1')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('job_stack_footer_1') ?>
	                    </div>
	                    <?php
	                else: job_stack_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('job_stack_footer_2')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('job_stack_footer_2') ?>
	                    </div>
	                    <?php
	                else: job_stack_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('job_stack_footer_3')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('job_stack_footer_3') ?>
	                    </div>
	                    <?php
	                else: job_stack_blank_widget();
	                endif; ?>
	            </div>
	        </div>
	    </section>
	<?php } ?>



		<div class="site-info">
		<p>
					<span><a target="_blank" rel="nofollow"
                       href="<?php echo esc_url('https://www.flawlessthemes.com/theme/job-stack-best-jobboard-wordpress-theme/'); ?>"><?php esc_html_e('Job Stack' , 'job-stack'); ?></a><?php esc_html_e(' By Flawless Themes.' , 'job-stack'); ?> <?php esc_html_e('Powered By WordPress', 'job-stack');
             ?></span>
                </p> 
		</div><!-- .site-info -->


	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
