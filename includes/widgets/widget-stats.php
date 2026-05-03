<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Stats extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-stats'; }
	public function get_title()      { return __( 'ADY آمار و ارقام', 'adymob' ); }
	public function get_icon()       { return 'eicon-counter'; }
	public function get_categories() { return [ 'adymob-e2' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'cells_sec', [ 'label' => __( 'سلول‌ها', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'num',    [ 'label' => __( 'عدد', 'adymob' ),    'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۴۵' ] );
		$rep->add_control( 'suffix', [ 'label' => __( 'پسوند', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'K+' ] );
		$rep->add_control( 'label',  [ 'label' => __( 'برچسب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'تراکنش موفق' ] );
		$this->add_control( 'cells', [
			'label'  => __( 'سلول‌ها', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'num' => '۴۵',   'suffix' => 'K+',      'label' => 'تراکنش موفق' ],
				[ 'num' => '۱۲۰',  'suffix' => 'میلیارد', 'label' => 'حجم تسویه (تومان)' ],
				[ 'num' => '۹۹٫۷', 'suffix' => '٪',       'label' => 'رضایت مشتری' ],
				[ 'num' => '۲۴',   'suffix' => '/۷',       'label' => 'پشتیبانی' ],
			],
			'title_field' => '{{{ num }}}{{{ suffix }}}',
		] );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="adymob-widget" style="padding:80px 0">
			<?php if ( ! empty( $s['cells'] ) ) : ?>
			<div class="adymob-stats-grid">
				<?php foreach ( $s['cells'] as $cell ) : ?>
				<div class="adymob-stat-cell">
					<div class="n"><?php echo esc_html( $cell['num'] ); ?><span class="suffix"><?php echo esc_html( $cell['suffix'] ); ?></span></div>
					<div class="l"><?php echo esc_html( $cell['label'] ); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</section>
		<?php
	}
}
