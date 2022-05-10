<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


class IS_Select_Elementor extends Widget_Base
{
	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'is-select-elementor';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Campo selecione', 'is_select_elementor');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-select';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url()
	{
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['basic'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords()
	{
		return ['select', 'link'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'section_select',
			[
				'label' => __('Selecione', 'is_select_elementor'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__('Descrição', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Descrição select', 'is_select_elementor'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_value',
			[
				'label' => esc_html__('Value', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('#', 'is_select_elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__('Lista de selecione', 'is_select_elementor'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__('Texto #1', 'is_select_elementor'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'is_select_elementor'),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->add_control(
			'hr_1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);


		$this->add_control(
			'select_init_show',
			[
				'label'        => __('Exibir valor inicial', 'is_select_elementor'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on' => _x('Yes', 'On/Off', 'is_select_elementor'),
				'label_off' => _x('No', 'On/Off', 'is_select_elementor'),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'select_init_text',
			[
				'label' => __('Texto do valor inicial', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,

				'label_block' => true,
				'default' => __('Selecione...', 'is_select_elementor'),
				'description' => ''
			]
		);

		$this->add_control(
			'hr_2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'select_width',
			[
				'label' => esc_html__('Tamanho %', 'is_select_elementor'),
				'type' => Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 100,
				'selectors' => [
					'{{WRAPPER}} .select-elementor' => 'width: {{VALUE}}%',
				],
			]
		);

		$this->add_control(
			'select_color',
			[
				'label' => esc_html__('Cor', 'is_select_elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .select-elementor' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'select_content_typography',
				'selector' => '{{WRAPPER}} .select-elementor',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'select_background',
				'label' => esc_html__('Background', 'is_select_elementor'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .select-elementor',
			]
		);


		$this->add_control(
			'select_margin',
			[
				'label' => esc_html__('Margin', 'is_select_elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .select-elementor' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'select_padding',
			[
				'label' => esc_html__('Padding', 'is_select_elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .select-elementor' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'select_border',
				'label' => esc_html__('Border', 'is_select_elementor'),
				'selector' => '{{WRAPPER}} .select-elementor',
			]
		);

		$this->add_control(
			'hr_3_1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'select_id',
			[
				'label' => __('ID', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('id-select-elementor', 'is_select_elementor'),
				'description' => __('Atributo id do campo select', 'is_select_elementor'),
			]
		);

		$this->add_control(
			'select_name',
			[
				'label' => __('Name', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('name_select_elementor', 'is_select_elementor'),
				'description' => __('Atributo name do campo select', 'is_select_elementor'),
			]
		);

		$this->add_control(
			'select_class',
			[
				'label' => __('Class', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('select_move_div', 'is_select_elementor'),
				'description' => __('Atributo class do campo select', 'is_select_elementor'),
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_text',
			[
				'label' => __('Texto', 'is_select_elementor'),
			]
		);

		$this->add_control(
			'text_show',
			[
				'label'        => __('Exibir Texto', 'is_select_elementor'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on' => _x('Yes', 'On/Off', 'is_select_elementor'),
				'label_off' => _x('No', 'On/Off', 'is_select_elementor'),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'text_text',
			[
				'label' => __('Texto do campo', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,

				'label_block' => true,
				'default' => __('Selecione aqui', 'is_select_elementor'),
				'description' => ''
			]
		);

		$this->add_control(
			'hr_4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__('Cor', 'is_select_elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-select-elementor' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_content_typography',
				'selector' => '{{WRAPPER}} .text-select-elementor',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => __('Botão', 'is_select_elementor'),
			]
		);

		$this->add_control(
			'button_show',
			[
				'label'        => __('Exibir Botão', 'is_select_elementor'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on' => _x('Yes', 'On/Off', 'is_select_elementor'),
				'label_off' => _x('No', 'On/Off', 'is_select_elementor'),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Texto do botão', 'is_select_elementor'),
				'type' => Controls_Manager::TEXT,

				'label_block' => true,
				'default' => __('Ir', 'is_select_elementor'),
				'description' => ''
			]
		);

		$this->add_control(
			'hr_5',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'button_margin',
			[
				'label' => esc_html__('Margin', 'is_select_elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .button-class' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'is_select_elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .button-class' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_6',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_content_typography',
				'selector' => '{{WRAPPER}} .button-class',
			]
		);

		$this->add_control(
			'hr_7',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Cor', 'is_select_elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => esc_html__('Background', 'is_select_elementor'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .button-class',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__('Border', 'is_select_elementor'),
				'selector' => '{{WRAPPER}} .button-class',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'plugin-name'),
			]
		);

		$this->add_control(
			'button_color_hover',
			[
				'label' => esc_html__('Cor', 'is_select_elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-class:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'label' => esc_html__('Background', 'is_select_elementor'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .button-class:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'label' => esc_html__('Border', 'is_select_elementor'),
				'selector' => '{{WRAPPER}} .button-class:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();



		$this->end_controls_section();

		$this->start_controls_section(
			'section_layout',
			[
				'label' => __('Layout', 'is_select_elementor'),
			]
		);

		$this->add_control(
			'button_color_hover',
			[
				'label' => esc_html__('Cor', 'is_select_elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'layout_direction',
			[
				'label' => esc_html__('Direction', 'is_select_elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'row' => [
						'title' => esc_html__('Row', 'is_select_elementor'),
						'icon' => 'eicon-ellipsis-h',
					],
					'column' => [
						'title' => esc_html__('Column', 'is_select_elementor'),
						'icon' => 'eicon-ellipsis-v',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);

		$this->add_control(
			'layout_align_h',
			[
				'label' => esc_html__('Alinhamento', 'is_select_elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start_h' => [
						'title' => esc_html__('Left', 'is_select_elementor'),
						'icon' => 'eicon-h-align-left',
					],
					'center_h' => [
						'title' => esc_html__('Center', 'is_select_elementor'),
						'icon' => 'eicon-h-align-center',
					],
					'end_h' => [
						'title' => esc_html__('Right', 'is_select_elementor'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings();

		is_select_render($settings);
	}
}
