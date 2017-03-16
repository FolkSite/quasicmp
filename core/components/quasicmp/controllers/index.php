<?php
error_reporting(-1);
ini_set('error_reporting', E_ALL);
/**
 * @package quasicmp
 * @subpackage controllers
 */
require_once dirname(dirname(__FILE__)).'/model/quasicmp/quasicmp.class.php';
$quasicmp = new QuasiCMP($modx);
return $quasicmp->initialize('mgr');