<?php
/**
 * Created by PhpStorm.
 * User: sahil
 * Date: 6/27/14
 * Time: 1:44 PM
 */

namespace Pyntax;


class Module {

    public function getConfig()
    {
        return include_once __DIR__ .'/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
} 