<?php
/**
 * Add MonsterInsights tests to the WP Site Health area.
 */

/**
 * Class MonsterInsights_WP_Site_Health
 */
class MonsterInsights_WP_Site_Health {

	/**
	 * Is the site licensed?
	 *
	 * @var bool
	 */
	private $is_licensed;
	/**
	 * Is the site autherd?
	 *
	 * @var bool
	 */
	private $is_authed;
	/**
	 * Which eCommerce type, if any.
	 *
	 * @var bool|string
	 */
	private $ecommerce;

	/**
	 * MonsterInsights_WP_Site_Health constructor.
	 */
	public function __construct() {

		add_filter( 'site_status_tests', array( $this, 'add_tests' ) );

		add_action( 'wp_ajax_health-check-monsterinsights-test_connection', array( $this, 'test_check_connection' ) );

	}

	/**
	 * Add MonsterInsights WP Site Health tests.
	 *
	 * @param array $tests The current filters array.
	 *
	 * @return array
	 */
	public function add_tests( $tests ) {

		$tests['direct']['monsterinsights_license'] = array(
			'label' => __( 'MonsterInsights License', 'ga-premium' ),
			'test'  => array( $this, 'test_check_license' ),
		);

		$tests['direct']['monsterinsights_auth'] = array(
			'label' => __( 'MonsterInsights Authentication', 'ga-premium' ),
			'test'  => array( $this, 'test_check_authentication' ),
		);

		if ( $this->is_licensed() ) {
			$tests['direct']['monsterinsights_automatic_updates'] = array(
				'label' => __( 'MonsterInsights Automatic Updates', 'ga-premium' ),
				'test'  => array( $this, 'test_check_autoupdates' ),
			);
		}

		if ( $this->is_ecommerce() ) {
			$tests['direct']['monsterinsights_ecommerce'] = array(
				'label' => __( 'MonsterInsights eCommerce', 'ga-premium' ),
				'test'  => array( $this, 'test_check_ecommerce' ),
			);
		}

		if ( class_exists( 'MonsterInsights_Dimensions' ) ) {
			$tests['direct']['monsterinsights_dimensions'] = array(
				'label' => __( 'MonsterInsights Custom Dimensions', 'ga-premium' ),
				'test'  => array( $this, 'test_check_dimensions' ),
			);
		}

		if ( $this->uses_amp() ) {
			$tests['direct']['monsterinsights_amp'] = array(
				'label' => __( 'MonsterInsights AMP', 'ga-premium' ),
				'test'  => array( $this, 'test_check_amp' ),
			);
		}

		if ( $this->uses_fbia() ) {
			$tests['direct']['monsterinsights_fbia'] = array(
				'label' => __( 'MonsterInsights FBIA', 'ga-premium' ),
				'test'  => array( $this, 'test_check_fbia' ),
			);
		}

		$tests['async']['monsterinsights_connection'] = array(
			'label' => __( 'MonsterInsights Connection', 'ga-premium' ),
			'test'  => 'monsterinsights_test_connection',
		);

		return $tests;
	}

	/**
	 * Checke if the website is licensed.
	 *
	 * @return bool
	 */
	public function is_licensed() {

		if ( ! isset( $this->is_licensed ) ) {
			$this->is_licensed = is_network_admin() ? MonsterInsights()->license->is_network_licensed() : MonsterInsights()->license->is_site_licensed();
		}

		return $this->is_licensed;

	}

	/**
	 * Check if any of the supported eCommerce integrations are available.
	 *
	 * @return bool
	 */
	public function is_ecommerce() {

		if ( isset( $this->ecommerce ) ) {
			return $this->ecommerce;
		}

		$this->ecommerce = false;

		if ( class_exists( 'WooCommerce' ) ) {
			$this->ecommerce = 'WooCommerce';
		} else if ( class_exists( 'Easy_Digital_Downloads' ) ) {
			$this->ecommerce = 'Easy Digital Downloads';
		} else if ( defined( 'MEPR_VERSION' ) && version_compare( MEPR_VERSION, '1.3.43', '>' ) ) {
			$this->ecommerce = 'MemberPress';
		} else if ( function_exists( 'LLMS' ) && version_compare( LLMS()->version, '3.32.0', '>=' ) ) {
			$this->ecommerce = 'LifterLMS';
		}

		return $this->ecommerce;
	}

	/**
	 * Is the site using AMP or has the AMP addon installed?
	 *
	 * @return bool
	 */
	public function uses_amp() {

		return class_exists( 'MonsterInsights_AMP' ) || defined( 'AMP__FILE__' );

	}

	/**
	 * Is the site using FB Instant Articles or has the FBIA addon installed?
	 *
	 * @return bool
	 */
	public function uses_fbia() {

		return class_exists( 'MonsterInsights_FB_Instant_Articles' ) || defined( 'IA_PLUGIN_VERSION' ) && version_compare( IA_PLUGIN_VERSION, '3.3.4', '>' );

	}

	/**
	 * Check if MonsterInsights is authenticated and display a specific message.
	 *
	 * @return array
	 */
	public function test_check_authentication() {
		$result = array(
			'label'       => __( 'Your website is authenticated with MonsterInsights', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'MonsterInsights integrates your WordPress website with Google Analytics.', 'ga-premium' ),
			'actions'     => sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_reports', admin_url( 'admin.php' ) ),
				__( 'View Reports', 'ga-premium' )
			),
			'test'        => 'monsterinsights_auth',
		);

		$this->is_authed = MonsterInsights()->auth->is_authed() || MonsterInsights()->auth->is_network_authed();

		if ( ! $this->is_authed ) {
			if ( '' !== monsterinsights_get_ua() ) {
				// Using Manual UA.
				$result['status']      = 'recommended';
				$result['label']       = __( 'You are using Manual UA code output', 'ga-premium' );
				$result['description'] = __( 'We highly recommend authenticating with MonsterInsights so that you can access our new reporting area and take advantage of new MonsterInsights features.', 'ga-premium' );
				$result['actions']     = sprintf(
					'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
					add_query_arg( 'page', 'monsterinsights_settings', admin_url( 'admin.php' ) ),
					__( 'Authenticate now', 'ga-premium' )
				);

			} else {
				// Not authed at all.
				$result['status']      = 'critical';
				$result['label']       = __( 'Please configure your Google Analytics settings', 'ga-premium' );
				$result['description'] = __( 'Your traffic is not being tracked by MonsterInsights at the moment and you are losing data. Authenticate and get access to the reporting area and advanced tracking features.', 'ga-premium' );
				$result['actions']     = sprintf(
					'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
					add_query_arg( 'page', 'monsterinsights_settings', admin_url( 'admin.php' ) ),
					__( 'Authenticate now', 'ga-premium' )
				);
			}
		}

		return $result;
	}

	/**
	 * Check if the license is properly set up.
	 *
	 * @return array
	 */
	public function test_check_license() {

		$result = array(
			'status' => 'good',
			'badge'  => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			'test'   => 'monsterinsights_license',
		);

		if ( $this->is_licensed() ) {
			$license_type    = is_network_admin() ? MonsterInsights()->license->get_network_license_type() : MonsterInsights()->license->get_license_type();
			$result['label'] = __( 'Your MonsterInsights license is valid', 'ga-premium' );
			/* Translators: The license type. */
			$result['description'] = sprintf( __( 'Your license key type for this site is %s.', 'ga-premium' ), '<strong>' . ucfirst( $license_type ) . '</strong>' );
		} else {
			$result['label']  = __( 'MonsterInsights is not licensed', 'ga-premium' );
			$result['status'] = 'critical';
			/* Translators: The license type. */
			$result['description'] = __( 'MonsterInsights is not licensed which means you can\'t access reports, automatic updates, and other advanced features', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings', admin_url( 'admin.php' ) ),
				__( 'Add License now', 'ga-premium' )
			);
		}

		return $result;
	}

	/**
	 * Tests that run to check if autoupdates are enabled.
	 *
	 * @return array
	 */
	public function test_check_autoupdates() {

		$result = array(
			'label'       => __( 'Your website is receiving automatic updates', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'MonsterInsights automatic updates are enabled and you are getting the latest features, bugfixes, and security updates as they are released.', 'ga-premium' ),
			'test'        => 'monsterinsights_automatic_updates',
		);

		$updates_option = monsterinsights_get_option( 'automatic_updates', false );

		if ( 'minor' === $updates_option ) {
			$result['label']       = __( 'Your website is receiving minor updates', 'ga-premium' );
			$result['description'] = __( 'MonsterInsights minor updates are enabled and you are getting the latest bugfixes and security updates, but not major features.', 'ga-premium' );
		}
		if ( 'none' === $updates_option ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'Automatic updates are disabled', 'ga-premium' );
			$result['description'] = __( 'MonsterInsights automatic updates are disabled. We recommend enabling automatic updates so you can get access to the latest features, bugfixes, and security updates as they are released.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings#/advanced', admin_url( 'admin.php' ) ),
				__( 'Update Settings', 'ga-premium' )
			);
		}

		return $result;

	}

	/**
	 * Tests that run to check if eCommerce is present.
	 *
	 * @return array
	 */
	public function test_check_ecommerce() {
		$result = array(
			'label'       => __( 'You are successfully tracking eCommerce data', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			// Translators: The eCommerce store currently active.
			'description' => sprintf( __( 'MonsterInsights eCommerce addon is properly set up and tracking your %s store', 'ga-premium' ), $this->ecommerce ),
			'test'        => 'monsterinsights_ecommerce',
		);

		if ( ! $this->is_authed ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'eCommerce data is not being tracked', 'ga-premium' );
			$result['description'] = __( 'Please connect MonsterInsights to Google Analytics to start tracking eCommerce data.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings', admin_url( 'admin.php' ) ),
				__( 'Authenticate now', 'ga-premium' )
			);
		} else if ( ! class_exists( 'MonsterInsights_eCommerce' ) ) {
			$result['status'] = 'recommended';
			$result['label']  = __( 'eCommerce data is not being tracked', 'ga-premium' );
			// Translators: The eCommerce store currently active.
			$result['description'] = sprintf( __( 'You are using %s but the MonsterInsights eCommerce addon is not active, please Install & Activate it to start tracking eCommerce data.', 'ga-premium' ), $this->ecommerce );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings#/addons', admin_url( 'admin.php' ) ),
				__( 'View Addons', 'ga-premium' )
			);

			if ( in_array( MonsterInsights()->license->get_license_type(), array( 'basic', 'plus' ), true ) ) {
				$result['actions'] = sprintf(
					'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
					monsterinsights_get_upgrade_link( 'site-health', 'ecommerce', 'https://monsterinsights.com/my-account' ),
					__( 'Upgrade Now', 'ga-premium' )
				);
			}
		} else if ( ! monsterinsights_get_option( 'enhanced_ecommerce' ) ) {
			$result['status'] = 'recommended';
			$result['label']  = __( 'Enhanced eCommerce data is not tracked', 'ga-premium' );
			// Translators: The eCommerce store currently active.
			$result['description'] = sprintf( __( 'Enhanced eCommerce is available but not enabled in your MonsterInsights settings.', 'ga-premium' ), $this->ecommerce );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings#/ecommerce', admin_url( 'admin.php' ) ),
				__( 'Update Setting', 'ga-premium' )
			);

		}

		return $result;
	}

	/**
	 * Check if Custom Dimensions are set up correctly.
	 *
	 * @return array
	 */
	public function test_check_dimensions() {

		$custom_dimensions = monsterinsights_get_option( 'custom_dimensions', array() );

		$result = array(
			'label'       => __( 'Custom Dimensions are set up correctly', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			// Translators: The eCommerce store currently active.
			'description' => sprintf( __( 'MonsterInsights Custom Dimensions addon is properly set up and tracking your dimensions', 'ga-premium' ), count( $custom_dimensions ) ),
			'test'        => 'monsterinsights_dimensions',
		);

		if ( empty( $custom_dimensions ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'No Custom Dimensions are being tracked', 'ga-premium' );
			$result['description'] = __( 'The MonsterInsights Custom Dimensions addon is installed & activated but no Custom Dimensions have been configured for tracking.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings#/conversions', admin_url( 'admin.php' ) ),
				__( 'View settings', 'ga-premium' )
			);
		}

		return $result;
	}

	/**
	 * Tests for the AMP cases.
	 *
	 * @return array
	 */
	public function test_check_amp() {

		$result = array(
			'label'       => __( 'AMP tracking is set up correctly', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The MonsterInsights AMP addon is active and AMP pages are being tracked.', 'ga-premium' ),
			'test'        => 'monsterinsights_amp',
		);

		// AMP plugin is installed but the MonsterInsights addon is missing.
		if ( defined( 'AMP__FILE__' ) && ! class_exists( 'MonsterInsights_AMP' ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'AMP pages are not being tracked', 'ga-premium' );
			$result['description'] = __( 'Your website has Google AMP-enabled pages set up but they are not tracked by Google Analytics at the moment. You need to Install & Activate the MonsterInsights AMP Addon.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings#/addons', admin_url( 'admin.php' ) ),
				__( 'View Addons', 'ga-premium' )
			);
		} else if ( class_exists( 'MonsterInsights_AMP' ) && ! defined( 'AMP__FILE__' ) ) {
			$plugins         = get_plugins();
			$install_amp_url = false;
			$button_text     = __( 'Install Plugin', 'ga-premium' );
			if ( current_user_can( 'install_plugins' ) ) {
				$amp_key = 'amp/amp.php';
				if ( array_key_exists( $amp_key, $plugins ) ) {
					$button_text     = __( 'Activate Plugin', 'ga-premium' );
					$install_amp_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $amp_key ), 'activate-plugin_' . $amp_key );
				} else {
					$install_amp_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=amp' ), 'install-plugin_amp' );
				}
			}
			$result['status']      = 'critical';
			$result['label']       = __( 'AMP plugin is not active', 'ga-premium' );
			$result['description'] = __( 'The MonsterInsights AMP tracking addon is enabled but the official Google-developed AMP plugin for WordPress is not active.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				$install_amp_url,
				$button_text
			);
		}

		return $result;

	}

	/**
	 * Tests for the FBIA cases.
	 *
	 * @return array
	 */
	public function test_check_fbia() {

		$result = array(
			'label'       => __( 'Facebook Instant Articles tracking is set up correctly', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The MonsterInsights Facebook Instant Articles addon is active and Instant Articles pages are being tracked.', 'ga-premium' ),
			'test'        => 'monsterinsights_fbia',
		);

		// FBIA plugin is installed but the MonsterInsights addon is missing.
		if ( defined( 'IA_PLUGIN_VERSION' ) && version_compare( IA_PLUGIN_VERSION, '3.3.4', '>' ) && ! class_exists( 'MonsterInsights_FB_Instant_Articles' ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'Facebook Instant Articles pages are not being tracked', 'ga-premium' );
			$result['description'] = __( 'Your website has Facebook Instant Articles pages set up but they are not tracked by Google Analytics at the moment. You need to Install & Activate the MonsterInsights Facebook Instant Articles Addon.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'monsterinsights_settings#/addons', admin_url( 'admin.php' ) ),
				__( 'View Addons', 'ga-premium' )
			);
		} else if ( class_exists( 'MonsterInsights_FB_Instant_Articles' ) && ! defined( 'IA_PLUGIN_VERSION' ) ) {
			$plugins          = get_plugins();
			$button_text      = __( 'Install Plugin', 'ga-premium' );
			$install_fbia_url = false;
			if ( current_user_can( 'install_plugins' ) ) {
				$fbia_key = 'fb-instant-articles/facebook-instant-articles.php';
				if ( array_key_exists( $fbia_key, $plugins ) ) {
					$button_text      = __( 'Activate Plugin', 'ga-premium' );
					$install_fbia_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $fbia_key ), 'activate-plugin_' . $fbia_key );
				} else {
					$install_fbia_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=fb-instant-articles' ), 'install-plugin_fb-instant-articles' );
				}
			}
			$result['status']      = 'critical';
			$result['label']       = __( 'Facebook Instant Articles plugin is not active', 'ga-premium' );
			$result['description'] = __( 'The MonsterInsights Facebook Instant Articles tracking addon is enabled but the Instant Articles for WP plugin by Automattic version 3.3.5 or newer is not active.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				$install_fbia_url,
				$button_text
			);
		} else if ( defined( 'IA_PLUGIN_VERSION' ) && ! version_compare( IA_PLUGIN_VERSION, '3.3.4', '>' ) ) {
			$result['status']      = 'critical';
			$result['label']       = __( 'Facebook Instant Articles plugin is outdated', 'ga-premium' );
			$result['description'] = __( 'The MonsterInsights Facebook Instant Articles tracking addon is enabled but you are using an older, unsupported version of Instant Articles for WP plugin by Automattic.', 'ga-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				admin_url( 'plugins.php' ),
				__( 'Update plugin', 'ga-premium' )
			);
		}

		return $result;

	}

	/**
	 * Checks if there are errors communicating with Monsterinsights.com.
	 */
	public function test_check_connection() {

		$result = array(
			'label'       => __( 'Can connect to MonsterInsights.com correctly', 'ga-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'MonsterInsights', 'ga-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The MonsterInsights API is reachable and no connection issues have been detected.', 'ga-premium' ),
			'test'        => 'monsterinsights_connection',
		);

		$url      = 'https://api.monsterinsights.com/v2/test/';
		$params   = array(
			'sslverify'  => false,
			'timeout'    => 2,
			'user-agent' => 'MonsterInsights/' . MONSTERINSIGHTS_VERSION,
			'body'       => '',
		);
		$response = wp_remote_get( $url, $params );

		if ( is_wp_error( $response ) || $response['response']['code'] < 200 || $response['response']['code'] > 300 ) {
			$result['status']      = 'critical';
			$result['label']       = __( 'The MonsterInsights server is not reachable.', 'ga-premium' );
			$result['description'] = __( 'Your server is blocking external requests to monsterinsights.com, please check your firewall settings or contact your host for more details.', 'ga-premium' );

			if ( is_wp_error( $response ) ) {
				// Translators: The error message received.
				$result['description'] .= ' ' . sprintf( __( 'Error message: %s', 'ga-premium' ), $response->get_error_message() );
			}
		}

		wp_send_json_success( $result );
	}
}

new MonsterInsights_WP_Site_Health();

