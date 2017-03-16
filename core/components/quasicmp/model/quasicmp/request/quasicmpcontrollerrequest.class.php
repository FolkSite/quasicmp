<?php
/**
 * @author https://quasi-art.ru
 * 2017
 */
error_reporting(-1);
ini_set('error_reporting', E_ALL);
require_once MODX_CORE_PATH . 'model/modx/modrequest.class.php';

class quasiCMPControllerRequest extends modRequest {
    function __construct(&$modx) {
        parent :: __construct($modx);
    }

    public function handleRequest() {
        $this->loadErrorHandler();

        $modx =& $this->modx;

		$modx->regClientCSS('/assets/components/quasicmp/css/mgr/quasicmp.css');
		$modx->regClientStartupScript('/assets/components/quasicmp/js/mgr/quasicmp.js');
		
		$properties = [];
		//$output = $modx->runSnippet('', $properties);
		$output = 'Content of quasiCMP';
		return $output;
    }
}