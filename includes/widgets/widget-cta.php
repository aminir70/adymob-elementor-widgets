<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_Widget_Cta extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-cta'; }
	public function get_title()      { return __( 'ADY فراخوان عمل (CTA)', 'adymob' ); }
	public function get_icon()       { return 'eicon-call-to-action'; }
	public function get_categories() { return [ 'adymob' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content', [ 'label' => __( 'محتوا', 'adymob' ) ] );
		$this->add_control( 'title',          [ 'label' => __( 'تیتر', 'adymob' ),         'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "آماده‌ای درآمد دلاری‌تو\nبه ریال تبدیل کنی؟" ] );
		$this->add_control( 'text',           [ 'label' => __( 'متن', 'adymob' ),           'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'همین الان ثبت‌نام کن و اولین تراکنشت رو با ۵۰٪ تخفیف کارمزد انجام بده.' ] );
		$this->add_control( 'btn1_text',      [ 'label' => __( 'متن دکمه اول', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'ثبت‌نام رایگان' ] );
		$this->add_control( 'btn1_url',       [ 'label' => __( 'لینک دکمه اول', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL,      'default' => [ 'url' => '#' ] ] );
		$this->add_control( 'btn2_text',      [ 'label' => __( 'متن دکمه دوم', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'تماس با مشاور' ] );
		$this->add_control( 'btn2_url',       [ 'label' => __( 'لینک دکمه دوم', 'adymob' ), 'type' => \Elementor\Controls_Manager::URL,      'default' => [ 'url' => '#' ] ] );
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
