<?php
/**
 * Plugin Name: ADY MOB Elementor Widgets
 * Description: ویجت‌های سفارشی المنتور برای سایت ADY MOB — تیکر نرخ ارز، هیرو با ماشین حساب، خدمات، آمار، نرخ زنده، نظرات، FAQ، CTA و فوتر.
 * Version: 1.0.1
 * Author: ADY MOB
 * Text Domain: adymob
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ADYMOB_VERSION', '1.0.1' );
define( 'ADYMOB_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADYMOB_URL',  plugin_dir_url( __FILE__ ) );

final class ADYMob_Elementor_Widgets {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'notice_missing_elementor' ] );
			return;
		}

		add_action( 'elementor/elements/categories_registered', [ $this, 'register_category' ] );
		add_action( 'wp_enqueue_scripts',                        [ $this, 'enqueue_frontend' ] );
		add_action( 'elementor/editor/after_enqueue_styles',     [ $this, 'enqueue_editor' ] );

		// Elementor 3.5+ uses elementor/widgets/register; older versions use elementor/widgets_registered
		if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
			add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		} else {
			add_action( 'elementor/widgets_registered', [ $this, 'register_widgets_legacy' ] );
		}
	}

	public function register_category( $manager ) {
		$manager->add_category( 'adymob', [
			'title' => __( 'ADY MOB', 'adymob' ),
			'icon'  => 'eicon-globe',
		] );
	}

	private function widget_list() {
		return [
			'Ticker', 'Hero', 'Services', 'Why_Us',
			'How_It_Works', 'Stats', 'Rates',
			'Testimonials', 'Blog', 'Faq', 'Cta', 'Footer_Section',
		];
	}

	/** Elementor 3.5+ — $manager passed, use register() */
	public function register_widgets( $manager ) {
		foreach ( $this->widget_list() as $w ) {
			$file = ADYMOB_PATH . 'includes/widgets/widget-' . strtolower( str_replace( '_', '-', $w ) ) . '.php';
			if ( ! file_exists( $file ) ) continue;
			require_once $file;
			$class = 'ADYMob_Widget_' . $w;
			if ( class_exists( $class ) ) {
				$manager->register( new $class() );
			}
		}
	}

	/** Elementor < 3.5 — no manager argument, use register_widget_type() */
	public function register_widgets_legacy() {
		$wm = \Elementor\Plugin::$instance->widgets_manager;
		foreach ( $this->widget_list() as $w ) {
			$file = ADYMOB_PATH . 'includes/widgets/widget-' . strtolower( str_replace( '_', '-', $w ) ) . '.php';
			if ( ! file_exists( $file ) ) continue;
			require_once $file;
			$class = 'ADYMob_Widget_' . $w;
			if ( class_exists( $class ) ) {
				$wm->register_widget_type( new $class() );
			}
		}
	}

	public function enqueue_frontend() {
		wp_enqueue_style(
			'vazirmatn',
			'https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css',
			[], null
		);
		wp_enqueue_style(
			'adymob-styles',
			ADYMOB_URL . 'assets/css/adymob.css',
			[ 'vazirmatn' ], ADYMOB_VERSION
		);
		wp_enqueue_script(
			'adymob-frontend',
			ADYMOB_URL . 'assets/js/adymob-frontend.js',
			[], ADYMOB_VERSION, true
		);
	}

	public function enqueue_editor() {
		wp_enqueue_style(
			'adymob-editor',
			ADYMOB_URL . 'assets/css/adymob.css',
			[], ADYMOB_VERSION
		);
	}

	public function notice_missing_elementor() {
		echo '<div class="notice notice-error"><p>' .
			esc_html__( 'ADY MOB Elementor Widgets: لطفاً افزونه Elementor را نصب و فعال کنید.', 'adymob' ) .
			'</p></div>';
	}
}

ADYMob_Elementor_Widgets::instance();
