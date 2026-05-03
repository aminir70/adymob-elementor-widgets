<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Blog extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-blog'; }
	public function get_title()      { return __( 'ADY بلاگ / مقالات', 'adymob' ); }
	public function get_icon()       { return 'eicon-post-list'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head', [ 'label' => __( 'سرتیتر', 'adymob' ) ] );
		$this->add_control( 'eyebrow', [ 'label' => __( 'برچسب', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۰۶ — مقالات' ] );
		$this->add_control( 'title',   [ 'label' => __( 'تیتر', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'از بلاگ ما.' ] );
		$this->add_control( 'desc',    [ 'label' => __( 'توضیح', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'راهنماها، اخبار و تحلیل‌های بازار ارز و درآمد دلاری.' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'source_sec', [ 'label' => __( 'منبع', 'adymob' ) ] );
		$this->add_control( 'source', [ 'label' => __( 'منبع محتوا', 'adymob' ), 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'wp_posts',
			'options' => [ 'wp_posts' => 'نوشته‌های وردپرس', 'manual' => 'دستی' ] ] );
		$this->add_control( 'posts_count', [ 'label' => __( 'تعداد نوشته', 'adymob' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 3,
			'condition' => [ 'source' => 'wp_posts' ] ] );
		$this->add_control( 'category', [ 'label' => __( 'دسته‌بندی (slug)', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '',
			'condition' => [ 'source' => 'wp_posts' ] ] );
		$this->end_controls_section();

		$this->start_controls_section( 'manual_sec', [ 'label' => __( 'مقالات دستی', 'adymob' ), 'condition' => [ 'source' => 'manual' ] ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'cat',   [ 'label' => __( 'دسته', 'adymob' ),       'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'آموزش' ] );
		$rep->add_control( 'date',  [ 'label' => __( 'تاریخ', 'adymob' ),      'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۳ روز پیش' ] );
		$rep->add_control( 'title', [ 'label' => __( 'عنوان', 'adymob' ),      'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'عنوان مقاله' ] );
		$rep->add_control( 'desc',  [ 'label' => __( 'خلاصه', 'adymob' ),     'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'خلاصه مقاله...' ] );
		$rep->add_control( 'glyph', [ 'label' => __( 'نماد تصویر', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Y' ] );
		$rep->add_control( 'color', [ 'label' => __( 'رنگ تصویر', 'adymob' ),  'type' => \Elementor\Controls_Manager::SELECT, 'default' => 't1',
			'options' => [ 't1' => 'تیل→مرجانی', 't2' => 'مرجانی→نارنجی', 't3' => 'نارنجی→تیل' ] ] );
		$rep->add_control( 'url',   [ 'label' => __( 'لینک', 'adymob' ),       'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
		$this->add_control( 'posts', [
			'label'  => __( 'مقالات', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'cat' => 'آموزش',    'date' => '۳ روز پیش',   'title' => 'راهنمای کامل نقد درآمد یوتیوب در ۱۴۰۵', 'desc' => 'همه چیزهایی که باید درباره مالیات، نرخ و روش‌های تسویه بدونی.', 'glyph' => 'Y', 'color' => 't1', 'url' => [ 'url' => '#' ] ],
				[ 'cat' => 'اقتصادی', 'date' => '۵ روز پیش',   'title' => 'چرا RPM ادموب در بازار ایران متفاوته؟', 'desc' => 'تحلیل دلایل تفاوت نرخ تبلیغات برای دولوپرها.', 'glyph' => '$', 'color' => 't2', 'url' => [ 'url' => '#' ] ],
				[ 'cat' => 'راهنما',  'date' => '۱ هفته پیش',  'title' => 'بهترین روش حواله ارزی برای فریلنسرها',  'desc' => 'مقایسه روش‌های مختلف، هزینه و امنیت هرکدوم.',  'glyph' => '€', 'color' => 't3', 'url' => [ 'url' => '#' ] ],
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
		$this->add_control( 'title_color',   [ 'label' => __( 'رنگ تیتر', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-title' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'desc_typo',  'selector' => '{{WRAPPER}} .adymob-sec-desc' ] );
		$this->add_control( 'desc_color',    [ 'label' => __( 'رنگ توضیح', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-sec-desc' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();

		// ── Style: Cards ─────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_cards', [ 'label' => __( 'کارت‌های مقاله', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_responsive_control( 'grid_gap', [
			'label'      => __( 'فاصله بین کارت‌ها', 'adymob' ),
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', 'em' ],
			'range'      => [ 'px' => [ 'min' => 0, 'max' => 80 ] ],
			'selectors'  => [ '{{WRAPPER}} .adymob-blog-grid' => 'gap: {{SIZE}}{{UNIT}};' ],
		] );
		$this->add_control( 'card_bg',          [ 'label' => __( 'پس‌زمینه کارت', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-post-card' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'card_radius',      [ 'label' => __( 'گردی گوشه', 'adymob' ),         'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-post-card' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_control( 'cat_badge_bg',     [ 'label' => __( 'پس‌زمینه دسته', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-post-body .meta .cat' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'cat_badge_color',  [ 'label' => __( 'رنگ متن دسته', 'adymob' ),     'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-post-body .meta .cat' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'card_title_typo', 'selector' => '{{WRAPPER}} .adymob-post-body h3' ] );
		$this->add_control( 'card_title_color', [ 'label' => __( 'رنگ عنوان مقاله', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-post-body h3' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'card_desc_color',  [ 'label' => __( 'رنگ خلاصه مقاله', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-post-body p' => 'color: {{VALUE}};' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s      = $this->get_settings_for_display();
		$source = $s['source'] ?? 'manual';
		$posts  = [];

		$colors = [ 't1', 't2', 't3' ];
		if ( $source === 'wp_posts' ) {
			$args = [ 'post_type' => 'post', 'posts_per_page' => (int) ( $s['posts_count'] ?? 3 ), 'post_status' => 'publish' ];
			if ( ! empty( $s['category'] ) ) $args['category_name'] = sanitize_text_field( $s['category'] );
			$query = new WP_Query( $args );
			foreach ( $query->posts as $i => $p ) {
				$cats      = get_the_category( $p->ID );
				$thumb_url = get_the_post_thumbnail_url( $p->ID, 'large' );
				$posts[] = [
					'cat'       => $cats ? esc_html( $cats[0]->name ) : '',
					'date'      => get_the_date( 'j F Y', $p->ID ),
					'title'     => get_the_title( $p->ID ),
					'desc'      => wp_trim_words( get_the_excerpt( $p->ID ), 18 ),
					'glyph'     => mb_substr( get_the_title( $p->ID ), 0, 1 ),
					'color'     => $colors[ $i % 3 ],
					'thumb_url' => $thumb_url ?: '',
					'url'       => [ 'url' => get_permalink( $p->ID ) ],
				];
			}
		} else {
			foreach ( $s['posts'] ?? [] as $p ) {
				$p['thumb_url'] = '';
				$posts[] = $p;
			}
		}
		?>
		<section class="adymob-widget" id="blog" style="padding:100px 0">
			<div class="adymob-sec-head">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h2 class="adymob-sec-title"><?php echo esc_html( $s['title'] ); ?></h2>
				</div>
				<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<div class="adymob-blog-grid">
				<?php foreach ( $posts as $post ) :
					$link = isset( $post['url']['url'] ) ? esc_url( $post['url']['url'] ) : '#';
				?>
				<article class="adymob-post-card">
					<a href="<?php echo $link; ?>" style="text-decoration:none;color:inherit">
						<?php if ( ! empty( $post['thumb_url'] ) ) : ?>
						<div class="adymob-post-thumb has-thumb" style="background-image:url(<?php echo esc_url( $post['thumb_url'] ); ?>);background-size:cover;background-position:center"></div>
						<?php else : ?>
						<div class="adymob-post-thumb <?php echo esc_attr( $post['color'] ); ?>">
							<div class="glyph"><?php echo esc_html( $post['glyph'] ); ?></div>
						</div>
						<?php endif; ?>
						<div class="adymob-post-body">
							<div class="meta"><span class="cat"><?php echo esc_html( $post['cat'] ); ?></span><span>·</span><span><?php echo esc_html( $post['date'] ); ?></span></div>
							<h3><?php echo esc_html( $post['title'] ); ?></h3>
							<p><?php echo esc_html( $post['desc'] ); ?></p>
						</div>
					</a>
				</article>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
