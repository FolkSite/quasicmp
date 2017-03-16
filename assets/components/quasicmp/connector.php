<?php
/**
 * quasiCMP Connector
 *
 * @package quasicmp
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('quasicmp.core_path',null,$modx->getOption('core_path').'components/quasicmp/');
require_once $corePath.'model/quasicmp/quasicmp.class.php';
$modx->quasicmp = new quasiCMP($modx);

$modx->lexicon->load('quasicmp:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->quasicmp->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));