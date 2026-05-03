<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Footer_Section extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-footer'; }
	public function get_title()      { return __( 'ADY فوتر', 'adymob' ); }
	public function get_icon()       { return 'eicon-footer'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'brand_sec', [ 'label' => __( 'برند', 'adymob' ) ] );
		$this->add_control( 'logo',  [ 'label' => __( 'لوگو', 'adymob' ),       'type' => \Elementor\Controls_Manager::MEDIA ] );
		$this->add_control( 'about', [ 'label' => __( 'درباره', 'adymob' ),      'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'پلتفرم تخصصی نقد درآمد ارزی، حواله و مدیریت تبلیغات گوگل برای ایرانیان. از ۱۳۹۷.' ] );
		$this->add_control( 'copyright', [ 'label' => __( 'کپی‌رایت', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '© ۱۴۰۵ ADY MOB · همه حقوق محفوظ است' ] );
		$this->end_controls_section();

		// Social
		$this->start_controls_section( 'social_sec', [ 'label' => __( 'شبکه‌های اجتماعی', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'label', [ 'label' => __( 'برچسب', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'IG' ] );
		$rep->add_control( 'url',   [ 'label' => __( 'لینک', 'adymob' ),  'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
		$this->add_control( 'social', [
			'label'  => __( 'شبکه‌ها', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'label' => 'IG', 'url' => [ 'url' => '#' ] ],
				[ 'label' => 'TG', 'url' => [ 'url' => '#' ] ],
				[ 'label' => 'YT', 'url' => [ 'url' => '#' ] ],
				[ 'label' => 'X',  'url' => [ 'url' => '#' ] ],
			],
			'title_field' => '{{{ label }}}',
		] );
		$this->end_controls_section();

		// Columns
		for ( $c = 1; $c <= 4; $c++ ) {
			$this->start_controls_section( 'col' . $c . '_sec', [ 'label' => sprintf( __( 'ستون %d', 'adymob' ), $c ) ] );
			$this->add_control( 'col' . $c . '_title', [ 'label' => __( 'عنوان ستون', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT,
				'default' => [ 1 => 'خدمات', 2 => 'شرکت', 3 => 'منابع', 4 => 'قانونی' ][ $c ] ] );
			$rep2 = new \Elementor\Repeater();
			$rep2->add_control( 'text', [ 'label' => __( 'متن', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'لینک' ] );
			$rep2->add_control( 'url',  [ 'label' => __( 'لینک', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
			$defaults = [
				1 => [ [ 'text' => 'نقد یوتیوب', 'url' => [ 'url' => '#' ] ], [ 'text' => 'نقد ادموب', 'url' => [ 'url' => '#' ] ], [ 'text' => 'نقد ادسنس', 'url' => [ 'url' => '#' ] ], [ 'text' => 'گوگل ادز', 'url' => [ 'url' => '#' ] ], [ 'text' => 'حواله ارزی', 'url' => [ 'url' => '#' ] ] ],
				2 => [ [ 'text' => 'درباره ما', 'url' => [ 'url' => '#' ] ], [ 'text' => 'تماس با ما', 'url' => [ 'url' => '#' ] ], [ 'text' => 'فرصت‌های شغلی', 'url' => [ 'url' => '#' ] ] ],
				3 => [ [ 'text' => 'وبلاگ', 'url' => [ 'url' => '#' ] ], [ 'text' => 'سوالات متداول', 'url' => [ 'url' => '#' ] ], [ 'text' => 'ماشین حساب', 'url' => [ 'url' => '#' ] ] ],
				4 => [ [ 'text' => 'قوانین و مقررات', 'url' => [ 'url' => '#' ] ], [ 'text' => 'حریم خصوصی', 'url' => [ 'url' => '#' ] ] ],
			];
			$this->add_control( 'col' . $c . '_links', [ 'label' => __( 'لینک‌ها', 'adymob' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep2->get_controls(), 'default' => $defaults[ $c ], 'title_field' => '{{{ text }}}' ] );
			$this->end_controls_section();
		}
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$logo_url = ! empty( $s['logo']['url'] ) ? esc_url( $s['logo']['url'] ) : '';

		$cols_html = '';
		for ( $c = 1; $c <= 4; $c++ ) {
			$title = esc_html( $s[ 'col' . $c . '_title' ] ?? '' );
			$links = $s[ 'col' . $c . '_links' ] ?? [];
			$items = '';
			foreach ( $links as $link ) {
				$href = isset( $link['url']['url'] ) ? esc_url( $link['url']['url'] ) : '#';
				$items .= '<li><a href="' . $href . '">' . esc_html( $link['text'] ) . '</a></li>';
			}
			$cols_html .= '<div class="adymob-footer-col"><h5>' . $title . '</h5><ul>' . $items . '</ul></div>';
		}

		$social_html = '';
		if ( ! empty( $s['social'] ) ) {
			foreach ( $s['social'] as $soc ) {
				$href = isset( $soc['url']['url'] ) ? esc_url( $soc['url']['url'] ) : '#';
				$social_html .= '<a href="' . $href . '" aria-label="' . esc_attr( $soc['label'] ) . '">' . esc_html( $soc['label'] ) . '</a>';
			}
		}
		?>
		<footer class="adymob-widget">
			<div class="adymob-footer-inner">
				<div class="adymob-footer-top">
					<div class="adymob-footer-brand">
						<?php if ( $logo_url ) : ?>
						<img src="<?php echo $logo_url; ?>" alt="Logo">
						<?php endif; ?>
						<p><?php echo esc_html( $s['about'] ); ?></p>
					</div>
					<?php echo $cols_html; // phpcs:ignore ?>
				</div>
				<div class="adymob-footer-bottom">
					<span><?php echo esc_html( $s['copyright'] ); ?></span>
					<?php if ( $social_html ) : ?>
					<div class="social"><?php echo $social_html; // phpcs:ignore ?></div>
					<?php endif; ?>
				</div>
			</div>
		</footer>
		<?php
	}
}
