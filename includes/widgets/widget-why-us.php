<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Why_Us extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-why-us'; }
	public function get_title()      { return __( 'ADY چرا ما', 'adymob' ); }
	public function get_icon()       { return 'eicon-star'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head', [ 'label' => __( 'سرتیتر', 'adymob' ) ] );
		$this->add_control( 'eyebrow', [ 'label' => __( 'برچسب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => '۰۲ — چرا ما' ] );
		$this->add_control( 'title',   [ 'label' => __( 'تیتر', 'adymob' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "وقتی نرخ مهمه،\nاعتماد مهم‌تره." ] );
		$this->add_control( 'desc',    [ 'label' => __( 'توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'ما هفت سال است روی یک چیز تمرکز کرده‌ایم: بی‌دردسر کردن نقد درآمد دلاری برای ایرانی‌ها.' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'items_sec', [ 'label' => __( 'مزایا', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'num',   [ 'label' => __( 'شماره', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'مزیت ۰۱' ] );
		$rep->add_control( 'title', [ 'label' => __( 'عنوان', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'بهترین نرخ بازار' ] );
		$rep->add_control( 'desc',  [ 'label' => __( 'توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'به‌روزرسانی لحظه‌ای بر اساس صرافی‌های معتبر.' ] );
		$this->add_control( 'items', [
			'label'  => __( 'آیتم‌ها', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'num' => 'مزیت ۰۱', 'title' => 'بهترین نرخ بازار',     'desc' => 'به‌روزرسانی لحظه‌ای بر اساس صرافی‌های معتبر، بدون سود اضافه.' ],
				[ 'num' => 'مزیت ۰۲', 'title' => 'تسویه در <۲۴ ساعت',   'desc' => 'میانگین پرداخت ما ۱۴ ساعت است، با پشتیبانی از تمام بانک‌های ایرانی.' ],
				[ 'num' => 'مزیت ۰۳', 'title' => 'امنیت و شفافیت',       'desc' => 'هر تراکنش رسید دیجیتال دارد. اطلاعات با رمزنگاری AES محافظت می‌شود.' ],
				[ 'num' => 'مزیت ۰۴', 'title' => 'تیم تخصصی',            'desc' => 'مشاوران ما خودشان کریتور و دولوپرند؛ دقیقا می‌فهمند شما چه می‌خواهید.' ],
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
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'title_typo', 'label' => __( 'تایپوگرافی تیتر', 'adymob' ),   'selector' => '{{WRAPPER}} .adymob-sec-title' ] );
		$this->add_control( 'title_color',   [ 'label' => __( 'رنگ تیتر', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-title' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'desc_typo',  'label' => __( 'تایپوگرافی توضیح', 'adymob' ),  'selector' => '{{WRAPPER}} .adymob-sec-desc' ] );
		$this->add_control( 'desc_color',    [ 'label' => __( 'رنگ توضیح', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-desc' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Items ─────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_items', [ 'label' => __( 'آیتم‌ها', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'item_bg',         [ 'label' => __( 'پس‌زمینه آیتم', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-why-item' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'item_radius',     [ 'label' => __( 'گردی گوشه', 'adymob' ),        'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-why-item' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'item_num_color',  [ 'label' => __( 'رنگ شماره', 'adymob' ),       'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-why-item .n' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'item_title_typo', 'label' => __( 'تایپوگرافی عنوان آیتم', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-why-item h4' ] );
		$this->add_control( 'item_title_color', [ 'label' => __( 'رنگ عنوان آیتم', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-why-item h4' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'item_desc_color',  [ 'label' => __( 'رنگ توضیح آیتم', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-why-item p'  => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="adymob-widget" style="padding:100px 0">
			<div class="adymob-why-wrap">
				<div class="adymob-sec-head" style="margin-bottom:0;grid-template-columns:1fr 1fr">
					<div>
						<span class="adymob-eyebrow" style="color:var(--adymob-orange)"><?php echo esc_html( $s['eyebrow'] ); ?></span>
						<h2 class="adymob-sec-title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
					</div>
					<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
				</div>
				<?php if ( ! empty( $s['items'] ) ) : ?>
				<div class="adymob-why-grid">
					<?php foreach ( $s['items'] as $item ) : ?>
					<div class="adymob-why-item">
						<div class="n"><?php echo esc_html( $item['num'] ); ?></div>
						<h4><?php echo esc_html( $item['title'] ); ?></h4>
						<p><?php echo esc_html( $item['desc'] ); ?></p>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}
