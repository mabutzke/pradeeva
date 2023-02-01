<?php

//Add custom settings for the theme in the admin panel
add_action('customize_register', function($wp_customize) {
    
    /* CLASSES */

    class WP_Customize_Range_Control extends WP_Customize_Control {
        public $type = 'custom_range';
        public function render_content() {
            ?>
            <script>
                jQuery(document).ready(function() {
                    jQuery('input[data-input-type]').on('input change', function() {
                        const val = jQuery(this).val();
                        jQuery(this).prev('.cs-range-value').html(val);
                        jQuery(this).val(val);
                    });
                });
            </script>
            <label>
                <?php if (!empty($this->label)) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                <?php if (!empty($this->description)) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <div class="cs-range-value"><?php echo esc_attr($this->value()); ?></div>
                <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }
    }

    /* COLORS */

    //Settings - Colors
    $wp_customize->add_setting('primary', array('default' => '#0100CA'));
    $wp_customize->add_setting('accent', array('default' => '#7E07ED'));
    $wp_customize->add_setting('secondary', array('default' => '#E3CCFF'));
    $wp_customize->add_setting('dark', array('default' => '#41414B'));
    $wp_customize->add_setting('light', array('default' => '#ECEFF1'));
    $wp_customize->add_setting('background', array('default' => '#FFFFFF'));
    $wp_customize->add_setting('content-color', array('default' => 'primary'));

    //Controls - Colors
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary', array(
        'label'    => 'Primary',
        'section'  => 'colors',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent', array(
        'label'    => 'Accent',
        'section'  => 'colors',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary', array(
        'label'    => 'Secondary',
        'section'  => 'colors',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dark', array(
        'label'    => 'Dark',
        'section'  => 'colors',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'light', array(
        'label'    => 'Light',
        'section'  => 'colors',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background', array(
        'label'    => 'Background',
        'section'  => 'colors',
    )));
    $wp_customize->add_control('content-color', array(
        'label'    => 'Body text color',
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => array(
            'primary'    => 'Primary',
            'accent'     => 'Accent',
            'secondary'  => 'Secondary',
            'dark'       => 'Dark',
            'light'      => 'Light',
            'background' => 'Background',
    )));

    /* FONTS */

    //Section - Fonts
    $wp_customize->add_section('fonts', array(
        'title'    => 'Fonts',
        'priority' => 41,
    ));

    //Settings - Fonts
    $wp_customize->add_setting('google-font', array('default' => 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,600;0,700;1,300;1,600;1,700&display=swap'));
    $wp_customize->add_setting('font-family', array('default' => 'Poppins, sans-serif'));
    $wp_customize->add_setting('font-size', array('default' => '15'));
    $wp_customize->add_setting('line-height', array('default' => '1.7'));

    //Controls - Fonts
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'google-font', array(
        'label'    => 'Google font link',
        'section'  => 'fonts',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'font-family', array(
        'label'    => 'Font family',
        'section'  => 'fonts',
    )));
    $wp_customize->add_control(new WP_Customize_Range_Control($wp_customize, 'font-size', array(
        'label'       => 'Base font size in px',
        'description' => 'All elements\' sizes on the site are based on this value',
        'section'     => 'fonts',
        'input_attrs' => array('min' => 10, 'max' => 20, 'step' => 1),
    )));
    $wp_customize->add_control(new WP_Customize_Range_Control($wp_customize, 'line-height', array(
        'label'       => 'Line height',
        'section'     => 'fonts',
        'input_attrs' => array('min' => 1, 'max' => 2.5, 'step' => .1),
    )));

    /* HOME CAROUSEL */

    //Settings - Home
    $wp_customize->add_setting('home-news', array('default' => '4'));
    $wp_customize->add_setting('home-work', array('default' => '10'));
    $wp_customize->add_setting('carousel-1', array('default' => ''));
    $wp_customize->add_setting('carousel-image-1', array( 'default' => ''));
    $wp_customize->add_setting('carousel-text-1', array('default' => ''));
    $wp_customize->add_setting('carousel-button-1', array('default' => ''));
    $wp_customize->add_setting('carousel-url-1', array('default' => ''));
    $wp_customize->add_setting('carousel-2', array('default' => ''));
    $wp_customize->add_setting('carousel-image-2', array( 'default' => ''));
    $wp_customize->add_setting('carousel-text-2', array('default' => ''));
    $wp_customize->add_setting('carousel-button-2', array('default' => ''));
    $wp_customize->add_setting('carousel-url-2', array('default' => ''));
    $wp_customize->add_setting('carousel-3', array('default' => ''));
    $wp_customize->add_setting('carousel-image-3', array( 'default' => ''));
    $wp_customize->add_setting('carousel-text-3', array('default' => ''));
    $wp_customize->add_setting('carousel-button-3', array('default' => ''));
    $wp_customize->add_setting('carousel-url-3', array('default' => ''));

    //Controls - Home
    $wp_customize->add_control(new WP_Customize_Range_Control($wp_customize, 'home-news', array(
        'label'       => 'Number of "News"',
        'section'     => 'static_front_page',
        'input_attrs' => array('min' => 2, 'max' => 12, 'step' => 2),
    )));
    $wp_customize->add_control(new WP_Customize_Range_Control($wp_customize, 'home-work', array(
        'label'       => 'Number of "Latest Work"',
        'section'     => 'static_front_page',
        'input_attrs' => array('min' => 1, 'max' => 20, 'step' => 1),
    )));
    $wp_customize->add_control('carousel-1', array(
        'label'       => 'Carousel Item 1',
        'description' => 'Add an image to activate this item',
        'section'     => 'static_front_page',
        'type'        => 'hidden',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carousel-image-1', array(
        'label'   => 'Image',
        'section' => 'static_front_page',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-text-1', array(
        'label'    => 'Text',
        'section'  => 'static_front_page',
        'type'     => 'textarea',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-button-1', array(
        'label'    => 'Button text',
        'section'  => 'static_front_page',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-url-1', array(
        'label'    => 'Button link',
        'section'  => 'static_front_page',
    )));
    $wp_customize->add_control('carousel-2', array(
        'label'       => 'Carousel Item 2',
        'description' => 'Add an image to activate this item',
        'section'     => 'static_front_page',
        'type'        => 'hidden',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carousel-image-2', array(
        'label'   => 'Image',
        'section' => 'static_front_page',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-text-2', array(
        'label'    => 'Text',
        'section'  => 'static_front_page',
        'type'     => 'textarea',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-button-2', array(
        'label'    => 'Button text',
        'section'  => 'static_front_page',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-url-2', array(
        'label'    => 'Button link',
        'section'  => 'static_front_page',
    )));
    $wp_customize->add_control('carousel-3', array(
        'label'       => 'Carousel Item 3',
        'description' => 'Add an image to activate this item',
        'section'     => 'static_front_page',
        'type'        => 'hidden',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carousel-image-3', array(
        'label'   => 'Image',
        'section' => 'static_front_page',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-text-3', array(
        'label'    => 'Text',
        'section'  => 'static_front_page',
        'type'     => 'textarea',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-button-3', array(
        'label'    => 'Button text',
        'section'  => 'static_front_page',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'carousel-url-3', array(
        'label'    => 'Button link',
        'section'  => 'static_front_page',
    )));

    /* FOOTER */

    //Section - Footer
    $wp_customize->add_section('footer', array(
        'title'    => 'Footer',
        'priority' => 121,
    ));

    //Settings - Footer
    $wp_customize->add_setting('footer', array('default' => ''));
    $wp_customize->add_setting('facebook', array('default' => ''));
    $wp_customize->add_setting('instagram', array('default' => ''));
    $wp_customize->add_setting('twitter', array('default' => ''));
    $wp_customize->add_setting('youtube', array('default' => ''));

    //Controls - Footer
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer', array(
        'label'    => 'Contact information',
        'section'  => 'footer',
        'type'     => 'textarea',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook', array(
        'label'    => 'Facebook profile',
        'section'  => 'footer',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram', array(
        'label'    => 'Instagram profile',
        'section'  => 'footer',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter', array(
        'label'    => 'Twitter profile',
        'section'  => 'footer',
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'youtube', array(
        'label'    => 'Youtube profile',
        'section'  => 'footer',
    )));
});