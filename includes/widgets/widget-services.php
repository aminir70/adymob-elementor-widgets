<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Services extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-services'; }
	public function get_title()      { return __( 'ADY خدمات', 'adymob' ); }
	public function get_icon()       { return 'eicon-posts-grid'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head_sec', [ 'label' => __( 'سرتیتر بخش', 'adymob' ) ] );
		$this->add_control( 'eyebrow',   [ 'label' => __( 'برچسب', 'adymob' ),    'type' => \Elementor\Controls_Manager::TEXT,     'default' => '۰۱ — خدمات' ] );
		$this->add_control( 'title',     [ 'label' => __( 'تیتر', 'adymob' ),     'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => "هر چیزی که برای\nدلار درآوردن لازمه." ] );
		$this->add_control( 'desc',      [ 'label' => __( 'توضیح', 'adymob' ),    'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => 'شش سرویس مکمل که هم به کریتورها و توسعه‌دهنده‌ها، هم به کسب‌وکارها و افراد عادی کمک می‌کنه.' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'cards_sec', [ 'label' => __( 'کارت‌ها', 'adymob' ) ] );
		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'num',   [ 'label' => __( 'شماره', 'adymob' ),    'type' => \Elementor\Controls_Manager::TEXT, 'default' => '01' ] );
		$repeater->add_control( 'cat',   [ 'label' => __( 'دسته', 'adymob' ),     'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Creators' ] );
		$repeater->add_control( 'title', [ 'label' => __( 'عنوان', 'adymob' ),    'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'نقد یوتیوب' ] );
		$repeater->add_control( 'desc',  [ 'label' => __( 'توضیح', 'adymob' ),    'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'تبدیل درآمد AdSense یوتیوب به تومان با بهترین نرخ.' ] );
		$repeater->add_control( 'url',   [ 'label' => __( 'لینک', 'adymob' ),     'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
		$repeater->add_control( 'color', [ 'label' => __( 'رنگ کلاس', 'adymob' ), 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'c1',
			'options' => [ 'c1' => 'سبز تیل', 'c2' => 'مرجانی', 'c3' => 'نارنجی', 'c4' => 'بنفش', 'c5' => 'آبی', 'c6' => 'قهوه‌ای' ] ] );
		$repeater->add_control( 'icon',  [ 'label' => __( 'آیکون', 'adymob' ),    'type' => \Elementor\Controls_Manager::ICONS, 'default' => [ 'value' => 'fas fa-play', 'library' => 'fa-solid' ] ] );

		$this->add_control( 'items', [
			'label'  => __( 'خدمات', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 'num' => '01', 'cat' => 'Creators',  'title' => 'نقد درآمد یوتیوب', 'desc' => 'تبدیل درآمد AdSense یوتیوب به تومان با بهترین نرخ، بدون سقف مبلغ.', 'color' => 'c1', 'url' => [ 'url' => '#' ] ],
				[ 'num' => '02', 'cat' => 'Apps',       'title' => 'نقد درآمد ادموب',  'desc' => 'پرداخت‌های Google AdMob برای توسعه‌دهندگان اپ، مستقیم به کارت.', 'color' => 'c2', 'url' => [ 'url' => '#' ] ],
				[ 'num' => '03', 'cat' => 'Publishers', 'title' => 'نقد درآمد ادسنس', 'desc' => 'نقد درآمد سایت و بلاگ از گوگل ادسنس با کمیسیون شفاف.', 'color' => 'c3', 'url' => [ 'url' => '#' ] ],
				[ 'num' => '04', 'cat' => 'Business',   'title' => 'مدیریت گوگل ادز', 'desc' => 'شارژ و مدیریت کمپین‌های Google Ads با اکانت ریالی.', 'color' => 'c4', 'url' => [ 'url' => '#' ] ],
				[ 'num' => '05', 'cat' => 'FX',         'title' => 'حواله ارزی',       'desc' => 'ارسال و دریافت حواله دلار، یورو و درهم به نرخ روز.', 'color' => 'c5', 'url' => [ 'url' => '#' ] ],
				[ 'num' => '06', 'cat' => 'Support',    'title' => 'مشاوره تخصصی',    'desc' => 'تیم پشتیبانی ۲۴/۷ برای راهنمایی در تمام مراحل.', 'color' => 'c6', 'url' => [ 'url' => '#' ] ],
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
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'eyebrow_typo', 'label' => __( 'تایپوگرافی برچسب', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-eyebrow' ] );
		$this->add_control( 'eyebrow_color', [ 'label' => __( 'رنگ برچسب', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-eyebrow' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'title_typo', 'label' => __( 'تایپوگرافی تیتر', 'adymob' ),   'selector' => '{{WRAPPER}} .adymob-sec-title' ] );
		$this->add_control( 'title_color',   [ 'label' => __( 'رنگ تیتر', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-title' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'desc_typo',  'label' => __( 'تایپوگرافی توضیح', 'adymob' ),  'selector' => '{{WRAPPER}} .adymob-sec-desc' ] );
		$this->add_control( 'desc_color',    [ 'label' => __( 'رنگ توضیح', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-desc' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Cards ─────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_cards', [ 'label' => __( 'کارت‌ها', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'grid_gap', [ 'label' => __( 'فاصله بین کارت‌ها', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 80 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-services-grid' => 'gap: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'card_bg',      [ 'label' => __( 'رنگ پس‌زمینه کارت', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-svc-card' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'card_radius',  [ 'label' => __( 'گردی گوشه', 'adymob' ),          'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-svc-card' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'card_title_typo', 'label' => __( 'تایپوگرافی عنوان کارت', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-svc-card h3' ] );
		$this->add_control( 'card_title_color', [ 'label' => __( 'رنگ عنوان کارت', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-svc-card h3' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'card_desc_color',  [ 'label' => __( 'رنگ توضیح کارت', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-svc-card p' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'card_link_color',  [ 'label' => __( 'رنگ لینک کارت', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-svc-card .cta-link' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="adymob-widget" id="services" style="padding:100px 0">
			<div class="adymob-sec-head">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h2 class="adymob-sec-title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
				</div>
				<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<?php if ( ! empty( $s['items'] ) ) : ?>
			<div class="adymob-services-grid">
				<?php foreach ( $s['items'] as $i => $item ) :
					$link = isset( $item['url']['url'] ) ? esc_url( $item['url']['url'] ) : '#';
				?>
				<div class="adymob-svc-card <?php echo esc_attr( $item['color'] ); ?>">
					<div class="tag"><?php echo esc_html( $item['cat'] ); ?></div>
					<div class="num"><?php echo esc_html( $item['num'] ); ?></div>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</div>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['desc'] ); ?></p>
					<a href="<?php echo $link; ?>" class="cta-link">بیشتر بخوانید →</a>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</section>
		<?php
	}
}
