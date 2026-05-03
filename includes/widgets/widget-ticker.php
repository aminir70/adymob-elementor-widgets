<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_E2_Widget_Ticker extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-e2-ticker'; }
	public function get_title()      { return __( 'ADY تیکر نرخ ارز', 'adymob' ); }
	public function get_icon()       { return 'eicon-exchange'; }
	public function get_categories() { return [ 'adymob-e2' ]; }
	public function get_keywords()   { return [ 'ticker', 'rate', 'currency', 'adymob' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content', [
			'label' => __( 'نرخ‌ها', 'adymob' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'label', [ 'label' => __( 'عنوان', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'USD/IRR' ] );
		$repeater->add_control( 'value', [ 'label' => __( 'مقدار', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '۸۸٬۴۰۰' ] );
		$repeater->add_control( 'change', [ 'label' => __( 'تغییر', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '▲ ۰٫۴٪' ] );
		$repeater->add_control( 'direction', [ 'label' => __( 'جهت', 'adymob' ), 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'up', 'options' => [ 'up' => 'صعودی', 'down' => 'نزولی' ] ] );

		$this->add_control( 'items', [
			'label'   => __( 'آیتم‌ها', 'adymob' ),
			'type'    => \Elementor\Controls_Manager::REPEATER,
			'fields'  => $repeater->get_controls(),
			'default' => [
				[ 'label' => 'USD/IRR', 'value' => '۸۸٬۴۰۰', 'change' => '▲ ۰٫۴٪', 'direction' => 'up' ],
				[ 'label' => 'EUR/IRR', 'value' => '۹۶٬۲۰۰', 'change' => '▲ ۰٫۲٪', 'direction' => 'up' ],
				[ 'label' => 'YouTube RPM', 'value' => '$۳٫۴', 'change' => '▼ ۰٫۱٪', 'direction' => 'down' ],
				[ 'label' => 'AdMob eCPM', 'value' => '$۱٫۸۵', 'change' => '▲ ۲٫۳٪', 'direction' => 'up' ],
				[ 'label' => 'AdSense RPM', 'value' => '$۲٫۹۵', 'change' => '▲ ۱٫۱٪', 'direction' => 'up' ],
				[ 'label' => 'AED/IRR', 'value' => '۲۴٬۰۵۰', 'change' => '▲ ۰٫۳٪', 'direction' => 'up' ],
			],
			'title_field' => '{{{ label }}}',
		] );

		$this->add_control( 'speed', [ 'label' => __( 'سرعت (ثانیه)', 'adymob' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'default' => [ 'size' => 40 ], 'range' => [ 'px' => [ 'min' => 10, 'max' => 120 ] ] ] );

		$this->end_controls_section();

		$this->start_controls_section( 'style_ticker', [
			'label' => __( 'رنگ‌بندی تیکر', 'adymob' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );
		$this->add_control( 'ticker_bg',   [ 'label' => __( 'پس‌زمینه', 'adymob' ),    'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-ticker' => 'background-color: {{VALUE}};' ] ] );
		$this->add_control( 'ticker_key',  [ 'label' => __( 'رنگ برچسب', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-ticker .item .k' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'ticker_val',  [ 'label' => __( 'رنگ مقدار', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-ticker .item b' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'ticker_up',   [ 'label' => __( 'رنگ صعودی', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-ticker .item .up' => 'color: {{VALUE}};' ] ] );
		$this->add_control( 'ticker_down', [ 'label' => __( 'رنگ نزولی', 'adymob' ),   'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => [ '{{WRAPPER}} .adymob-ticker .item .down' => 'color: {{VALUE}};' ] ] );
		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [ 'name' => 'ticker_typo', 'label' => __( 'تایپوگرافی', 'adymob' ), 'selector' => '{{WRAPPER}} .adymob-ticker .item' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$s     = $this->get_settings_for_display();
		$items = $s['items'];
		$speed = ! empty( $s['speed']['size'] ) ? (int) $s['speed']['size'] : 40;
		if ( empty( $items ) ) return;

		$html = '';
		foreach ( $items as $item ) {
			$dir_class = esc_attr( $item['direction'] === 'down' ? 'down' : 'up' );
			$html .= sprintf(
				'<span class="item"><span class="k">%s</span> <b>%s</b> <span class="%s">%s</span></span>',
				esc_html( $item['label'] ),
				esc_html( $item['value'] ),
				$dir_class,
				esc_html( $item['change'] )
			);
		}
		// duplicate for seamless loop
		$all = $html . $html;
		?>
		<div class="adymob-widget adymob-ticker">
			<div class="adymob-ticker-track" style="animation-duration:<?php echo $speed; ?>s">
				<?php echo $all; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
		<?php
	}
}
