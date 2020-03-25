<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5cd0a11fc8422',
	'title' => 'Flex Content',
	'fields' => array(
		array(
			'key' => 'field_5cd0a156faddb',
			'label' => 'Flex Content',
			'name' => 'flex_content',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array(
				'layout_5cd0a16134923' => array(
					'key' => 'layout_5cd0a16134923',
					'name' => 'header-text',
					'label' => 'Heading',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5cd0a460f5338',
							'label' => 'Header Text',
							'name' => 'header_text',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5ce2ed9a8713b' => array(
					'key' => 'layout_5ce2ed9a8713b',
					'name' => 'articles',
					'label' => 'Articles',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5ce2eda08713c',
							'label' => 'Articles',
							'name' => 'articles',
							'type' => 'relationship',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => '',
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => '',
							'min' => '',
							'max' => 4,
							'return_format' => 'object',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5cd0a4716fe04' => array(
					'key' => 'layout_5cd0a4716fe04',
					'name' => 'body_text',
					'label' => 'Body Text',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5cd0a4716fe05',
							'label' => 'Body Text',
							'name' => 'body_text_content',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5e541da2a35c7' => array(
					'key' => 'layout_5e541da2a35c7',
					'name' => 'video',
					'label' => 'Video',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5e541daaa35c8',
							'label' => 'Video',
							'name' => 'video',
							'type' => 'oembed',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'width' => '',
							'height' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5e56cde830280' => array(
					'key' => 'layout_5e56cde830280',
					'name' => 'gallery-flex-box',
					'label' => 'Gallery',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5e56cdf330281',
							'label' => 'Gallery',
							'name' => 'gallery-content',
							'type' => 'gallery',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'medium',
							'insert' => 'append',
							'library' => 'all',
							'min' => '',
							'max' => '',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5e5db3d551c8d' => array(
					'key' => 'layout_5e5db3d551c8d',
					'name' => 'single_article',
					'label' => 'Single Article',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5e5db3dd51c8e',
							'label' => 'Article',
							'name' => 'article',
							'type' => 'relationship',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => '',
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => '',
							'min' => '',
							'max' => 1,
							'return_format' => 'object',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5e56b4b61cc74' => array(
					'key' => 'layout_5e56b4b61cc74',
					'name' => 'twitter',
					'label' => 'Twitter',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5e56b4c01cc75',
							'label' => 'Twitter',
							'name' => 'twitter-flex',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5e7beb43d3e18' => array(
					'key' => 'layout_5e7beb43d3e18',
					'name' => 'email',
					'label' => 'Email Signup',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5e7beb43d3e19',
							'label' => 'Email',
							'name' => 'email-flex',
							'type' => 'text',
							'instructions' => 'Enter shortcode from Ninja forms. For example, for The Daily, copy and paste [ninja_form id=9] into the box.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_5e540ba0dc95c' => array(
					'key' => 'layout_5e540ba0dc95c',
					'name' => 'half_page_split',
					'label' => 'Half Page Split',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5e555575594fe',
							'label' => 'Left Side',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'placement' => 'top',
							'endpoint' => 0,
						),
						array(
							'key' => 'field_5e540baddc95d',
							'label' => 'Left Half',
							'name' => 'left_half',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'video' => 'Video',
								'body' => 'Body',
								'article' => 'Highlighted Article',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_5e5556b30eb16',
							'label' => 'Body Text',
							'name' => 'body_text_left',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5e540baddc95d',
										'operator' => '==',
										'value' => 'body',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
						array(
							'key' => 'field_5e55575212994',
							'label' => 'Video',
							'name' => 'video_left',
							'type' => 'oembed',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5e540baddc95d',
										'operator' => '==',
										'value' => 'video',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'width' => '',
							'height' => '',
						),
						array(
							'key' => 'field_5e5580d298a36',
							'label' => 'Highlighted Article',
							'name' => 'highlighted_article_left',
							'type' => 'relationship',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5e540baddc95d',
										'operator' => '==',
										'value' => 'article',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => '',
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => '',
							'min' => '',
							'max' => 1,
							'return_format' => 'object',
						),
						array(
							'key' => 'field_5e555586594ff',
							'label' => 'Right Side',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'placement' => 'top',
							'endpoint' => 0,
						),
						array(
							'key' => 'field_5e540d9cdc95e',
							'label' => 'Right Half',
							'name' => 'right_half',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'video' => 'Video',
								'body' => 'Body',
								'article' => 'Highlighted Article',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
							'return_format' => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key' => 'field_5e540f08283d0',
							'label' => 'Body Text',
							'name' => 'body_text_right',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5e540d9cdc95e',
										'operator' => '==',
										'value' => 'body',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
						array(
							'key' => 'field_5e540f39283d2',
							'label' => 'Video',
							'name' => 'video_right',
							'type' => 'oembed',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5e540d9cdc95e',
										'operator' => '==',
										'value' => 'video',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'width' => '',
							'height' => '',
						),
						array(
							'key' => 'field_5e55809186941',
							'label' => 'Highlighted Article',
							'name' => 'highlighted_article_right',
							'type' => 'relationship',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5e540d9cdc95e',
										'operator' => '==',
										'value' => 'article',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => '',
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => '',
							'min' => '',
							'max' => 1,
							'return_format' => 'object',
						),
					),
					'min' => '',
					'max' => '',
				),
			),
			'button_label' => 'Add Row',
			'min' => '',
			'max' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-page-flex-content.php',
			),
		),
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'discussion',
		4 => 'comments',
		5 => 'revisions',
		6 => 'slug',
		7 => 'author',
		8 => 'format',
		9 => 'page_attributes',
		10 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
));

endif;
