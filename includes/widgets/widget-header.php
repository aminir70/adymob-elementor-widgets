<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Header extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-header'; }
	public function get_title()      { return __( 'ADY هدر', 'adymob' ); }
	public function get_icon()       { return 'eicon-nav-menu'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {

		// ── Brand ────────────────────────────────────────────────────────────────
		$this->start_controls_section( 'brand_sec', [ 'label' => __( 'برند', 'adymob' ) ] );
		$this->add_control( 'logo',     [ 'label' => __( 'لوگو', 'adymob' ),      'type' => \Elementor\Controls_Manager::MEDIA ] );
		$this->add_control( 'logo_url', [ 'label' => __( 'لینک لوگو', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '/' ] ] );
		$this->add_control( 'logo_alt', [ 'label' => __( 'متن جایگزین', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'ADY MOB' ] );
		$this->end_controls_section();

		// ── Navigation ───────────────────────────────────────────────────────────
		$this->start_controls_section( 'nav_sec', [ 'label' => __( 'منوی ناوبری', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'text', [ 'label' => __( 'متن', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'خدمات' ] );
		$rep->add_control( 'url',  [ 'label' => __( 'لینک', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
		$this->add_control( 'nav_items', [
			'label'   => __( 'لینک‌ها', 'adymob' ),
			'type'    => \Elementor\Controls_Manager::REPEATER,
			'fields'  => $rep->get_controls(),
			'default' => [
				[ 'text' => 'خدمات',      'url' => [ 'url' => '#services' ] ],
				[ 'text' => 'نرخ ارز',    'url' => [ 'url' => '#rates' ] ],
				[ 'text' => 'نظرات',      'url' => [ 'url' => '#' ] ],
				[ 'text' => 'سوالات',     'url' => [ 'url' => '#faq' ] ],
				[ 'text' => 'بلاگ',       'url' => [ 'url' => '#blog' ] ],
			],
			'title_field' => '{{{ text }}}',
		] );
		$this->end_controls_section();

		// ── CTA Button ───────────────────────────────────────────────────────────
		$this->start_controls_section( 'cta_sec', [ 'label' => __( 'دکمه', 'adymob' ) ] );
		$this->add_control( 'btn_text', [ 'label' => __( 'متن دکمه', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'شروع کن' ] );
		$this->add_control( 'btn_url',  [ 'label' => __( 'لینک دکمه', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#cta' ] ] );
		$this->add_control( 'btn_show', [ 'label' => __( 'نمایش دکمه', 'adymob' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => 'yes' ] );
		$this->end_controls_section();

		// ── Style: Header ────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_header', [ 'label' => __( 'هدر', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'header_bg', [ 'label' => __( 'پس‌زمینه', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-header-inner' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'header_border_color', [ 'label' => __( 'رنگ خط پایین', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-header-inner' => 'border-bottom-color: {{VALUE}};' ] ] );
		$this->add_responsive_control( 'header_padding', [ 'label' => __( 'فاصله داخلی', 'adymob' ), 'type' => \Elementor\Controls_Manager::DIMENSIONS, 'size_units' => [ 'px', 'em' ], 'selectors' => [ '{{WRAPPER}} .adymob-header-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;' ] ] );
		$this->end_controls_section();

		// ── Style: Logo ──────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_logo', [ 'label' => __( 'لوگو', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'logo_height', [ 'label' => __( 'ارتفاع لوگو', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'range' => [ 'px' => [ 'min' => 20, 'max' => 120 ] ], 'default' => [ 'size' => 36, 'unit' => 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-header-logo img' => 'height: {{SIZE}}{{UNIT}};' ] ] );
		$this->end_controls_section();

		// ── Style: Navigation ────────────────────────────────────────────────────
		$this->start_controls_section( 'style_nav', [ 'label' => __( 'منو', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'nav_gap', [ 'label' => __( 'فاصله بین لینک‌ها', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 80 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-header-nav' => 'gap: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'nav_typo', 'label' => __( 'تایپوگرافی', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-header-nav a' ] );
		$this->add_control( 'nav_color',       [ 'label' => __( 'رنگ لینک', 'adymob' ),       'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-header-nav a' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'nav_hover_color', [ 'label' => __( 'رنگ لینک هاور', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-header-nav a:hover' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Button ────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_btn', [ 'label' => __( 'دکمه', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'btn_bg',     [ 'label' => __( 'پس‌زمینه', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-header-btn' => 'background: {{VALUE}} !important;' ] ] );
		$this->add_control( 'btn_color',  [ 'label' => __( 'رنگ متن', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-header-btn' => 'color: {{VALUE}} !important;' ] ] );
		$this->add_control( 'btn_radius', [ 'label' => __( 'گردی گوشه', 'adymob' ),    'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'range' => [ 'px' => [ 'max' => 50 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-header-btn' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'btn_typo', 'label' => __( 'تایپوگرافی', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-header-btn' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s       = $this->get_settings_for_display();
		$logo    = ! empty( $s['logo']['url'] ) ? esc_url( $s['logo']['url'] ) : '';
		$logo_lnk = isset( $s['logo_url']['url'] ) ? esc_url( $s['logo_url']['url'] ) : '/';
		$btn_url = isset( $s['btn_url']['url'] ) ? esc_url( $s['btn_url']['url'] ) : '#';
		$show_btn = ! empty( $s['btn_show'] ) && $s['btn_show'] === 'yes';
		?>
		<header class="adymob-widget adymob-header">
			<div class="adymob-header-inner">
				<a href="<?php echo $logo_lnk; ?>" class="adymob-header-logo">
					<?php if ( $logo ) : ?>
					<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( $s['logo_alt'] ); ?>">
					<?php else : ?>
					<span class="adymob-header-logo-text"><?php echo esc_html( $s['logo_alt'] ); ?></span>
					<?php endif; ?>
				</a>
				<?php if ( ! empty( $s['nav_items'] ) ) : ?>
				<nav class="adymob-header-nav">
					<?php foreach ( $s['nav_items'] as $item ) :
						$href = isset( $item['url']['url'] ) ? esc_url( $item['url']['url'] ) : '#';
					?>
					<a href="<?php echo $href; ?>"><?php echo esc_html( $item['text'] ); ?></a>
					<?php endforeach; ?>
				</nav>
				<?php endif; ?>
				<?php if ( $show_btn && ! empty( $s['btn_text'] ) ) : ?>
				<div class="adymob-header-actions">
					<a href="<?php echo $btn_url; ?>" class="adymob-btn adymob-btn-primary adymob-header-btn">
						<?php echo esc_html( $s['btn_text'] ); ?>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</header>
		<?php
	}
}
