<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ADYMob_Widget_Rates extends \Elementor\Widget_Base {

	public function get_name()       { return 'adymob-rates'; }
	public function get_title()      { return __( 'ADY نرخ ارز زنده', 'adymob' ); }
	public function get_icon()       { return 'eicon-exchange'; }
	public function get_categories() { return [ 'adymob' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'head', [ 'label' => __( 'سرتیتر', 'adymob' ) ] );
		$this->add_control( 'eyebrow', [ 'label' => __( 'برچسب', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => '۰۴ — نرخ ارز زنده' ] );
		$this->add_control( 'title',   [ 'label' => __( 'تیتر', 'adymob' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "نرخ لحظه‌ای.\nبدون توقف." ] );
		$this->add_control( 'desc',    [ 'label' => __( 'توضیح', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'نرخ‌های ما بر اساس میانگین صرافی‌های معتبر به‌روزرسانی می‌شود.' ] );
		$this->add_control( 'board_title', [ 'label' => __( 'عنوان تابلو', 'adymob' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'بازار ارز — امروز' ] );
		$this->end_controls_section();

		$this->start_controls_section( 'rates_sec', [ 'label' => __( 'نرخ‌ها', 'adymob' ) ] );
		$rep = new \Elementor\Repeater();
		$rep->add_control( 'pair',   [ 'label' => __( 'جفت ارز', 'adymob' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'USD / IRR' ] );
		$rep->add_control( 'value',  [ 'label' => __( 'مقدار اولیه', 'adymob' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 88400 ] );
		$rep->add_control( 'change', [ 'label' => __( 'درصد تغییر', 'adymob' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 0.4, 'step' => 0.01 ] );
		$this->add_control( 'rates', [
			'label'  => __( 'نرخ‌ها', 'adymob' ),
			'type'   => \Elementor\Controls_Manager::REPEATER,
			'fields' => $rep->get_controls(),
			'default' => [
				[ 'pair' => 'USD / IRR',  'value' => 88400,  'change' =>  0.4  ],
				[ 'pair' => 'EUR / IRR',  'value' => 96200,  'change' =>  0.2  ],
				[ 'pair' => 'AED / IRR',  'value' => 24050,  'change' =>  0.3  ],
				[ 'pair' => 'GBP / IRR',  'value' => 112300, 'change' => -0.1  ],
				[ 'pair' => 'USDT / IRR', 'value' => 88100,  'change' => -0.2  ],
				[ 'pair' => 'TRY / IRR',  'value' => 2720,   'change' =>  0.8  ],
			],
			'title_field' => '{{{ pair }}}',
		] );
		$this->end_controls_section();
	}

	protected function render() {
		$s   = $this->get_settings_for_display();
		$uid = 'adymob-rates-' . $this->get_id();
		$rates_json = wp_json_encode( array_map( function( $r ) {
			return [ 'v' => (float) $r['value'], 'c' => (float) $r['change'] ];
		}, $s['rates'] ) );
		?>
		<section class="adymob-widget" id="rates" style="padding:100px 0">
			<div class="adymob-sec-head">
				<div>
					<span class="adymob-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></span>
					<h2 class="adymob-sec-title"><?php echo nl2br( esc_html( $s['title'] ) ); ?></h2>
				</div>
				<p class="adymob-sec-desc"><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<div class="adymob-rates-board" id="<?php echo esc_attr( $uid ); ?>">
				<div class="adymob-rates-bar">
					<span class="ttl"><?php echo esc_html( $s['board_title'] ); ?></span>
					<span class="live">LIVE · ۳ ثانیه پیش</span>
				</div>
				<div class="adymob-rates-table">
					<?php foreach ( $s['rates'] as $i => $r ) :
						$chg_class = $r['change'] < 0 ? ' neg' : '';
						$arrow     = $r['change'] < 0 ? '▼ ' : '▲ ';
					?>
					<div class="adymob-rate-col">
						<div class="pair"><?php echo esc_html( $r['pair'] ); ?></div>
						<div class="val" data-rate-val="<?php echo $i; ?>"><?php echo number_format( (float) $r['value'] ); ?></div>
						<div class="chg<?php echo esc_attr( $chg_class ); ?>" data-rate-chg="<?php echo $i; ?>"><?php echo esc_html( $arrow . abs( $r['change'] ) . '٪' ); ?></div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<script>
			(function(){
				var root = document.getElementById(<?php echo json_encode( $uid ); ?>);
				if(!root) return;
				var data = <?php echo $rates_json; // phpcs:ignore ?>;
				function tick(){
					data.forEach(function(r,i){
						r.v = Math.round(r.v*(1+(Math.random()-.5)*.002));
						r.c = +(r.c+(Math.random()-.5)*.1).toFixed(2);
						var ve = root.querySelector('[data-rate-val="'+i+'"]');
						var ce = root.querySelector('[data-rate-chg="'+i+'"]');
						if(ve) ve.textContent = r.v.toLocaleString('en');
						if(ce){ce.textContent=(r.c>=0?'▲ ':'▼ ')+Math.abs(r.c).toFixed(2)+'٪'; ce.className='chg'+(r.c<0?' neg':'');}
					});
				}
				setInterval(tick,3500);
			})();
			</script>
		</section>
		<?php
	}
}
