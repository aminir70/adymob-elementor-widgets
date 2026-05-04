<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Faq extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-faq'; }
	public function get_title()      { return __( 'ADY سوالات متداول', 'adymob' ); }
	public function get_icon()       { return 'eicon-accordion'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head', [ 'label' => __( 'سرتیتر', 'adymob' ) ] );
		$this->add_control( 'eyebrow', [ 'label' => __( 'برچسب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => '۰۷ — سوالات متداول' ] );
		$this->add_control( 'title',   [ 'label' => __( 'تیتر', 'adymob' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "هر سوالی داری،\nجوابش اینجاست." ] );
		$this->add_control( 'desc',    [ 'label' => __( 'توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'رایج‌ترین سوالاتی که کاربرا از ما می‌پرسن.' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'support_sec', [ 'label' => __( 'کارت پشتیبانی', 'adymob' ) ] );
		$this->add_control( 'support_title', [ 'label' => __( 'تیتر', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۲۴/۷ در کنارت.' ] );
		$this->add_control( 'support_text',  [ 'label' => __( 'متن', 'adymob' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'تیم پشتیبانی ADY در هر ساعت از شبانه‌روز آماده پاسخگوییه.' ] );
		$this->add_control( 'support_btn',   [ 'label' => __( 'متن دکمه', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'تماس با پشتیبانی' ] );
		$this->add_control( 'support_url',   [ 'label' => __( 'لینک دکمه', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
		$this->end_controls_section();

		$this->start_controls_section( 'items_sec', [ 'label' => __( 'سوالات', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'q', [ 'label' => __( 'سوال', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'سوال نمونه؟' ] );
		$rep->add_control( 'a', [ 'label' => __( 'جواب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'پاسخ نمونه.' ] );
		$this->add_control( 'items', [
			'label'  => __( 'سوالات', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'q' => 'چقدر زمان می‌بره تا پول به حسابم واریز بشه؟', 'a' => 'میانگین زمان تسویه ما کمتر از ۲۴ ساعت است. در اغلب موارد بین ۶ تا ۱۴ ساعت وجه واریز می‌شود.' ],
				[ 'q' => 'نرخ شما از کجا محاسبه می‌شه؟', 'a' => 'نرخ‌های ما بر اساس میانگین صرافی‌های معتبر بازار تهران محاسبه می‌شود. هیچ سود اضافه‌ای روی نرخ اعمال نمی‌کنیم.' ],
				[ 'q' => 'حداقل و حداکثر مبلغ تسویه چقدره؟', 'a' => 'حداقل تسویه ۵۰ دلار و حداکثر ۱۰۰٬۰۰۰ دلار برای هر تراکنش است.' ],
				[ 'q' => 'چه کارتی برای دریافت لازم دارم؟', 'a' => 'تمام کارت‌های بانکی ایرانی پشتیبانی می‌شوند.' ],
				[ 'q' => 'برای شروع کار چه مدارکی لازم دارم؟', 'a' => 'ثبت‌نام اولیه فقط با شماره موبایل و ایمیل انجام می‌شود.' ],
				[ 'q' => 'آیا امنیت تراکنش تضمین‌شده است؟', 'a' => 'تمام اطلاعات شما با رمزنگاری AES-256 محافظت می‌شود.' ],
			],
			'title_field' => '{{{ q }}}',
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

		// ── Style: FAQ Items ─────────────────────────────────────────────────────
		$this->start_controls_section( 'style_faq', [ 'label' => __( 'سوال و جواب', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'grid_gap', [ 'label' => __( 'فاصله بین سوالات', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'em' ], 'range' => [ 'px' => [ 'min' => 0, 'max' => 60 ] ], 'selectors' => [ '{{WRAPPER}} .adymob-faq-list' => 'gap: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'item_border_color',  [ 'label' => __( 'رنگ خط جداکننده', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-item' => 'border-color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'q_typo', 'label' => __( 'تایپوگرافی سوال', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-faq-q span' ] );
		$this->add_control( 'q_color',            [ 'label' => __( 'رنگ سوال', 'adymob' ),         'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-q span' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'icon_color',         [ 'label' => __( 'رنگ آیکون +/−', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-q .icon' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'a_typo', 'label' => __( 'تایپوگرافی جواب', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-faq-a p' ] );
		$this->add_control( 'a_color',            [ 'label' => __( 'رنگ جواب', 'adymob' ),         'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-a p' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Support Card ───────────────────────────────────────────────────
		$this->start_controls_section( 'style_support', [ 'label' => __( 'کارت پشتیبانی', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'support_bg',     [ 'label' => __( 'پس‌زمینه کارت', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-support' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'support_radius', [ 'label' => __( 'گردی گوشه', 'adymob' ),        'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-faq-support' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'support_title_color', [ 'label' => __( 'رنگ تیتر پشتیبانی', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-support h3' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'support_text_color',  [ 'label' => __( 'رنگ متن پشتیبانی', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-support p'  => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'support_btn_bg',      [ 'label' => __( 'پس‌زمینه دکمه', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-support .adymob-btn-primary' => 'background: {{VALUE}} !important;' ] ] );
		$this->add_control( 'support_btn_color',   [ 'label' => __( 'رنگ متن دکمه', 'adymob' ),      'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-faq-support .adymob-btn-primary' => 'color: {{VALUE}} !important;' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s    = $this->get_settings_for_display();
		$uid  = 'adymob-faq-' . $this->get_id();
		$s_url = isset( $s['support_url']['url'] ) ? esc_url( $s['support_url']['url'] ) : '#';
		?>
		<section class="adymob-widget" id="faq" style="padding:100px 0">
			<div class="adymob-sec-head">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h2 class="adymob-sec-title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
				</div>
				<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<div class="adymob-faq-wrap" id="<?php echo esc_attr( $uid ); ?>">
				<div>
					<div class="adymob-faq-support">
						<span class="adymob-eyebrow">پشتیبانی</span>
						<h3><?php echo esc_html( $s['support_title'] ); ?></h3>
						<p><?php echo esc_html( $s['support_text'] ); ?></p>
						<a href="<?php echo $s_url; ?>" class="adymob-btn adymob-btn-primary" style="width:100%;justify-content:center"><?php echo esc_html( $s['support_btn'] ); ?></a>
					</div>
				</div>
				<div class="adymob-faq-list">
					<?php foreach ( $s['items'] as $i => $item ) : ?>
					<div class="adymob-faq-item <?php echo $i === 0 ? 'open' : ''; ?>">
						<button class="adymob-faq-q">
							<span><?php echo esc_html( $item['q'] ); ?></span>
							<span class="icon">+</span>
						</button>
						<div class="adymob-faq-a"><p><?php echo esc_html( $item['a'] ); ?></p></div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<script>
			(function(){
				var wrap = document.getElementById(<?php echo json_encode( $uid ); ?>);
				if(!wrap) return;
				wrap.querySelectorAll('.adymob-faq-q').forEach(function(btn){
					btn.addEventListener('click',function(){
						var item=btn.parentElement, isOpen=item.classList.contains('open');
						wrap.querySelectorAll('.adymob-faq-item').forEach(function(el){el.classList.remove('open');});
						if(!isOpen) item.classList.add('open');
					});
				});
			})();
			</script>
		</section>
		<?php
	}
}
