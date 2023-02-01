<?php

//Add the customizer
if (is_customize_preview()) require get_template_directory() . '/customizer.php';

//Add the style.css and script.css to the header
wp_enqueue_style('style', get_stylesheet_uri());
wp_enqueue_script('script', get_template_directory_uri() . '/script.js', '', '', true);

//Modify customizer to return default when empty
function pdva_theme_mod($name, $default) {
    $value = get_theme_mod($name, $default);
    if (empty($value)) return $default;
    else return $value;
}

//Add the customizer settings to the stylesheet
add_action('wp_head', function() { ?>
    <style type="text/css">
        @import url('<?php echo pdva_theme_mod('google-font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,600;0,700;1,300;1,600;1,700&display=swap'); ?>');
        html {
            --primary: <?php echo get_theme_mod('primary', '#0100CA'); ?>;
            --accent: <?php echo get_theme_mod('accent', '#7E07ED'); ?>;
            --secondary: <?php echo get_theme_mod('secondary', '#E3CCFF'); ?>;
            --dark: <?php echo get_theme_mod('dark', '#41414B'); ?>;
            --light: <?php echo get_theme_mod('light', '#ECEFF1'); ?>;
            --background: <?php echo get_theme_mod('background', '#FFFFFF'); ?>;
            --background-90: <?php echo get_theme_mod('background', '#FFFFFF') . 'E6'; ?>;
            --content-color: var(--<?php echo get_theme_mod('content-color', 'primary'); ?>);
            font-family: <?php echo pdva_theme_mod('font-family', 'Poppins, sans-serif'); ?>;
            font-size: <?php echo get_theme_mod('font-size', '15'); ?>px;
            line-height: <?php echo get_theme_mod('line-height', '1.7'); ?>;
            color: var(--primary);
        }
    </style>
 <?php });

//Add featured image and larger image options
add_theme_support('post-thumbnails');
add_theme_support('align-wide');

//Add support for responsive embeds like Youtube to have correct ratio size displayed
add_theme_support('responsive-embeds');

//Add custom logo support
add_action('after_setup_theme', function() {
    add_theme_support('custom-logo');
});

//Add menus
add_action('init', function() {
    register_nav_menus(
        array(
            'main-menu'   => _('Header'),
            'main-menu-2' => _('Header Extended'),
            'footer-menu' => _('Footer')
        )
    );
});

//Limit the excerpt length
add_filter('excerpt_length', function() {
    return 22;
});

//Disable WP predefined styles
// remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
// remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Disable comments on the entire site
add_action('admin_init', function () {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url()); 
        exit;
    }
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {remove_menu_page('edit-comments.php');});
add_action('init', function () {if (is_admin_bar_showing()) {remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);}});

//Disable the emoji's
add_action('init', function() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles'); 
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function($plugins) {
        if (is_array($plugins)) return array_diff($plugins, array('wpemoji'));
        else return array();
    });
    add_filter('wp_resource_hints', function($urls, $relation_type) {
        if ('dns-prefetch' == $relation_type) {
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
            $urls = array_diff($urls, array($emoji_svg_url));
        }
        return $urls;
    }, 10, 2);
});