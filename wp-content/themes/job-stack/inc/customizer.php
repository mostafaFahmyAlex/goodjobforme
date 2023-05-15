<?php
/**
 * job_stack Theme Customizer
 *
 * @package job_stack
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function job_stack_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$job_stack_options = job_stack_theme_options();

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'job_stack_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'job_stack_customize_partial_blogdescription',
			)
		);
	}

    $wp_customize->add_setting('job_stack_theme_options[site_title_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $job_stack_options['site_title_show'],
            'sanitize_callback' => 'job_stack_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('job_stack_theme_options[site_title_show]',
        array(
            'label' => esc_html__('Show Title & Tagline', 'job-stack'),
            'type' => 'Checkbox',
            'section' => 'title_tagline',

        )
    );
    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'job-stack'),
            'priority' => 2,
        )
    );



  
    $wp_customize->add_section(
        'header_section',
        array(
            'title' => esc_html__( 'Header Section','job-stack' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

	$wp_customize->add_setting('job_stack_theme_options[header_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $job_stack_options['header_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('job_stack_theme_options[header_button_txt]',
	    array(
	        'label' => esc_html__('Button Text', 'job-stack'),
	        'type' => 'text',
	        'section' => 'header_section',
	        'settings' => 'job_stack_theme_options[header_button_txt]',
	    )
	);
	$wp_customize->add_setting('job_stack_theme_options[header_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $job_stack_options['header_button_url'],
	        'sanitize_callback' => 'job_stack_sanitize_url',
	    )
	);
	$wp_customize->add_control('job_stack_theme_options[header_button_url]',
	    array(
	        'label' => esc_html__('Button Link', 'job-stack'),
	        'type' => 'text',
	        'section' => 'header_section',
	        'settings' => 'job_stack_theme_options[header_button_url]',
	    )
	);
	
	

    
	/* Banner Section */

$wp_customize->add_section(
    'banner_section',
    array(
        'title' => esc_html__( 'Banner Section','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);

$wp_customize->add_setting('job_stack_theme_options[banner_title]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $job_stack_options['banner_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('job_stack_theme_options[banner_title]',
    array(
        'label' => esc_html__('Banner Title', 'job-stack'),
        'priority' => 1,
        'section' => 'banner_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('job_stack_theme_options[banner_desc]',
    array(
        'default' => $job_stack_options['banner_desc'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('job_stack_theme_options[banner_desc]',
    array(
        'label' => esc_html__('Section Description', 'job-stack'),
        'type' => 'text',
        'section' => 'banner_section',
        'settings' => 'job_stack_theme_options[banner_desc]',
    )
);
$wp_customize->add_setting('job_stack_theme_options[banner_bg_image]',
array(
    'type' => 'option',
    'sanitize_callback' => 'esc_url_raw',
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
    $wp_customize,
    'job_stack_theme_options[banner_bg_image]',
    array(
        'label' => esc_html__('Add Background Image', 'job-stack'),
        'section' => 'banner_section',
        'settings' => 'job_stack_theme_options[banner_bg_image]',
    ))
);


/* Job Category Section */

$wp_customize->add_section(
    'job_cat_section',
    array(
        'title' => esc_html__( 'Job Category Section','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);

$wp_customize->add_setting('job_stack_theme_options[job_cat_show]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $job_stack_options['job_cat_show'],
        'sanitize_callback' => 'job_stack_sanitize_checkbox',
    )
);

$wp_customize->add_control('job_stack_theme_options[job_cat_show]',
    array(
        'label' => esc_html__('Show Job Category Section', 'job-stack'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'job_cat_section',

    )
);
$wp_customize->add_setting('job_stack_theme_options[job_cat_title]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $job_stack_options['job_cat_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('job_stack_theme_options[job_cat_title]',
    array(
        'label' => esc_html__('Section Title', 'job-stack'),
        'priority' => 1,
        'section' => 'job_cat_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('job_stack_theme_options[job_cat_desc]',
    array(
        'default' => $job_stack_options['job_cat_desc'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('job_stack_theme_options[job_cat_desc]',
    array(
        'label' => esc_html__('Section Description', 'job-stack'),
        'type' => 'text',
        'section' => 'job_cat_section',
        'settings' => 'job_stack_theme_options[job_cat_desc]',
    )
);





  $wp_customize->add_setting('job_stack_theme_options[hide_empty]',
  array(
      'type' => 'option',
      'default'        => true,
      'default' => $job_stack_options['hide_empty'],
      'sanitize_callback' => 'job_stack_sanitize_checkbox',
  )
);

$wp_customize->add_control('job_stack_theme_options[hide_empty]',
  array(
      'label' => esc_html__('Hide Category with no Jobs?', 'job-stack'),
      'type' => 'Checkbox',
      'section' => 'job_cat_section',

  )
);
/* Job Section */

$wp_customize->add_section(
    'job_section',
    array(
        'title' => esc_html__( 'Job Section','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);

$wp_customize->add_setting('job_stack_theme_options[job_show]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $job_stack_options['job_show'],
        'sanitize_callback' => 'job_stack_sanitize_checkbox',
    )
);

$wp_customize->add_control('job_stack_theme_options[job_show]',
    array(
        'label' => esc_html__('Show Job Section', 'job-stack'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'job_section',

    )
);
$wp_customize->add_setting('job_stack_theme_options[job_title]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $job_stack_options['job_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('job_stack_theme_options[job_title]',
    array(
        'label' => esc_html__('Section Title', 'job-stack'),
        'priority' => 1,
        'section' => 'job_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('job_stack_theme_options[job_desc]',
    array(
        'default' => $job_stack_options['job_desc'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('job_stack_theme_options[job_desc]',
    array(
        'label' => esc_html__('Section Description', 'job-stack'),
        'type' => 'text',
        'section' => 'job_section',
        'settings' => 'job_stack_theme_options[job_desc]',
    )
);
/* CTA Section */

$wp_customize->add_section(
    'cta_section',
    array(
        'title' => esc_html__( 'Call to Action Section','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);


$wp_customize->add_setting('job_stack_theme_options[cta_show]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $job_stack_options['cta_show'],
        'sanitize_callback' => 'job_stack_sanitize_checkbox',
    )
);

$wp_customize->add_control('job_stack_theme_options[cta_show]',
    array(
        'label' => esc_html__('Show CTA Section', 'job-stack'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'cta_section',

    )
);
$wp_customize->add_setting('job_stack_theme_options[cta_title]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('cta_title',
    array(
        'label' => esc_html__('Title', 'job-stack'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'job_stack_theme_options[cta_title]',
    )
);

$wp_customize->add_setting('job_stack_theme_options[cta_subtitle]',
array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control('cta_subtitle',
array(
    'label' => esc_html__('Description', 'job-stack'),
    'type' => 'text',
    'section' => 'cta_section',
    'settings' => 'job_stack_theme_options[cta_subtitle]',
)
);
$wp_customize->add_setting('job_stack_theme_options[cta_button_txt]',
    array(
        'type' => 'option',
        'default' => $job_stack_options['cta_button_txt'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('job_stack_theme_options[cta_button_txt]',
    array(
        'label' => esc_html__('CTA Button Text', 'job-stack'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'job_stack_theme_options[cta_button_txt]',
    )
);
$wp_customize->add_setting('job_stack_theme_options[cta_button_url]',
    array(
        'type' => 'option',
        'default' => $job_stack_options['cta_button_url'],
        'sanitize_callback' => 'job_stack_sanitize_url',
    )
);
$wp_customize->add_control('job_stack_theme_options[cta_button_url]',
    array(
        'label' => esc_html__('CTA Button Link', 'job-stack'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'job_stack_theme_options[cta_button_url]',
    )
);


$wp_customize->add_setting('job_stack_theme_options[cta_bg_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'job_stack_theme_options[cta_bg_image]',
        array(
            'label' => esc_html__('Add Background Image', 'job-stack'),
            'section' => 'cta_section',
            'settings' => 'job_stack_theme_options[cta_bg_image]',
        ))
);



/* Blog Section */

$wp_customize->add_section(
    'article_section',
    array(
        'title' => esc_html__( 'Blog Section','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);

$wp_customize->add_setting('job_stack_theme_options[blog_show]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $job_stack_options['blog_show'],
        'sanitize_callback' => 'job_stack_sanitize_checkbox',
    )
);

$wp_customize->add_control('job_stack_theme_options[blog_show]',
    array(
        'label' => esc_html__('Show Blog Section', 'job-stack'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'article_section',

    )
);
$wp_customize->add_setting('job_stack_theme_options[blog_title]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $job_stack_options['blog_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('job_stack_theme_options[blog_title]',
    array(
        'label' => esc_html__('Section Title', 'job-stack'),
        'priority' => 1,
        'section' => 'article_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('job_stack_theme_options[blog_desc]',
    array(
        'default' => $job_stack_options['blog_desc'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('job_stack_theme_options[blog_desc]',
    array(
        'label' => esc_html__('Blog Section Description', 'job-stack'),
        'type' => 'text',
        'section' => 'article_section',
        'settings' => 'job_stack_theme_options[blog_desc]',
    )
);





/* Blog Section */

$wp_customize->add_section(
    'article_section',
    array(
        'title' => esc_html__( 'Blog Section','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);

$wp_customize->add_setting('job_stack_theme_options[blog_show]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $job_stack_options['blog_show'],
        'sanitize_callback' => 'job_stack_sanitize_checkbox',
    )
);

$wp_customize->add_control('job_stack_theme_options[blog_show]',
    array(
        'label' => esc_html__('Show Blog Section', 'job-stack'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'article_section',

    )
);
$wp_customize->add_setting('job_stack_theme_options[blog_title]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $job_stack_options['blog_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('job_stack_theme_options[blog_title]',
    array(
        'label' => esc_html__('Section Title', 'job-stack'),
        'priority' => 1,
        'section' => 'article_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('job_stack_theme_options[blog_desc]',
    array(
        'default' => $job_stack_options['blog_desc'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('job_stack_theme_options[blog_desc]',
    array(
        'label' => esc_html__('Blog Section Description', 'job-stack'),
        'type' => 'text',
        'section' => 'article_section',
        'settings' => 'job_stack_theme_options[blog_desc]',
    )
);

$wp_customize->add_setting('job_stack_theme_options[blog_category]', array(
    'default' => $job_stack_options['blog_category'],
    'type' => 'option',
    'sanitize_callback' => 'job_stack_sanitize_select',
    'capability' => 'edit_theme_options',

));

$wp_customize->add_control(new job_stack_Dropdown_Customize_Control(
    $wp_customize, 'job_stack_theme_options[blog_category]',
    array(
        'label' => esc_html__('Select Blog Category', 'job-stack'),
        'section' => 'article_section',
        'choices' => job_stack_get_categories_select(),
        'settings' => 'job_stack_theme_options[blog_category]',
    )
));





    $wp_customize->add_section(
        'blog_section',
        array(
            'title' => esc_html__( 'Archive Blog Cards','job-stack' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
    $wp_customize->add_setting('job_stack_theme_options[show_image]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $job_stack_options['show_image'],
            'sanitize_callback' => 'job_stack_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('job_stack_theme_options[show_image]',
        array(
            'label' => esc_html__('Show Featured Image in Blog Cards and Single Posts Page', 'job-stack'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blog_section',

        )
    );
    $wp_customize->add_setting('job_stack_theme_options[show_blog_date]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $job_stack_options['show_blog_date'],
        'sanitize_callback' => 'job_stack_sanitize_checkbox',
    )
);

$wp_customize->add_control('job_stack_theme_options[show_blog_date]',
    array(
        'label' => esc_html__('Show Date Meta in Blog Cards and Single Posts Page', 'job-stack'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'blog_section',

    )
);

$wp_customize->add_setting('job_stack_theme_options[show_blog_author]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $job_stack_options['show_blog_author'],
    'sanitize_callback' => 'job_stack_sanitize_checkbox',
)
);

$wp_customize->add_control('job_stack_theme_options[show_blog_author]',
array(
    'label' => esc_html__('Show Author Meta in Blog Cards and Single Posts Page', 'job-stack'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'blog_section',

)
);

$wp_customize->add_setting('job_stack_theme_options[show_excerpts]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $job_stack_options['show_excerpts'],
    'sanitize_callback' => 'job_stack_sanitize_checkbox',
)
);

$wp_customize->add_control('job_stack_theme_options[show_excerpts]',
array(
    'label' => esc_html__('Show Excerpts in Blog Cards', 'job-stack'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'blog_section',

)
);

$wp_customize->add_section(
    'single_post',
    array(
        'title' => esc_html__( 'Single Posts','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);
$wp_customize->add_setting('job_stack_theme_options[show_single_sidebar]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $job_stack_options['show_single_sidebar'],
    'sanitize_callback' => 'job_stack_sanitize_checkbox',
)
);

$wp_customize->add_control('job_stack_theme_options[show_single_sidebar]',
array(
    'label' => esc_html__('Show Sidebar in Single Posts Page', 'job-stack'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'single_post',

)
);


$wp_customize->add_section(
    'preloader_section',
    array(
        'title' => esc_html__( 'Preloader','job-stack' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);
$wp_customize->add_setting('job_stack_theme_options[show_preloader]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $job_stack_options['show_preloader'],
    'sanitize_callback' => 'job_stack_sanitize_checkbox',
)
);

$wp_customize->add_control('job_stack_theme_options[show_preloader]',
array(
    'label' => esc_html__('Show Pre-Loader', 'job-stack'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'preloader_section',

)
);




    $wp_customize->add_section(
        'prefooter_section',
        array(
            'title' => esc_html__( 'Prefooter Section','job-stack' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('job_stack_theme_options[show_prefooter]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $job_stack_options['show_prefooter'],
            'sanitize_callback' => 'job_stack_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('job_stack_theme_options[show_prefooter]',
        array(
            'label' => esc_html__('Show Prefooter Section', 'job-stack'),
			'description' => esc_html__('Copyright text can be changed in Premium Version only', 'job-stack'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'prefooter_section',

        )
    );
}
add_action( 'customize_register', 'job_stack_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function job_stack_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function job_stack_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function job_stack_customize_preview_js() {
	wp_enqueue_script( 'job_stack-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'job_stack_customize_preview_js' );
