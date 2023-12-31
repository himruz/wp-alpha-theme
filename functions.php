<?php 


    if(site_url() == "http://localhost/wordpress/"){
        define("VERSION", time());
    }else{
        define("VERSION", wp_get_theme()->get("Version"));
    };


function alpha_bootstrapping(){
    load_theme_textdomain('alpha');
    add_theme_support("post-thumbnails");
    add_theme_support('title-tag');
    register_nav_menu("topmenu", __("Top Menu", "alpha"));
    register_nav_menu("footermenu", __("Footer Menu", "alpha"));
}

add_action('after_setup_theme', 'alpha_bootstrapping');


function alpha_assets(){
    wp_enqueue_style('alpha', get_stylesheet_uri(), null, VERSION);
    wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style("featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_script("featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true);
    wp_enqueue_script("aplha_main", get_theme_file_uri("/assets/js/main.js"),array("jquery", "featherlight-js"),VERSION, true);
};

add_action('wp_enqueue_scripts','alpha_assets');

function alpha_sidebar(){
    register_sidebar(
        array(
            'name' => __('single post sidebar','alpha'),
            'id' => 'sidebar-1',
            'description' => __('Right Sidebar', 'alpha'),
            'before widget' => '<section id="%1$s" class="widgtet %2$s">',
            'after_widgtet' => '</section>',
            'before title' => '<h2 class="widgtet-title">',
            'after title' => '</h2>'

        )
    );

    register_sidebar(
        array(
            'name' => __('Footer Left','alpha'),
            'id' => 'footer-left',
            'description' => __('Widget Area on Left Side', 'alpha'),
            'before widget' => '<section id="%1$s" class="widgtet %2$s">',
            'after_widgtet' => '</section>',
            'before title' => '',
            'after title' => ''

        )
    );

    register_sidebar(
        array(
            'name' => __('Footer Right','alpha'),
            'id' => 'footer-right',
            'description' => __('Widget Area on Right Side', 'alpha'),
            'before widget' => '<section id="%1$s" class="widgtet %2$s">',
            'after_widgtet' => '</section>',
            'before title' => '',
            'after title' => ''

        )
    );
};

add_action("widgets_init", "alpha_sidebar");


// function alpha_the_excerpt($excerpt){
//     if (!post_password_required()) {
//         the_excerpt();
//     }else{
//         echo get_the_password_form();
//     }
// };

// add_filter('the_excerpt',"alpha_the_excerpt");

function alpha_menu_item_class($classes, $item){
   
    $classes [] = 'list-inline-item';
    return  $classes; 
};

add_filter("nav_menu_css_class", "alpha_menu_item_class", 10, 2);


// function alpha_about_page_template_bannner(){
// 

//     <style>
//         /* Style css*/
//     </style>
    
// 
    
// 
// add_action("wp_head", "alpha_about_page_template_bannner", 10);



