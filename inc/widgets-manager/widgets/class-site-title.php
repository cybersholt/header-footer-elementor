<?php
/**
 * Elementor Classes.
 *
 * @package header-footer-elementor
 */

namespace HFE\WidgetsManager\Widgets;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) {
	exit;   // Exit if accessed directly.
}

/**
 * HFE Retina widget
 *
 * HFE widget for Retina Image.
 *
 * @since 1.2.0
 */
class Site_Title extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.2.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'site-title';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.2.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Site Title', 'header-footer-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.2.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-search';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.2.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hfe-widgets' ];
	}

	/**
	 * Register site title controls controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function _register_controls() {

		$this->register_general_content_controls();
		$this->register_style_content_controls();
		$this->register_heading_typo_content_controls();
	}

	/**
	 * Register Advanced Heading General Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function register_general_content_controls() {

		$this->start_controls_section(
			'section_general_fields',
			[
				'label' => __( 'General', 'header-footer-elementor' ),
			]
		);

		$this->add_control(
			'before',
			[
				'label'   => __( 'Before Title text', 'header-footer-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => '1',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'after',
			[
				'label'   => __( 'After Title Text', 'header-footer-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => '1',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'heading_link',
			[
				'label'       => __( 'Link', 'header-footer-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'header-footer-elementor' ),
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					'url' => '',
				],
			]
		);
		$this->end_controls_section();
	}



	/**
	 * Register Advanced Heading Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function register_style_content_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'General', 'header-footer-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'heading_text_align',
			[
				'label'        => __( 'Overall Alignment', 'header-footer-elementor' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => __( 'Left', 'header-footer-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'header-footer-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'header-footer-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'selectors'    => [
					'{{WRAPPER}} .hfe-heading,{{WRAPPER}} .hfe-sub-heading, {{WRAPPER}} .hfe-sub-heading *,{{WRAPPER}} .hfe-subheading, {{WRAPPER}} .hfe-subheading *, {{WRAPPER}} .hfe-separator-parent' => 'text-align: {{VALUE}};',
				],
				'prefix_class' => 'hfe%s-heading-align-',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register Advanced Heading Typography Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function register_heading_typo_content_controls() {
		$this->start_controls_section(
			'section_heading_typography',
			[
				'label' => __( 'Heading', 'header-footer-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label'   => __( 'HTML Tag', 'header-footer-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'header-footer-elementor' ),
					'h2' => __( 'H2', 'header-footer-elementor' ),
					'h3' => __( 'H3', 'header-footer-elementor' ),
					'h4' => __( 'H4', 'header-footer-elementor' ),
					'h5' => __( 'H5', 'header-footer-elementor' ),
					'h6' => __( 'H6', 'header-footer-elementor' ),
				],
				'default' => 'h2',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hfe-heading, {{WRAPPER}} .hfe-heading a',
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label'     => __( 'Color', 'header-footer-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hfe-heading-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'heading_shadow',
				'selector' => '{{WRAPPER}} .hfe-heading-text',
			]
		);
		$this->add_responsive_control(
			'heading_margin',
			[
				'label'      => __( 'Title Margin', 'header-footer-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default'    => [
					'top'      => '0',
					'bottom'   => '15',
					'left'     => '0',
					'right'    => '0',
					'unit'     => 'px',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .hfe-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'blend_mode',
			[
				'label'     => __( 'Blend Mode', 'header-footer-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''            => __( 'Normal', 'header-footer-elementor' ),
					'multiply'    => 'Multiply',
					'screen'      => 'Screen',
					'overlay'     => 'Overlay',
					'darken'      => 'Darken',
					'lighten'     => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation'  => 'Saturation',
					'color'       => 'Color',
					'difference'  => 'Difference',
					'exclusion'   => 'Exclusion',
					'hue'         => 'Hue',
					'luminosity'  => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .hfe-heading-text' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->end_controls_section();
	}



	/**
	 * Render Heading output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function render() {

		$settings         = $this->get_settings();
		$dynamic_settings = $this->get_settings_for_display();
		$title            = get_bloginfo( 'name' );

		$this->add_inline_editing_attributes( 'heading_title', 'basic' );
		$this->add_inline_editing_attributes( 'sub_heading', 'advanced' );

		if ( ! empty( $dynamic_settings['heading_link']['url'] ) ) {
			$this->add_render_attribute( 'url', 'href', $dynamic_settings['heading_link']['url'] );

			if ( $dynamic_settings['heading_link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}

			if ( ! empty( $dynamic_settings['heading_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}
			$link = $this->get_render_attribute_string( 'url' );
		}
		?>

		<div class="hfe-module-content hfe-heading-wrapper">
		<?php if ( ! empty( $dynamic_settings['heading_link']['url'] ) ) { ?>
					<a <?php echo $link; ?> >
				<?php } ?>
			<<?php echo $settings['heading_tag']; ?> class="hfe-heading">
						<span class="hfe-heading-text elementor-inline-editing hfe-size--<?php echo $settings['size']; ?>" >
						<?php
						if ( '' !== $settings['before'] ) {
							echo $settings['before'];
						}
						echo $title;
						if ( '' !== $settings['after'] ) {
							echo $settings['after'];
						}
						?>
						</span>
						<?php if ( ! empty( $dynamic_settings['heading_link']['url'] ) ) { ?>
					</a>	
					<?php } ?>					
			</<?php echo $settings['heading_tag']; ?>>
		</div>
		<?php
	}
		/**
		 * Render Heading widgets output in the editor.
		 *
		 * Written as a Backbone JavaScript template and used to generate the live preview.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
	protected function _content_template() {

		?>
		<#
		if ( '' == settings.heading_title ) {
			return;
		}
		if ( '' == settings.size ){
			return;
		}
		if ( '' != settings.heading_link.url ) {
			view.addRenderAttribute( 'url', 'href', settings.heading_link.url );
		}
		#>
		<div class="hfe-module-content hfe-heading-wrapper">
			<{{{ settings.heading_tag }}} class="hfe-heading">
				<# if ( '' != settings.heading_link.url ) { #>
					<a {{{ view.getRenderAttributeString( 'url' ) }}} >
				<# } #>
				<span class="hfe-heading-text elementor-inline-editing hfe-size--{{{ settings.size }}}" data-elementor-setting-key="heading_title" data-elementor-inline-editing-toolbar="basic" >
				<#if ( '' != settings.before ){#>
					{{{ settings.before }}}
				<#}#>
				<?php echo get_bloginfo( 'name' ); ?>
				<# if ( '' != settings.after ){#>
					{{{ settings.after }}}
				<#}#>
				</span>
				<# if ( '' != settings.heading_link.url ) { #>
					</a>
				<# } #>
			</{{{ settings.heading_tag }}}>
		</div>
		<?php
	}
}
