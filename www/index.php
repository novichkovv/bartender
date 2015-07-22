<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:20
 */

$f = fopen('log.log', 'a+');
fwrite($f, date('Y-m-d H:i:s') . ' - ' .print_r($_SERVER, true) . "\n");
fclose($f);
exit;
session_start();
require_once('config.php');
require_once(CORE_DIR . 'registry.php');
require_once(CORE_DIR . 'autoload.php');
require_once(CORE_DIR . 'router.php');
//require_once(CLASSES_DIR . 'wlogs_class.php');
//require_once(CLASSES_DIR . 'multilingual_class.php');
