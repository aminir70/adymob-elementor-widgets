<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_How_It_Works extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-how-it-works'; }
	public function get_title()      { return __( 'ADY مراحل کار', 'adymob' ); }
	public function get_icon()       { return 'eicon-flow'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head', [ 'label' => __( 'سرتیتر', 'adymob' ) ] );
		$this->add_control( 'eyebrow', [ 'label' => __( 'برچسب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => '۰۳ — چطور کار می‌کنه' ] );
		$this->add_control( 'title',   [ 'label' => __( 'تیتر', 'adymob' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "چهار قدم تا\nتسویه در حسابت." ] );
		$this->add_control( 'desc',    [ 'label' => __( 'توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'فرآیند ساده، شفاف و سریع. از لحظه ثبت سفارش تا واریز به حساب.' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'steps_sec', [ 'label' => __( 'مراحل', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'num',   [ 'label' => __( 'شماره', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۰۱' ] );
		$rep->add_control( 'title', [ 'label' => __( 'عنوان', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'ثبت سفارش' ] );
		$rep->add_control( 'desc',  [ 'label' => __( 'توضیح', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'نوع خدمت و مبلغ رو انتخاب کن.' ] );
		$this->add_control( 'steps', [
			'label'  => __( 'مراحل', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'num' => '۰۱', 'title' => 'ثبت سفارش',  'desc' => 'نوع خدمت و مبلغ رو انتخاب کن. یک فرم ساده کافیه.' ],
				[ 'num' => '۰۲', 'title' => 'تایید و احراز', 'desc' => 'اطلاعات بررسی میشه و کمتر از ۱۰ دقیقه تایید می‌شه.' ],
				[ 'num' => '۰۳', 'title' => 'انتقال وجه',  'desc' => 'مبلغ دلاری رو به حساب امن ما ارسال می‌کنی.' ],
				[ 'num' => '۰۴', 'title' => 'تسویه فوری',  'desc' => 'معادل ریالی با بهترین نرخ مستقیم به کارت شما.' ],
			],
			'title_field' => '{{{ title }}}',
		] );
		$this->end_controls_section();

		// ── Style: Section ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_section', [ 'label' => __( 'بخش', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'section_bg', [ 'label' => __( 'رنگ پس‌زمینه', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-widget' => 'background-color: {{VALUE}};' ] ] );
		$this->add_responsive_control( 'section_padding', [ 'label' => __( 'فاصله داخلی', 'adymob' ), 'type' => \Elementor\Controls_Manager::DIMENSIONS, 'size_units' => [ 'px', 'em', '%' ], 'selectors' => [ '{{WRAPPER}} .adymob-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;' ] ] );
		$this->end_controls_section();

		// ── Style: Heading ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_heading', [ 'label' => __( 'سرتیتر', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'eyebrow_color', [ 'label' => __( 'رنگ برچسب', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-eyebrow' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'title_typo', 'selector' => '{{WRAPPER}} .adymob-sec-title' ] );
		$this->add_control( 'title_color', [ 'label' => __( 'رنگ تیتر', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-title' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'desc_typo',  'selector' => '{{WRAPPER}} .adymob-sec-desc' ] );
		$this->add_control( 'desc_color',  [ 'label' => __( 'رنگ توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-desc' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Steps ─────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_steps', [ 'label' => __( 'مراحل', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'grid_gap', [ 'label' => __( 'فاصله بین مراحل', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 80 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-how-steps' => 'gap: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'circle_bg',    [ 'label' => __( 'رنگ دایره شماره', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-step-card .circle' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'circle_color', [ 'label' => __( 'رنگ متن دایره', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-step-card .circle' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'step_card_bg', [ 'label' => __( 'پس‌زمینه کارت مرحله', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-step-card' => 'background-color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'step_title_typo', 'selector' => '{{WRAPPER}} .adymob-step-card h4' ] );
		$this->add_control( 'step_title_color', [ 'label' => __( 'رنگ عنوان مرحله', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-step-card h4' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'step_desc_color',  [ 'label' => __( 'رنگ توضیح مرحله', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-step-card p'  => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="adymob-widget" id="how" style="padding:100px 0">
			<div class="adymob-sec-head">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h2 class="adymob-sec-title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
				</div>
				<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<?php if ( ! empty( $s['steps'] ) ) : ?>
			<div class="adymob-how-steps">
				<?php foreach ( $s['steps'] as $step ) : ?>
				<div class="adymob-step-card">
					<div class="circle"><?php echo esc_html( $step['num'] ); ?></div>
					<h4><?php echo esc_html( $step['title'] ); ?></h4>
					<p><?php echo esc_html( $step['desc'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</section>
		<?php
	}
}
