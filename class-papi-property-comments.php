<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Property Comments
 *
 * @version 1.0.0
 */

class Papi_Property_Comments extends Papi_Property {

	/**
	 * The default value.
	 *
	 * @var int
	 * @since 1.0.0
	 */

	public $default_value = array();

	/**
	 * Get default settings.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */

	public function get_default_settings() {
		return array(
			'choose_max' => 3
		);
	}

	/**
	 * Generate the HTML for the property.
	 *
	 * @since 1.0.0
	 */

	public function html() {

		// Get settings
		$settings    = $this->get_settings();

		// Property options
		$options = $this->get_options();

		// Database value.
		$value = $this->get_value();

		// Get comments
		$comments = get_comments(
			array(
				'status' => 'approve'
			)
		);
		?>
			<div class="papi-property-relationship">
				<input type="hidden" name="<?php echo $options->slug; ?>[]" />
				<div class="relationship-inner">
					<div class="relationship-top-left">
						<strong><?php _e( 'Search', 'papi' ); ?></strong>
						<input type="search" />
					</div>
					<div class="relationship-top-right">

					</div>
					<div class="papi-clear"></div>
				</div>
				<div class="relationship-inner">
					<div class="relationship-left">
						<ul>
							<?php
							foreach ( $comments as $comment ):
								if ( ! empty( $comment->comment_content ) ):
									?>
									<li>
										<input type="hidden" data-name="<?php echo $options->slug; ?>[]"
										       value="<?php echo $comment->comment_ID; ?>"/>
										<a href="#"><?php echo $comment->comment_content; ?></a>
										<span class="icon plus"></span>
									</li>
								<?php
								endif;
							endforeach;
							?>
						</ul>
					</div>
					<div class="relationship-right" data-relationship-choose-max="<?php echo $settings->choose_max; ?>">
						<ul>
							<?php foreach ( $value as $comment_id ): ?>
								<li>
									<input type="hidden" name="<?php echo $options->slug; ?>[]"
									       value="<?php echo $comment_id; ?>"/>
									<a href="#"><?php echo get_comment($comment_id)->comment_content; ?></a>
									<span class="icon minus"></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="papi-clear"></div>
				</div>
			</div>
		<?php
	}

	/**
	* Format the value of the property before we output it to the application.
	*
	* @param mixed $value
	* @param string $slug
	* @param int $post_id
	*
	* @since 1.0.0
	*
	* @return mixed
	*/

	// This function is not required since it does this in the base class.

	// public function format_value ($value, $slug, $post_id) {
	//	return $value;
	// }

	/**
	 * Update the value of the property before we save it to the database.
	 *
	 * @param mixed $value
	 * @param string $slug
	 * @param int $post_id
	 *
	 * @since 1.0.0
	 *
	 * @return mixed
	 */

	// This function is not required since it does this in the base class.

	// public function update_value ($value, $slug, $post_id) {
	//	return $value;
	// }
}
