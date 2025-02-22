<?php
/**
 * Pro Admin features.
 *
 * Adds Pro Reporting features.
 *
 * @since 6.0.0
 *
 * @package MonsterInsights Dimensions
 * @subpackage Reports
 * @author  Chris Christoff
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class MonsterInsights_Admin_Pro_Reports {

	/**
	 * Primary class constructor.
	 *
	 * @access public
	 * @since 6.0.0
	 */
	public function __construct() {
		$this->load_reports();
	}

	public function load_reports() {
		$overview_report = new MonsterInsights_Report_Overview();
		MonsterInsights()->reporting->add_report( $overview_report );

		require_once MONSTERINSIGHTS_PLUGIN_DIR . 'pro/includes/admin/reports/report-publisher.php';
		$publisher_report = new MonsterInsights_Report_Publisher();
		MonsterInsights()->reporting->add_report( $publisher_report );

		require_once MONSTERINSIGHTS_PLUGIN_DIR . 'pro/includes/admin/reports/report-ecommerce.php';
		$ecommerce_report = new MonsterInsights_Report_eCommerce();
		MonsterInsights()->reporting->add_report( $ecommerce_report );

		require_once MONSTERINSIGHTS_PLUGIN_DIR . 'pro/includes/admin/reports/report-queries.php';
		$queries_report = new MonsterInsights_Report_Queries();
		MonsterInsights()->reporting->add_report( $queries_report );

		require_once MONSTERINSIGHTS_PLUGIN_DIR . 'pro/includes/admin/reports/report-dimensions.php';
		$dimensions_report = new MonsterInsights_Report_Dimensions();
		MonsterInsights()->reporting->add_report( $dimensions_report );

		require_once MONSTERINSIGHTS_PLUGIN_DIR . 'pro/includes/admin/reports/report-forms.php';
		$forms_report = new MonsterInsights_Report_Forms();
		MonsterInsights()->reporting->add_report( $forms_report );

		require_once MONSTERINSIGHTS_PLUGIN_DIR . 'pro/includes/admin/reports/report-realtime.php';
		$realtime_report = new MonsterInsights_Report_RealTime();
		MonsterInsights()->reporting->add_report( $realtime_report );

	}
}
