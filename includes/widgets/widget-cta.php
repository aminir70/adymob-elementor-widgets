<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Cta extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-cta'; }
	public function get_title()      { return __( 'ADY فراخوان عمل (CTA)', 'adymob' ); }
	public function get_icon()       { return 'eicon-call-to-action'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content', [ 'label' => __( 'محتوا', 'adymob' ) ] );
		$this->add_control( 'title',          [ 'label' => __( 'تیتر', 'adymob' ),         'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "آماده‌ای درآمد دلاری‌تو\nبه ریال تبدیل کنی؟" ] );
		$this->add_control( 'text',           [ 'label' => __( 'متن', 'adymob' ),           'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'همین الان ثبت‌نام کن و اولین تراکنشت رو با ۵۰٪ تخفیف کارمزد انجام بده.' ] );
		$this->add_control( 'btn1_text',      [ 'label' => __( 'متن دکمه اول', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'ثبت‌نام رایگان' ] );
		$this->add_control( 'btn1_url',       [ 'label' => __( 'لینک دکمه اول', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL,      'default' => [ 'url' => '#' ] ] );
		$this->add_control( 'btn2_text',      [ 'label' => __( 'متن دکمه دوم', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'تماس با مشاور' ] );
		$this->add_control( 'btn2_url',       [ 'label' => __( 'لینک دکمه دوم', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL,      'default' => [ 'url' => '#' ] ] );
		$this->end_controls_section();

		// ── Style: Section ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_section', [ 'label' => __( 'بخش', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_group_control( \Elementor\Group_Control_Background::get_type(), [
			'name'     => 'section_bg',
			'label'    => __( 'پس‌زمینه', 'adymob' ),
			'types'    => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} .adymob-cta-wrap',
		] );
		$this->add_responsive_control( 'section_padding', [ 'label' => __( 'فاصله داخلی', 'adymob' ), 'type' => \Elementor\Controls_Manager::DIMENSIONS, 'size_units' => [ 'px', 'em', '%' ], 'selectors' => [ '{{WRAPPER}} section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;' ] ] );
		$this->add_control( 'wrap_radius', [ 'label' => __( 'گردی گوشه کارت', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-cta-wrap' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->end_controls_section();

		// ── Style: Text ──────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_text', [ 'label' => __( 'متن', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'title_typo', 'label' => __( 'تایپوگرافی تیتر', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-cta-wrap h2' ] );
		$this->add_control( 'title_color', [ 'label' => __( 'رنگ تیتر', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-cta-wrap h2' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'text_typo',  'label' => __( 'تایپوگرافی متن', 'adymob' ),  'selector' => '{{WRAPPER}} .adymob-cta-wrap p' ] );
		$this->add_control( 'text_color',  [ 'label' => __( 'رنگ متن', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-cta-wrap p'  => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Buttons ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_btns', [ 'label' => __( 'دکمه‌ها', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'btns_margin_top', [ 'label' => __( 'فاصله از متن بالا', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 120 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-cta-btns' => 'margin-top: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_responsive_control( 'btns_gap', [ 'label' => __( 'فاصله بین دکمه‌ها', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 60 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-cta-btns' => 'gap: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'btn1_bg',     [ 'label' => __( 'پس‌زمینه دکمه اول', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-btn-primary' => 'background: {{VALUE}} !important;' ] ] );
		$this->add_control( 'btn1_color',  [ 'label' => __( 'رنگ متن دکمه اول', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-btn-primary' => 'color: {{VALUE}} !important;' ] ] );
		$this->add_control( 'btn1_radius', [ 'label' => __( 'گردی دکمه اول', 'adymob' ),       'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-btn-primary' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'btn2_color',  [ 'label' => __( 'رنگ متن دکمه دوم', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-btn-ghost' => 'color: {{VALUE}} !important;' ] ] );
		$this->add_control( 'btn2_border', [ 'label' => __( 'رنگ حاشیه دکمه دوم', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-btn-ghost' => 'border-color: {{VALUE}} !important;' ] ] );
		$this->add_control( 'btn2_radius', [ 'label' => __( 'گردی دکمه دوم', 'adymob' ),       'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-btn-ghost' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s    = $this->get_settings_for_display();
		$url1 = isset( $s['btn1_url']['url'] ) ? esc_url( $s['btn1_url']['url'] ) : '#';
		$url2 = isset( $s['btn2_url']['url'] ) ? esc_url( $s['btn2_url']['url'] ) : '#';
		?>
		<section class="adymob-widget" id="cta" style="padding:100px 0">
			<div class="adymob-cta-wrap">
				<h2><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
				<p><?php echo esc_html( $s['text'] ); ?></p>
				<div class="adymob-cta-btns">
					<a href="<?php echo $url1; ?>" class="adymob-btn adymob-btn-primary"><?php echo esc_html( $s['btn1_text'] ); ?></a>
					<a href="<?php echo $url2; ?>" class="adymob-btn adymob-btn-ghost"><?php echo esc_html( $s['btn2_text'] ); ?></a>
				</div>
			</div>
		</section>
		<?php
	}
}
