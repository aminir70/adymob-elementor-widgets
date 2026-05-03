<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Hero extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-hero'; }
	public function get_title()      { return __( 'ADY هیرو + ماشین حساب', 'adymob' ); }
	public function get_icon()       { return 'eicon-header'; }
	public function get_categories() { return [ 'adymob-e2' ]; }
	public function get_keywords()   { return [ 'hero', 'calculator', 'adymob' ]; }

	protected function register_controls() {
		// ── Content ──
		$this->start_controls_section( 'content', [ 'label' => __( 'محتوا', 'adymob' ) ] );

		$this->add_control( 'eyebrow',    [ 'label' => __( 'سرتیتر کوچک', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'ADY MOB — خدمات درآمد دلاری' ] );
		$this->add_control( 'title',      [ 'label' => __( 'تیتر اصلی', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "درآمد دلاری‌تو\nبه ریال سریع تبدیل کن" ] );
		$this->add_control( 'title_gradient_word', [ 'label' => __( 'کلمه گرادیان', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'به ریال', 'description' => __( 'این کلمه با رنگ گرادیان نمایش داده می‌شود', 'adymob' ) ] );
		$this->add_control( 'title_strike_word', [ 'label' => __( 'کلمه خط‌خورده', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'سریع' ] );
		$this->add_control( 'subtitle',   [ 'label' => __( 'زیرتیتر', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'نقد درآمد یوتیوب، ادموب، ادسنس و گوگل‌ادز با بهترین نرخ بازار، تسویه در کمتر از ۲۴ ساعت و پشتیبانی تخصصی.' ] );
		$this->add_control( 'btn_primary_text', [ 'label' => __( 'متن دکمه اول', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'شروع کن — رایگان' ] );
		$this->add_control( 'btn_primary_url',  [ 'label' => __( 'لینک دکمه اول', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#cta' ] ] );
		$this->add_control( 'btn_ghost_text',   [ 'label' => __( 'متن دکمه دوم', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'خدمات ما' ] );
		$this->add_control( 'btn_ghost_url',    [ 'label' => __( 'لینک دکمه دوم', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#services' ] ] );

		$this->end_controls_section();

		// ── Stats ──
		$this->start_controls_section( 'stats_sec', [ 'label' => __( 'آمارها', 'adymob' ) ] );
		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'num',   [ 'label' => __( 'عدد', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۴۵٬۰۰۰+' ] );
		$repeater->add_control( 'label', [ 'label' => __( 'برچسب', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'تراکنش موفق' ] );
		$this->add_control( 'stats', [
			'label'  => __( 'آمارها', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 'num' => '۴۵٬۰۰۰+', 'label' => 'تراکنش موفق' ],
				[ 'num' => '۱۲٬۵۰۰+', 'label' => 'مشتری فعال' ],
				[ 'num' => '< ۲۴س',    'label' => 'زمان تسویه' ],
				[ 'num' => '۹۹٫۷٪',   'label' => 'رضایت' ],
			],
			'title_field' => '{{{ num }}}',
		] );
		$this->end_controls_section();

		// ── Calculator ──
		$this->start_controls_section( 'calc_sec', [ 'label' => __( 'ماشین حساب', 'adymob' ) ] );
		$this->add_control( 'calc_title',    [ 'label' => __( 'عنوان ماشین حساب', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'ماشین حساب نقد درآمد' ] );
		$this->add_control( 'badge_text',    [ 'label' => __( 'متن نشان', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "بهترین\nنرخ\nبازار" ] );
		$this->add_control( 'exchange_rate', [ 'label' => __( 'نرخ تبدیل (تومان)', 'adymob' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 88400 ] );
		$this->add_control( 'chip1_label',   [ 'label' => __( 'چیپ ۱ - برچسب', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'تسویه' ] );
		$this->add_control( 'chip1_value',   [ 'label' => __( 'چیپ ۱ - مقدار', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'زیر ۲۴ ساعت' ] );
		$this->add_control( 'chip2_label',   [ 'label' => __( 'چیپ ۲ - برچسب', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'رتبه اعتماد' ] );
		$this->add_control( 'chip2_value',   [ 'label' => __( 'چیپ ۲ - مقدار', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۴٫۹ / ۵' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s    = $this->get_settings_for_display();
		$uid  = 'adymob-calc-' . $this->get_id();
		$rate = (int) ( $s['exchange_rate'] ?? 88400 );

		$title_raw   = nl2br( esc_html( $s['title'] ) );
		$grad_word   = esc_html( $s['title_gradient_word'] ?? '' );
		$strike_word = esc_html( $s['title_strike_word'] ?? '' );
		if ( $grad_word )   $title_raw = str_replace( $grad_word, '<span class="adymob-ink-word">' . $grad_word . '</span>', $title_raw );
		if ( $strike_word ) $title_raw = str_replace( $strike_word, '<span class="strike">' . $strike_word . '</span>', $title_raw );

		$stats_html = '';
		if ( ! empty( $s['stats'] ) ) {
			foreach ( $s['stats'] as $stat ) {
				$stats_html .= '<div class="stat"><span class="n">' . esc_html( $stat['num'] ) . '</span><span class="l">' . esc_html( $stat['label'] ) . '</span></div>';
			}
		}

		$btn1_url = isset( $s['btn_primary_url']['url'] ) ? esc_url( $s['btn_primary_url']['url'] ) : '#';
		$btn2_url = isset( $s['btn_ghost_url']['url'] )   ? esc_url( $s['btn_ghost_url']['url'] )   : '#';
		?>
		<section class="adymob-widget adymob-hero">
			<div class="adymob-hero-grid">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h1 class="adymob-hero-title"><?php echo $title_raw; // phpcs:ignore ?></h1>
					<p class="adymob-hero-sub"><?php echo esc_html( $s['subtitle'] ); ?></p>
					<div class="adymob-hero-ctas">
						<a href="<?php echo $btn1_url; ?>" class="adymob-btn adymob-btn-primary"><?php echo esc_html( $s['btn_primary_text'] ); ?></a>
						<a href="<?php echo $btn2_url; ?>" class="adymob-btn adymob-btn-ghost"><?php echo esc_html( $s['btn_ghost_text'] ); ?></a>
					</div>
					<?php if ( $stats_html ) : ?>
					<div class="adymob-hero-meta"><?php echo $stats_html; // phpcs:ignore ?></div>
					<?php endif; ?>
				</div>

				<div class="adymob-calc-wrap">
					<div class="adymob-badge-burst"><?php echo nl2br( esc_html( $s['badge_text'] ) ); ?></div>
					<div class="adymob-calc-card" id="<?php echo esc_attr( $uid ); ?>">
						<div class="adymob-calc-head">
							<div class="adymob-calc-title"><?php echo esc_html( $s['calc_title'] ); ?></div>
							<span class="adymob-chip"><span class="dot"></span>زنده</span>
						</div>
						<div class="adymob-calc-row">
							<div>
								<div class="lbl">بازدید ماهانه</div>
								<input type="range" min="10" max="5000" step="10" value="500" class="adymob-calc-slider adymob-views-slider">
							</div>
							<input class="adymob-calc-input adymob-views-display" value="500K" readonly>
						</div>
						<div class="adymob-calc-row">
							<div>
								<div class="lbl">RPM (دلار)</div>
								<input type="range" min="0.5" max="8" step="0.1" value="3.2" class="adymob-calc-slider adymob-rpm-slider">
							</div>
							<input class="adymob-calc-input adymob-rpm-display" value="$3.2" readonly>
						</div>
						<div class="adymob-calc-result">
							<div>
								<span class="l">درآمد برآوردی / ماه</span>
								<div class="v"><span class="adymob-revenue-display">۱۴۱٬۴۴۰٬۰۰۰</span><span class="u">تومان</span></div>
							</div>
							<div style="text-align:left">
								<span class="l">معادل دلار</span>
								<div class="v" style="font-size:22px"><span class="adymob-dollar-display">$1600</span></div>
							</div>
						</div>
					</div>
					<div class="adymob-float-chip one">
						<div class="ic">✓</div>
						<div>
							<div class="l"><?php echo esc_html( $s['chip1_label'] ); ?></div>
							<div class="v"><?php echo esc_html( $s['chip1_value'] ); ?></div>
						</div>
					</div>
					<div class="adymob-float-chip two">
						<div class="ic" style="background:var(--adymob-orange-soft);color:#B56A18">★</div>
						<div>
							<div class="l"><?php echo esc_html( $s['chip2_label'] ); ?></div>
							<div class="v"><?php echo esc_html( $s['chip2_value'] ); ?></div>
						</div>
					</div>
				</div>
			</div>
			<script>
			(function(){
				var root = document.getElementById(<?php echo json_encode( $uid ); ?>);
				if(!root) return;
				var vs = root.querySelector('.adymob-views-slider');
				var rs = root.querySelector('.adymob-rpm-slider');
				var vd = root.querySelector('.adymob-views-display');
				var rd = root.querySelector('.adymob-rpm-display');
				var rev = root.querySelector('.adymob-revenue-display');
				var dol = root.querySelector('.adymob-dollar-display');
				var rate = <?php echo (int) $rate; ?>;
				function upd(){
					var v = parseInt(vs.value), r = parseFloat(rs.value);
					vd.value = v+'K'; rd.value = '$'+r;
					var revenue = Math.round(v*r*rate/1000)*1000;
					rev.textContent = revenue.toLocaleString('fa-IR');
					dol.textContent = '$'+Math.round(v*r);
				}
				vs.addEventListener('input',upd); rs.addEventListener('input',upd); upd();
			})();
			</script>
		</section>
		<?php
	}
}
