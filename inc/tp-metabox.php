<?php

// tp metabox 
add_filter( 'tp_meta_boxes', 'themepure_metabox' );

function themepure_metabox( $meta_boxes ) {
	
	$prefix     = 'biddut';
	
	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_page_meta_box',
		'title'    => esc_html__( 'TP Page Info', 'biddut' ),
		'post_type'=> 'page',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Show Breadcrumb?', 'biddut' ), 
				'id'      => "{$prefix}_check_bredcrumb",
				'type'    => 'switch',
				'default' => 'on',
				'conditional' => array()
			),		
			array(
				'label'    => esc_html__( 'Show Breadcrumb Image?', 'biddut' ),
				'id'      => "{$prefix}_check_bredcrumb_img",
				'type'    => 'switch',
				'default' => 'on',
				'conditional' => array()
			), 

            array(
				'label'    => esc_html__( 'Enable Secondary Logo', 'biddut' ),
				'id'      => "{$prefix}_en_secondary_logo",
				'type'    => 'switch',
				'default' => 'off',
				'conditional' => array()
			), 

            array(
				
				'label'    => esc_html__( 'Breadcrumb Background', 'biddut' ),
				'id'      => "{$prefix}_breadcrumb_bg",
				'type'    => 'image',
				'default' => '',
				'conditional' => array(
					"{$prefix}_check_bredcrumb_img", "==", "on"
				)
			),
            array(
				
				'label'    => esc_html__( 'Footer BG', 'biddut' ),
				'id'      => "{$prefix}_footer_bg_image",
				'type'    => 'image',
				'default' => '',
				'conditional' => array()
			),


			array(
				'label' => 'Colorpicker',
				'id'   	=> "{$prefix}_footer_bg_color",
				'type' 	=> 'colorpicker',
				'placeholder' => '',
				'default' 	  => '',
				'conditional' => array()
			),


    

            // multiple buttons group field like multiple radio buttons
			array(
				'label'   => esc_html__( 'Header', 'biddut' ),
				'id'      => "{$prefix}_header_tabs",
				'desc'    => '',
				'type'    => 'tabs',
				'choices' => array(
					'default' => esc_html__( 'Default', 'biddut' ),
					'custom' => esc_html__( 'Custom', 'biddut' ),
				),
				'default' => 'default',
				'conditional' => array()
			), 

            // select field dropdown 
			array(
				
				'label'           => esc_html__('Select Header Style', 'biddut'),
				'id'              => "{$prefix}_header_style",
				'type'            => 'select',
				'options'         => array(
					'header_1' => esc_html__( 'Header 1', 'biddut' ),
					'header_2' => esc_html__( 'Header 2', 'biddut' ),
					'header_3' => esc_html__( 'Header 3', 'biddut' ),
					'header_1_onepage' => esc_html__( 'Header 01 OnePage', 'biddut' ),
					'header_2_onepage' => esc_html__( 'Header 02 OnePage', 'biddut' ),
					'header_3_onepage' => esc_html__( 'Header 03 OnePage', 'biddut' ),
				),
				'placeholder'     => esc_html__( 'Select a header', 'biddut' ),
				'conditional' => array(
					"{$prefix}_header_tabs", "==", "custom"
				),
				'default' => 'header_1',
				'parent' => "{$prefix}_header_tabs",
				'context'  => 'normal' 
			),

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Header Template', 'biddut'),
				'id'              => "{$prefix}_header_templates",
				'type'            => 'select_posts',
				'placeholder'     => esc_html__( 'Select a template', 'biddut' ),
                'post_type'       => 'tp-header',
				'conditional' => array(
					"{$prefix}_header_tabs", "==", "elementor"
				),
				'default' => '',
			),


            // multiple buttons group field like multiple radio buttons
			array(
				'label'   => esc_html__( 'Footer', 'biddut' ),
				'id'      => "{$prefix}_footer_tabs",
				'desc'    => '',
				'type'    => 'tabs',
				'choices' => array(
					'default' => esc_html__( 'Default', 'biddut' ),
					'custom' => esc_html__( 'Custom', 'biddut' ),
				),
				'default' => 'default',
				'conditional' => array()
			), 

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Footer Style', 'biddut'),
				'id'              => "{$prefix}_footer_style",
				'type'            => 'select',
				'options'         => array(
					'footer_1' => esc_html__( 'Footer 1', 'biddut' ),
					'footer_2' => esc_html__( 'Footer 2', 'biddut' ),
					'footer_3' => esc_html__( 'Footer 3', 'biddut' ),
				),
				'placeholder'     => esc_html__( 'Select a footer', 'biddut' ),
				'conditional' => array(
					"{$prefix}_footer_tabs", "==", "custom"
				),
				'default' => 'footer_1',
				'parent' => "{$prefix}_footer_tabs"
			),

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Footer Template', 'biddut'),
				'id'              => "{$prefix}_footer_template",
				'type'            => 'select_posts',
				'placeholder'     => esc_html__( 'Select a template', 'biddut' ),
                'post_type'       => 'tp-footer',
				'conditional' => array(
					"{$prefix}_footer_tabs", "==", "elementor"
				),
				'default' => '',
			),
		),
	);

    $meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_gallery_meta',
		'title'    => esc_html__( 'TP Gallery Post', 'biddut' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
            array(
				'label'    => esc_html__( 'Gallery', '' ),
				'id'      => "{$prefix}_post_gallery",
				'type'    => 'gallery',
				'default' => '',
				'conditional' => array(),
			),
		),
		'post_format' => 'gallery'
	);    

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_video_meta',
		'title'    => esc_html__( 'TP Video Post', 'biddut' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Video', 'biddut' ),
				'id'      => "{$prefix}_post_video",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your video url.', 'biddut' ),
			),
		),
		'post_format' => 'video'
	);	

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_audio_meta',
		'title'    => esc_html__( 'TP Audio Post', 'biddut' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Audio', 'biddut' ),
				'id'      => "{$prefix}_post_audio",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your audio url..', 'biddut' ),
			),
		),
		'post_format' => 'audio'
	);
	return $meta_boxes;
}