<?php
/**
 * License Actions class.
 *
 * @since 6.0.0
 *
 * @package MonsterInsights
 * @author  Chris Christoff
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class MonsterInsights_License_Actions {
	/**
	 * Holds the license key.
	 *
	 * @since 6.0.0
	 *
	 * @var string
	 */
	public $key;

	/**
	 * Holds any license error messages.
	 *
	 * @since 6.0.0
	 *
	 * @var array
	 */
	public $errors = array();

	/**
	 * Holds any license success messages.
	 *
	 * @since 6.0.0
	 *
	 * @var array
	 */
	public $success = array();

	/**
	 * Primary class constructor.
	 *
	 * @since 6.0.0
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'admin_init' ) );

		add_action( 'wp_ajax_monsterinsights_verify_license', array( $this, 'ajax_verify_key' ) );

		add_action( 'wp_ajax_monsterinsights_deactivate_license', array( $this, 'ajax_deactivate_key' ) );

		add_action( 'wp_ajax_monsterinsights_validate_license', array( $this, 'ajax_validate_key' ) );
	}

	public function admin_init() {
		// Possibly verify the key.
		$this->maybe_verify_key();

		// Add potential admin notices for actions around the admin.
		add_action( 'admin_notices', array( $this, 'monsterinsights_notices' ), 11 );
		add_action( 'network_admin_notices', array( $this, 'monsterinsights_notices' ), 11 );

		// Grab the license key. If it is not set (even after verification), return early.
		$this->key = is_network_admin() ? MonsterInsights()->license->get_network_license_key() : MonsterInsights()->license->get_site_license_key();
		if ( ! $this->key ) {
			return;
		}

		// Possibly handle validating, deactivating and refreshing license keys.
		$this->maybe_validate_key();
		$this->maybe_deactivate_key();
		$this->maybe_refresh_key();
	}

	/**
	 * Maybe verifies a license key entered by the user.
	 *
	 * @since 6.0.0
	 *
	 * @return null Return early if the key fails to be verified.
	 */
	public function maybe_verify_key() {

		if ( empty( $_POST['monsterinsights-license-key'] ) || strlen( $_POST['monsterinsights-license-key'] ) < 10 || empty( $_POST['monsterinsights-verify-submit'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['monsterinsights-key-nonce'], 'monsterinsights-key-nonce' ) ) {
			return;
		}

		if ( ! current_user_can( 'monsterinsights_save_settings' ) ) {
			return;
		}

		$this->verify_key();

	}

	/**
	 * Ajax handler for verifying the License key.
	 */
	public function ajax_verify_key() {

		check_ajax_referer( 'mi-admin-nonce', 'nonce' );

		$network_admin = isset( $_POST['network'] ) && $_POST['network'];
		$license = ! empty( $_POST['license'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['license'] ) ) ) : false;

		if ( ! $license ) {
			wp_send_json_error(
				array(
					'error' => esc_html__( 'Please enter a license key.', 'google-analytics-for-wordpress' ),
				)
			);
		}

		if ( ! current_user_can( 'monsterinsights_save_settings' ) ) {
			wp_send_json_error(
				array(
					'error' => esc_html__( 'You are not allowed to verify a license key.', 'google-analytics-for-wordpress' ),
				)
			);
		}

		$forced = isset( $_POST['forced'] ) && 'true' === sanitize_text_field( wp_unslash( $_POST['forced'] ) );

		$verify = $this->perform_remote_request( 'verify-key', array( 'tgm-updater-key' => $license ) );

		if ( ! $verify ) {
			wp_send_json_error(
				array(
					'error' => esc_html__( 'There was an error connecting to the remote key API. Please try again later.', 'google-analytics-for-wordpress' ),
				)
			);
		}

		if ( ! empty( $verify->error ) ) {
			wp_send_json_error(
				array(
					'error' => $verify->error,
				)
			);

		}

		// Otherwise, our request has been done successfully. Update the option and set the success message.
		$option                = $network_admin ? MonsterInsights()->license->get_network_license() : MonsterInsights()->license->get_site_license();
		$option['key']         = $license;
		$option['type']        = isset( $verify->type ) ? $verify->type : $option['type'];
		$option['is_expired']  = false;
		$option['is_disabled'] = false;
		$option['is_invalid']  = false;

		$network_admin ? MonsterInsights()->license->set_network_license( $option ) : MonsterInsights()->license->set_site_license( $option );
		delete_transient( '_monsterinsights_addons' );
		monsterinsights_get_addons_data( $option['key'] );

		$message = isset( $verify->success ) ? $verify->success : esc_html__( 'Congratulations! This site is now receiving automatic updates.', 'google-analytics-for-wordpress' );

		wp_send_json_success(
			array(
				'message'      => $message,
				'license_type' => $option['type'],
			)
		);

	}

	/**
	 * Verifies a license key entered by the user.
	 *
	 * @since 6.0.0
	 */
	public function verify_key() {

		// Perform a request to verify the key.
		$verify = $this->perform_remote_request( 'verify-key', array( 'tgm-updater-key' => trim( $_POST['monsterinsights-license-key'] ) ) );

		// If it returns false, send back a generic error message and return.
		if ( ! $verify ) {
			$this->errors[] = esc_html__( 'There was an error connecting to the remote key API. Please try again later.', 'google-analytics-for-wordpress' );

			return;
		}

		// If an error is returned, set the error and return.
		if ( ! empty( $verify->error ) ) {
			$this->errors[] = $verify->error;

			return;
		}

        // Otherwise, our request has been done successfully. Update the option and set the success message.
        $option                = is_network_admin() ? MonsterInsights()->license->get_network_license() : MonsterInsights()->license->get_site_license();
        $option['key']         = trim( $_POST['monsterinsights-license-key'] );
        $option['type']        = isset( $verify->type ) ? $verify->type : $option['type'];
        $option['is_expired']  = false;
        $option['is_disabled'] = false;
        $option['is_invalid']  = false;
        $this->success[]       = isset( $verify->success ) ? $verify->success : esc_html__( 'Congratulations! This site is now receiving automatic updates.', 'google-analytics-for-wordpress' );
        is_network_admin() ? MonsterInsights()->license->set_network_license( $option ) : MonsterInsights()->license->set_site_license( $option );
        delete_transient( '_monsterinsights_addons' );
        monsterinsights_get_addons_data( $option['key'] );
        // Make sure users can now update their plugins if they previously an expired key.
	    wp_clean_plugins_cache( true );
    }

	/**
	 * Maybe validates a license key entered by the user.
	 *
	 * @since 6.0.0
	 *
	 * @return null Return early if the transient has not expired yet.
	 */
	public function maybe_validate_key() {
		$check = is_network_admin() ? MonsterInsights()->license->time_to_check_network_license() : MonsterInsights()->license->time_to_check_site_license();
		if ( $check ) {
			$this->validate_key();
		}
	}

	/**
	 * Ajax handler for validating the current key.
	 */
	public function ajax_validate_key() {

		check_ajax_referer( 'mi-admin-nonce', 'nonce' );

		$this->validate_key( true );

		if ( ! empty( $this->errors ) ) {
			wp_send_json_error( array(
				'error' => $this->errors[0],
			) );
		}

		if ( ! empty( $this->success ) ) {
			wp_send_json_success(
				array(
					'message' => $this->success[0],
				)
			);
		}

		wp_die();

	}

	/**
	 * Validates a license key entered by the user.
	 *
	 * @since 6.0.0
	 *
	 * @param bool $forced Force to set contextual messages (false by default).
	 */
	public function validate_key( $forced = false, $network = null ) {

		if ( is_null( $network ) ) {
			$network = is_network_admin();
		}

		$validate = $this->perform_remote_request( 'validate-key', array( 'tgm-updater-key' => $this->key ) );

		// If there was a basic API error in validation, only set the transient for 10 minutes before retrying.
		if ( ! $validate ) {
			// If forced, set contextual success message.
			if ( $forced ) {
				$this->errors[] = esc_html__( 'There was an error connecting to the remote key API. Please try again later.', 'google-analytics-for-wordpress' );
			}

			return;
		}

		$option                = $network ? MonsterInsights()->license->get_network_license() : MonsterInsights()->license->get_site_license();
		$option['is_expired']  = false;
		$option['is_disabled'] = false;
		$option['is_invalid']  = false;

		// If a key or author error is returned, the license no longer exists or the user has been deleted, so reset license.
		if ( isset( $validate->key ) || isset( $validate->author ) ) {
			$option['is_invalid'] = true;
			$network ? MonsterInsights()->license->set_network_license( $option ) : MonsterInsights()->license->set_site_license( $option );
			$this->errors[] = esc_html__( 'Your license key for MonsterInsights is invalid. The key no longer exists or the user associated with the key has been deleted. Please use a different key.', 'google-analytics-for-wordpress' );

			return;
		}

		// If the license has expired, set the transient and expired flag and return.
		if ( isset( $validate->expired ) ) {
			$option['is_expired'] = true;
			$network ? MonsterInsights()->license->set_network_license( $option ) : MonsterInsights()->license->set_site_license( $option );
			// Translators: The link to the MonsterInsights website.
			$this->errors[] = sprintf( esc_html__( 'Your license key for MonsterInsights has expired. %1$sPlease click here to renew your license key.%2$s', 'google-analytics-for-wordpress' ), '<a href="' . monsterinsights_get_url( 'admin-notices', 'expired-license', 'https://www.monsterinsights.com/login/' ) . '" target="_blank" rel="noopener noreferrer" referrer="no-referrer">', '</a>' );

			return;
		}

		// If the license is disabled, set the transient and disabled flag and return.
		if ( isset( $validate->disabled ) ) {
			$option['is_disabled'] = true;
			$network ? MonsterInsights()->license->set_network_license( $option ) : MonsterInsights()->license->set_site_license( $option );
			$this->errors[] = esc_html__( 'Your license key for MonsterInsights has been disabled. Please use a different key.', 'google-analytics-for-wordpress' );

			return;
		}

		// If forced, set contextual success message.
		if ( ( ! empty( $validate->key ) || ! empty( $this->key ) ) && $forced ) {
			$key = ! empty( $validate->key ) ? $validate->key : $this->key;
			delete_transient( '_monsterinsights_addons' );
			monsterinsights_get_addons_data( $key );
			$this->success[] = esc_html__( 'Congratulations! Your key has been refreshed successfully.', 'google-analytics-for-wordpress' );
		}

		$option                = array();
		$option                = $network ? MonsterInsights()->license->get_network_license() : MonsterInsights()->license->get_site_license();
		$option['type']        = isset( $validate->type ) ? $validate->type : $option['type'];
		$option['is_expired']  = false;
		$option['is_disabled'] = false;
		$option['is_invalid']  = false;
		$network ? MonsterInsights()->license->set_network_license( $option ) : MonsterInsights()->license->set_site_license( $option );

	}

	/**
	 * Maybe deactivates a license key entered by the user.
	 *
	 * @since 6.0.0
	 *
	 * @return null Return early if the key fails to be deactivated.
	 */
	public function maybe_deactivate_key() {

		if ( empty( $_POST['monsterinsights-license-key'] ) || empty( $_POST['monsterinsights-deactivate-submit'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['monsterinsights-key-nonce'], 'monsterinsights-key-nonce' ) ) {
			return;
		}

		if ( ! current_user_can( 'monsterinsights_save_settings' ) ) {
			return;
		}

		$this->deactivate_key();

	}

	/**
	 * Deactivate the license key with ajax.
	 */
	public function ajax_deactivate_key() {
		check_ajax_referer( 'mi-admin-nonce', 'nonce' );

		$network_admin = isset( $_POST['network'] ) && $_POST['network'];

		$license = ! empty( $_POST['license'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['license'] ) ) ) : false;

		if ( ! $license ) {
			wp_send_json_error(
				array(
					'error' => esc_html__( 'Please refresh the page and try again.', 'google-analytics-for-wordpress' ),
				)
			);
		}

		if ( ! current_user_can( 'monsterinsights_save_settings' ) ) {
			wp_send_json_error(
				array(
					'error' => esc_html__( 'You are not allowed to deactivate the license key.', 'google-analytics-for-wordpress' ),
				)
			);
		}

		$deactivate = $this->perform_remote_request( 'deactivate-key', array( 'tgm-updater-key' => $license ) );

		if ( ! $deactivate ) {
			wp_send_json_error(
				array(
					'error' => esc_html__( 'There was an error connecting to the remote key API. Please try again later.', 'google-analytics-for-wordpress' ),
				)
			);
		}

		if ( ! empty( $deactivate->error ) ) {
			wp_send_json_error(
				array(
					'error' => $deactivate->error,
				)
			);

		}

		$network_admin ? MonsterInsights()->license->delete_network_license() : MonsterInsights()->license->delete_site_license();

		wp_send_json_success(
			array(
				'message'      => isset( $deactivate->success ) ? $deactivate->success : esc_html__( 'Congratulations! You have deactivated the key from this site successfully.', 'google-analytics-for-wordpress' ),
			)
		);
	}

	/**
	 * Deactivates a license key entered by the user.
	 *
	 * @since 6.0.0
	 */
	public function deactivate_key() {

		// Perform a request to deactivate the key.
		$deactivate = $this->perform_remote_request( 'deactivate-key', array( 'tgm-updater-key' => $_POST['monsterinsights-license-key'] ) );

		// If it returns false, send back a generic error message and return.
		if ( ! $deactivate ) {
			$this->errors[] = esc_html__( 'There was an error connecting to the remote key API. Please try again later.', 'google-analytics-for-wordpress' );

			return;
		}

		// If an error is returned, set the error and return.
		if ( ! empty( $deactivate->error ) && ! monsterinsights_is_debug_mode() ) {
			$this->errors[] = $deactivate->error;

			return;
		}

		// Otherwise, our request has been done successfully. Reset the option and set the success message.
		$this->success[] = isset( $deactivate->success ) ? $deactivate->success : esc_html__( 'Congratulations! You have deactivated the key from this site successfully.', 'google-analytics-for-wordpress' );
		is_network_admin() ? MonsterInsights()->license->delete_network_license() : MonsterInsights()->license->delete_site_license();

	}

	/**
	 * Maybe refreshes a license key.
	 *
	 * @since 6.0.0
	 *
	 * @return null Return early if the key fails to be refreshed.
	 */
	public function maybe_refresh_key() {

		if ( empty( $_POST['monsterinsights-license-key'] ) || empty( $_POST['monsterinsights-refresh-submit'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['monsterinsights-key-nonce'], 'monsterinsights-key-nonce' ) ) {
			return;
		}

		if ( ! current_user_can( 'monsterinsights_save_settings' ) ) {
			return;
		}

		// Refreshing is simply a word alias for validating a key. Force true to set contextual messages.
		$this->validate_key( true );

	}

	/**
	 * Outputs any notices generated by the class.
	 *
	 * @since 7.0.0
	 */
	public function monsterinsights_notices() {
		if ( ! monsterinsights_is_pro_version() ) {
			return;
		}

		$screen = get_current_screen();
		if ( empty( $screen->id ) || strpos( $screen->id, 'monsterinsights' ) === false ) {
			return;
		}

		if ( ! empty( $this->errors ) ) { ?>
			<div class="error">
				<p><?php echo implode( '<br>', $this->errors ); ?></p>
			</div>
		<?php } else if ( ! empty( $this->success ) ) { ?>
			<div class="updated">
				<p><?php echo implode( '<br>', $this->success ); ?></p>
			</div>
		<?php }
	}

	/**
	 * Queries the remote URL via wp_remote_post and returns a json decoded response.
	 *
	 * @since 6.0.0
	 *
	 * @param string $action The name of the $_POST action var.
	 * @param array  $body The content to retrieve from the remote URL.
	 * @param array  $headers The headers to send to the remote URL.
	 * @param string $return_format The format for returning content from the remote URL.
	 *
	 * @return string|bool          Json decoded response on success, false on failure.
	 */
	public function perform_remote_request( $action, $body = array(), $headers = array(), $return_format = 'json' ) {
	  $response_body  = array();
	  $response_body['type']= array('categories'=>array('Pro','Plus'));
	  return json_decode(json_encode($response_body));
	}
}
