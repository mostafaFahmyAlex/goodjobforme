<?php
/**
 *
 * Template Name: Front Template

 *
 * @package job_stack
 */
 
get_header();

$job_stack_options = job_stack_theme_options();

$blog_show = $job_stack_options['blog_show'];
$job_show = $job_stack_options['job_show'];
$job_cat_show = $job_stack_options['job_show'];

get_template_part('template-parts/homepage/banner', 'section');

if($job_show == 1)
get_template_part('template-parts/homepage/job', 'section');
if($job_cat_show == 1)
get_template_part('template-parts/homepage/category', 'section');

get_template_part('template-parts/homepage/cta', 'section');
if($blog_show == 1)
get_template_part('template-parts/homepage/blog', 'section');


get_footer();
