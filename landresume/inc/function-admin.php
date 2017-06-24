<?php

/*
    
@package landresume

    =======================
        ADMIN PAGE
    =======================

 */

/**
 * Load all theme & vendor css/js files
 */
function landresume_admin_script_enqueue() {

    global $pagenow;

    $screen = get_current_screen();

    if ( ( 'themes.php' == $pagenow ) && ( 'appearance_page_landresume_jm' == $screen->base ) ) {

        //Load CSS files
        wp_register_style( 'bootstrap.min.css', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', [], '4.0.0' );
        wp_enqueue_style( 'bootstrap.min.css');
        wp_register_style( 'bootstrap-select.min.css', get_template_directory_uri() . '/assets/css/vendor/bootstrap-select.min.css', [], '1.12.2' );
        wp_enqueue_style( 'bootstrap-select.min.css');
        wp_register_style( 'font-awesome.min.css', get_template_directory_uri() . '/assets/css/vendor/font-awesome.min.css', [], '4.7.0' );
        wp_enqueue_style( 'font-awesome.min.css');
        wp_register_style( 'admin.css', get_template_directory_uri() . '/assets/css/admin.css', [], '1.0.1.0' );
        wp_enqueue_style( 'admin.css');

        //Load JS files
        wp_register_script( 'tether.min.js', get_template_directory_uri() . '/assets/js/vendor/tether.min.js', ['jquery'], '1.3.3' );
        wp_enqueue_script( 'tether.min.js' );
        wp_register_script( 'bootstrap.min.js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', ['jquery'], '4.0.0' );
        wp_enqueue_script( 'bootstrap.min.js' );
        wp_register_script( 'bootstrap-select.min.js', get_template_directory_uri() . '/assets/js/vendor/bootstrap-select.min.js', ['jquery'], '1.12.2' );
        wp_enqueue_script( 'bootstrap-select.min.js' );

        wp_enqueue_media();
        wp_enqueue_script( 'media-grid' );
        wp_enqueue_script( 'media' );
        wp_enqueue_script( 'admin.js', get_template_directory_uri() . '/assets/js/admin.js', ['jquery'], '1.0.0.2', true );
    
    }

}

add_action( 'admin_enqueue_scripts', 'landresume_admin_script_enqueue' );

/**
 * Define Menu Admin Options
 */
function landresume_add_admin_page()
{

    $icon = get_template_directory_uri().'/landresume/images/favicon.png?ver=1.0';
    add_theme_page('LandResume Theme Options', 'LandResume Options' ,'manage_options', 'landresume_jm' , 'landresume_theme_create_page', $icon);

    //Activate LandResume Custom Settings
    add_action( 'admin_init', 'landresume_custom_settings' );

}

add_action( 'admin_menu', 'landresume_add_admin_page' );

/**
 * Define Admin Them Option Page Fields
 */
function landresume_custom_settings()
{

    register_setting( 'landresume-settings-group', 'first_name' );
    register_setting( 'landresume-settings-group', 'last_name' );
    register_setting( 'landresume-settings-group', 'resume_file' );
    register_setting( 'landresume-settings-group', 'footer_home' );
    register_setting( 'landresume-settings-group', 'footer_download' );
    register_setting( 'landresume-settings-group', 'education_categories', 'landresume_sanitize_education_categories_handler' );
    register_setting( 'landresume-settings-group', 'skills_categories', 'landresume_sanitize_skills_categories_handler' );
    register_setting( 'landresume-settings-group', 'portfolio_categories', 'landresume_sanitize_portfolio_categories_handler' );
    register_setting( 'landresume-settings-group', 'portfolio_footer_message' );
    register_setting( 'landresume-settings-group', 'portfolio_footer_phone' );

    add_settings_section( 'landresume-sidebar-options', '', 'landresume_sidebar_options', 'landresume_theme_create_page' );

    add_settings_field( 'sidebar-name', 'Full Name', 'landresume_sidebar_full_name', 'landresume_theme_create_page', 'landresume-sidebar-options' );
    add_settings_field( 'sidebar-resume-file', 'Resume File', 'landresume_sidebar_resume_file', 'landresume_theme_create_page', 'landresume-sidebar-options' );
    add_settings_field( 'sidebar-footer-home', 'Show Footer Home Icons?', 'landresume_sidebar_footer_home', 'landresume_theme_create_page', 'landresume-sidebar-options' );
    add_settings_field( 'sidebar-footer-download', 'Show Footer Download Button?', 'landresume_sidebar_footer_download', 'landresume_theme_create_page', 'landresume-sidebar-options' );
    add_settings_field( 'sidebar-education-categories', 'Education Categories', 'landresume_sidebar_education_categories', 'landresume_theme_create_page', 
        'landresume-sidebar-options' );
    add_settings_field( 'sidebar-skills-categories', 'Skills Categories', 'landresume_sidebar_skills_categories', 'landresume_theme_create_page', 
        'landresume-sidebar-options' );
    add_settings_field( 'sidebar-portfolio-categories', 'Portfolio Categories', 'landresume_sidebar_portfolio_categories', 'landresume_theme_create_page', 
        'landresume-sidebar-options' );
    add_settings_field( 'sidebar-portfolio-footer-message', 'Portfolio Footer Message', 'landresume_sidebar_portfolio_footer_message', 'landresume_theme_create_page', 
        'landresume-sidebar-options' );
    add_settings_field( 'sidebar-portfolio-footer-phone', 'Portfolio Footer Phone', 'landresume_sidebar_portfolio_footer_phone', 'landresume_theme_create_page', 
        'landresume-sidebar-options' );

}   

function landresume_sidebar_full_name()
{

    $firstName = esc_attr( get_option( 'first_name' ) );
    $lastName = esc_attr( get_option( 'last_name' ) );
  
    require get_template_directory() . '/inc/templates/backend/full-name.php';

}

function landresume_sidebar_resume_file()
{

    $resumeFile = esc_attr( get_option( 'resume_file' ) );

    require get_template_directory() . '/inc/templates/backend/resume-file.php';

}

function landresume_sidebar_footer_home()
{

    $footerHome = esc_attr( get_option( 'footer_home' ) );

    require get_template_directory() . '/inc/templates/backend/footer-home.php';

}

function landresume_sidebar_footer_download()
{

    $footerDownload = esc_attr( get_option( 'footer_download' ) );

    require get_template_directory() . '/inc/templates/backend/footer-download.php';

}

function landresume_sidebar_options()
{

    echo 'Customize the options used on the theme.';

}

function landresume_sidebar_education_categories()
{

    $educationCategories = esc_attr( get_option( 'education_categories' ) );
  
    require get_template_directory() . '/inc/templates/backend/education-categories.php';

}

function landresume_sanitize_education_categories_handler( $input )
{

    $output = implode(',',$input);

    return $output;

}

function landresume_sidebar_skills_categories()
{

    $skillsCategories = esc_attr( get_option( 'skills_categories' ) );
  
    require get_template_directory() . '/inc/templates/backend/skills-categories.php';

}

function landresume_sanitize_skills_categories_handler( $input )
{

    $output = implode(',',$input);

    return $output;

}

function landresume_sidebar_portfolio_categories()
{

    $portfolioCategories = esc_attr( get_option( 'portfolio_categories' ) );
  
    require get_template_directory() . '/inc/templates/backend/portfolio-categories.php';

}

function landresume_sanitize_portfolio_categories_handler( $input )
{

    $output = implode(',',$input);

    return $output;

}

function landresume_sidebar_portfolio_footer_message()
{

    $portfolioFooterMessage = esc_attr( get_option( 'portfolio_footer_message' ) );
  
    require get_template_directory() . '/inc/templates/backend/portfolio-footer-message.php';

}

function landresume_sidebar_portfolio_footer_phone()
{

    $portfolioFooterPhone = esc_attr( get_option( 'portfolio_footer_phone' ) );
  
    require get_template_directory() . '/inc/templates/backend/portfolio-footer-phone.php';

}

function landresume_theme_create_page()
{

    require_once( get_template_directory() . '/inc/templates/backend/landresume-admin.php' );

}