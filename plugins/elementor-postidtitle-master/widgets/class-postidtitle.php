<?php
/**
 * Postidtitle class.
 *
 * @category   Class
 * @package PostIdTitle
 * @subpackage WordPress
 * @author     Guilherme Borba <contato@guilhermeborba.com.br>
 * @copyright  2022 Guilherme Borba
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.guilhermeborba.com.br/pipefy,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorPostidtitle\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Postidtitle widget class.
 *
 * @since 1.0.0
 */
class Postidtitle extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'postidtitle', plugins_url( '/assets/css/postidtitle.css', ELEMENTOR_POSTIDTITLE ), array(), '1.0.0' );

		wp_register_script( 'postidtitlejs', plugins_url( '/assets/js/postidtitle.js', ELEMENTOR_POSTIDTITLE ), array(), '1.0.0', true );
	
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'postidtitle';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Search Post Title by ID', 'elementor-postidtitle' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-search';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'postidtitle' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function get_script_depends() {
		return array('postidtitlejs');
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Post Title Search', 'elementor-postidtitle' ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<main class="post-search w-100 m-auto">
			<h1 class="h3 mb-3">Post Title Search</h1>
			<div class="formTitle">
				<div class="form-floating">
					<input type="text" class="form-control" id="floatingInput" placeholder="Ex: 195">
					<label for="floatingInput">Whats is the Post ID?</label>
				</div>
				<div class="form-floating">
					<button class="w-100 btn btn-lg btn-primary" id="searchButton" type="submit">Search</button>
				</div>
			</div>
			<div id="resultTitlePost"></div>
		</main>
	<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<main class="post-search w-100 m-auto">
			<h1 class="h3 mb-3">Post Title Search</h1>
			<div class="formTitle">
				<div class="form-floating">
					<input type="text" class="form-control" id="floatingInput" placeholder="Ex: 195">
					<label for="floatingInput">Whats is the Post ID?</label>
				</div>
				<div class="form-floating">
					<button class="w-100 btn btn-lg btn-primary" id="searchButton" type="submit">Search</button>
				</div>
			</div>
			<div id="resultTitlePost"></div>
		</main>
		<?php
	}
}
