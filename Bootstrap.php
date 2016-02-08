<?php

namespace nagser\main;

use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Bootstrap implements BootstrapInterface {

    private $_modelMap = [];

    public function bootstrap($app){
        /**@var Module $module**/
        $module = $app->getModule('main');
        $this->_modelMap = ArrayHelper::merge($this->_modelMap, $module->modelMap);
        foreach ($this->_modelMap as $name => $definition) {
            $class = "nagser\\main\\models\\" . $name;
            \Yii::$container->set($class, $definition);
            $modelName = is_array($definition) ? $definition['class'] : $definition;
            $module->modelMap[$name] = $modelName;
        }
        //Загрузка языков
        if (!isset($app->get('i18n')->translations['main'])) {
            $app->get('i18n')->translations['main'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/vendor/nagser/main/messages',
                'fileMap' => ['main' => 'main.php']
            ];
        }
    }

}