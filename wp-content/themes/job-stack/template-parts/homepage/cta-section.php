<?php
$job_stack_options = job_stack_theme_options();


$cta_show            = $job_stack_options['cta_show'];
$cta_title		 	 = $job_stack_options['cta_title'];
$cta_subtitle		 	 = $job_stack_options['cta_subtitle'];
$cta_button_txt	 = $job_stack_options['cta_button_txt'];
$cta_button_url		 = $job_stack_options['cta_button_url'];
$cta_bg_image		 = $job_stack_options['cta_bg_image'];


if(!empty($cta_bg_image)){
    $background_style = "style='background-image:url(".esc_url($cta_bg_image).")'";
}
else{
    $background_style = '';
}




if($cta_show) { 
    if (1 == $cta_show):?>
    <div class="section about-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 img-left">
                <img src="<?php echo esc_url($cta_bg_image); ?>" alt="" />
                </div>
                <div class="col-md-6">
                    <div class="cta-content">
                        <h2 class="cta-title"><?php echo esc_html($cta_title); ?></h2>
                        <span class="cta-subtitle"><?php echo esc_html($cta_subtitle); ?></span>
                        
                        <?php  if( $cta_button_txt && $cta_button_url):?>
                            <a href="<?php echo esc_url($cta_button_url); ?>" class="btn btn-default"><?php echo esc_html($cta_button_txt); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?php
        
    endif;
}
