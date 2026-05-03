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

		// ── Style: Section ───────────────────────────────────────────────────────
		$this->start_controls_section( 'style_section', [ 'label' => __( 'بخش', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'section_bg', [ 'label' => __( 'رنگ پس‌زمینه', 'adymob' ), 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-widget' => 'background-color: {{VALUE}};' ] ] );
		$this->add_responsive_control( 'section_padding', [ 'label' => __( 'فاصله داخلی', 'adymob' ), 'type' => \Elementor\Controls_Manager::DIMENSIONS, 'size_units' => [ 'px', 'em', '%' ], 'selectors' => [ '{{WRAPPER}} .adymob-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;' ] ] );
		$this->end_controls_section();

		// ── Style: Cells ─────────────────────────────────────────────────────────
		$this->start_controls_section( 'style_cells', [ 'label' => __( 'سلول‌های آمار', 'adymob' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
		$this->add_control( 'cell_bg',     [ 'label' => __( 'پس‌زمینه سلول', 'adymob' ),  'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-stat-cell' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'cell_radius', [ 'label' => __( 'گردی گوشه', 'adymob' ),       'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px' ], 'selectors' => [ '{{WRAPPER}} .adymob-stat-cell' => 'border-radius: {{SIZE}}{{UNIT}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'num_typo',    'label' => __( 'تایپوگرافی عدد', 'adymob' ),   'selector' => '{{WRAPPER}} .adymob-stat-cell .n' ] );
		$this->add_control( 'num_color',   [ 'label' => __( 'رنگ عدد', 'adymob' ),         'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-stat-cell .n' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'suffix_color',[ 'label' => __( 'رنگ پسوند', 'adymob' ),       'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-stat-cell .suffix' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'label_typo',  'label' => __( 'تایپوگرافی برچسب', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-stat-cell .l' ] );
		$this->add_control( 'label_color', [ 'label' => __( 'رنگ برچسب', 'adymob' ),       'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-stat-cell .l' => 'color: {{VALUE}};' ] ] );
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
