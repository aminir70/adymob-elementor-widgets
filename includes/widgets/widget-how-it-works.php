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
