<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Testimonials extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-testimonials'; }
	public function get_title()      { return __( 'ADY نظرات مشتریان', 'adymob' ); }
	public function get_icon()       { return 'eicon-testimonial'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head', [ 'label' => __( 'سرتیتر', 'adymob' ) ] );
		$this->add_control( 'eyebrow', [ 'label' => __( 'برچسب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => '۰۵ — نظرات مشتریان' ] );
		$this->add_control( 'title',   [ 'label' => __( 'تیتر', 'adymob' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "حرف‌های کسایی که\nما رو تجربه کردن." ] );
		$this->add_control( 'desc',    [ 'label' => __( 'توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'نظر واقعی یوتیوبرها، توسعه‌دهنده‌ها و کسب‌وکارها. بدون فیلتر.' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'reviews', [ 'label' => __( 'نظرات', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'quote',   [ 'label' => __( 'نظر', 'adymob' ),       'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'خدمات عالی بود.' ] );
		$rep->add_control( 'name',    [ 'label' => __( 'نام', 'adymob' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'علی محمدی' ] );
		$rep->add_control( 'initials',[ 'label' => __( 'حروف اختصاری', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'ع.م' ] );
		$rep->add_control( 'role',    [ 'label' => __( 'نقش', 'adymob' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'YouTuber' ] );
		$rep->add_control( 'featured',[ 'label' => __( 'برجسته (بزرگ)', 'adymob' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => '' ] );
		$this->add_control( 'items', [
			'label'  => __( 'نظرات', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'featured' => 'yes', 'quote' => '«سه ساله درآمد یوتیوبم رو ADY MOB نقد می‌کنه. نرخ‌شون همیشه بهتر از بقیه‌س.»', 'name' => 'محمدرضا کریمی', 'initials' => 'م.ر', 'role' => 'YouTuber · 280K sub' ],
				[ 'quote' => '«برای اپم درآمد ادموب رو از ADY نقد می‌کنم. سرعت تسویه‌شون واقعا خفنه.»', 'name' => 'سینا احمدی', 'initials' => 'س.ا', 'role' => 'App Developer' ],
				[ 'quote' => '«گوگل‌ادز شرکت‌مون رو اینجا شارژ می‌کنیم. فاکتور شفاف و سرویس بی‌نقص.»', 'name' => 'نازنین مرادی', 'initials' => 'ن.م', 'role' => 'Marketing Lead' ],
				[ 'quote' => '«حواله دلاری با بهترین نرخ، بدون دردسر.»', 'name' => 'رضا صادقی', 'initials' => 'ر.ص', 'role' => 'Freelancer' ],
				[ 'quote' => '«ادسنس بلاگم رو یک ساله از اینجا می‌گیرم. هیچ‌وقت تاخیر نداشته‌ن.»', 'name' => 'پریسا جعفری', 'initials' => 'پ.ج', 'role' => 'Blogger' ],
			],
			'title_field' => '{{{ name }}}',
		] );
		$this->end_controls_section();

		// ── Style: Section ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_section', [ 'label' => __( 'بخش', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'section_bg', [ 'label' => __( 'رنگ پس‌زمینه', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-widget' => 'background-color: {{VALUE}};' ] ] );
		$this->add_responsive_control( 'section_padding', [ 'label' => __( 'فاصله داخلی', 'adymob' ), 'type' => \Elementor\Controls_Manager::DIMENSIONS, 'size_units' => [ 'px', 'em', '%' ], 'selectors' => [ '{{WRAPPER}} .adymob-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;' ] ] );
		$this->end_controls_section();

		// ── Style: Heading ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_heading', [ 'label' => __( 'سرتیتر', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'eyebrow_typo', 'label' => __( 'تایپوگرافی برچسب', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-eyebrow' ] );
		$this->add_control( 'eyebrow_color', [ 'label' => __( 'رنگ برچسب', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-eyebrow' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'title_typo', 'selector' => '{{WRAPPER}} .adymob-sec-title' ] );
		$this->add_control( 'title_color',   [ 'label' => __( 'رنگ تیتر', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-title' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'desc_typo',  'selector' => '{{WRAPPER}} .adymob-sec-desc' ] );
		$this->add_control( 'desc_color',    [ 'label' => __( 'رنگ توضیح', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-desc' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Cards ─────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_cards', [ 'label' => __( 'کارت‌های نظر', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'grid_gap', [ 'label' => __( 'فاصله بین کارت‌ها', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 80 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-tm-grid' => 'gap: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'card_bg',       [ 'label' => __( 'پس‌زمینه کارت', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-tm-card' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'card_radius',   [ 'label' => __( 'گردی گوشه', 'adymob' ),         'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-tm-card' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'star_color',    [ 'label' => __( 'رنگ ستاره‌ها', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .tm-stars' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'quote_typo', 'label' => __( 'تایپوگرافی نظر', 'adymob' ), 'selector' => '{{WRAPPER}} .tm-quote' ] );
		$this->add_control( 'quote_color',   [ 'label' => __( 'رنگ نظر', 'adymob' ),          'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .tm-quote' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'avatar_bg',     [ 'label' => __( 'پس‌زمینه آواتار', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-tm-card .av' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'avatar_color',  [ 'label' => __( 'رنگ متن آواتار', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-tm-card .av' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'name_color',    [ 'label' => __( 'رنگ نام', 'adymob' ),           'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .tm-person .name' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'role_color',    [ 'label' => __( 'رنگ نقش', 'adymob' ),           'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .tm-person .role' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="adymob-widget" style="padding:100px 0">
			<div class="adymob-sec-head">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h2 class="adymob-sec-title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
				</div>
				<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<?php if ( ! empty( $s['items'] ) ) : ?>
			<div class="adymob-tm-grid">
				<?php foreach ( $s['items'] as $item ) :
					$is_big = ! empty( $item['featured'] ) && $item['featured'] === 'yes';
				?>
				<div class="adymob-tm-card <?php echo $is_big ? 'big' : ''; ?>">
					<div>
						<div class="tm-stars">★★★★★</div>
						<div class="tm-quote"><?php echo esc_html( $item['quote'] ); ?></div>
					</div>
					<div class="tm-person">
						<div class="av"><?php echo esc_html( $item['initials'] ); ?></div>
						<div>
							<div class="name"><?php echo esc_html( $item['name'] ); ?></div>
							<div class="role"><?php echo esc_html( $item['role'] ); ?></div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</section>
		<?php
	}
}
