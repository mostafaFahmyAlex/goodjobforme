<?php
$job_stack_options  = job_stack_theme_options();

$job_cat_title  = $job_stack_options['job_cat_title'];
$job_cat_desc   = $job_stack_options['job_cat_desc'];



$check_job          = in_array('wp-job-manager/wp-job-manager.php', apply_filters('active_plugins', get_option('active_plugins'))) ? true : false;
?>


        <div class="job-cat-sec section">
            <div class="container">
                <div class="row">
                    <?php if ($job_cat_title || $job_cat_desc): ?>
                        <div class="section-title">
                            <?php

                            if ($job_cat_title)
                                echo '<h2>' . esc_html($job_cat_title) . '</h2>';
                            if ($job_cat_desc)
                                echo '<p>' . esc_html($job_cat_desc) . '</p>';
                            ?>
                        </div>
                        <div class="job-cat-wrap grid-layout"> 
                    <?php endif;  
                    

                    $job_stack_options  = job_stack_theme_options();
                	$hide_empty  = $job_stack_options['hide_empty'];
                	
                	if($hide_empty==1){
                		$terms = get_terms( array(
                			'taxonomy' => 'job_listing_category',
                			'hide_empty' => true,
                		));
                	}
                	else{
                		$terms = get_terms( array(
                			'taxonomy' => 'job_listing_category',
                			'hide_empty' => false,
                		));
                	}
                
                
                	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                      
                			foreach ( $terms as $term ) {
                				
                				$term_link  = home_url().'/jobs/?search_category='.$term->term_id;
                
                				?>
                				<div class="single-job-cat" >
        							<a href ="<?php echo $term_link ?>">
        							<div class="single-job-cat-wrap">
        								<div class="cat-infos"><h3><?php echo $term->name ?></h3>
        								<span><?php echo $term->count; echo esc_html(' Open Jobs','job-stack'); ?></span></div>
        							</div>
        							</a>
        						</div>
                						<?php
                			}
                	
                	} ?>
                	</div>
                </div>
            </div>
        </div>
     

        