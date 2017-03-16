<?php
error_reporting(-1);
ini_set('error_reporting', E_ALL);
/**
 * @package quasicmp
 */
class quasiCMP {
    /**
     * Constructs the quasicmp object
     *
     * @param modX &$modx A reference to the modX object
     * @param array $config An array of configuration options
     */
    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;

        $basePath = $this->modx->getOption('quasicmp.core_path',$config,$this->modx->getOption('core_path').'components/quasicmp/');
        $assetsUrl = $this->modx->getOption('quasicmp.assets_url',$config,$this->modx->getOption('assets_url').'components/quasicmp/');
        $this->config = array_merge([
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath.'model/',
            'processorsPath' => $basePath.'processors/',
            'chunksPath' => $basePath.'elements/chunks/',
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
        ], $config);

        $this->modx->addPackage('quasicmp', $this->config['modelPath']);
    }

    /**
     * Initializes the class into the proper context
     *
     * @access public
     * @param string $ctx
     */
    public function initialize($ctx = 'web') {
        switch ($ctx) {
            case 'mgr':
                $this->modx->lexicon->load('quasicmp:default');

                if (!$this->modx->loadClass('pricesControllerRequest',$this->config['modelPath'].'quasicmp/request/',true,true)) {
                    return 'Could not load controller request handler.';
                }
                $this->request = new pricesControllerRequest($this->modx);
                return $this->request->handleRequest();
            break;
        }
        return true;
    }

}