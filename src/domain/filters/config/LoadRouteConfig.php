<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\designPattern\filter\interfaces\FilterInterface;
use yii2lab\helpers\ClassHelper;
use yii2mod\helpers\ArrayHelper;

class LoadRouteConfig extends LoadConfig implements FilterInterface {
	
	public $assignTo = 'components.urlManager.rules';

    public function run($config)
    {
        $config = parent::run($config);
        $rules = ArrayHelper::getValue($config, $this->assignTo);
        $newRules = [];
        foreach ($rules as $key => $value) {
            $valueNormalized = ClassHelper::normalizeComponentConfig($value);
            if(isset($valueNormalized['class']) && $valueNormalized['class'] == static::class) {
                $loadedRules = $this->load($value['modules']);
                $newRules = ArrayHelper::merge($newRules, $loadedRules);
            } else {
                $newRules[$key] = $value;
            }
        }
        ArrayHelper::setValue($config, $this->assignTo, $newRules);
        return $config;
    }

    private function load($modules) {
        $newRules = [];
        foreach ($modules as $path) {
            if(is_string($path)) {
                $file = ROOT_DIR . DS . $path . DS . 'config/routes.php';
                $loadedRules = @include($file);
                if(!empty($loadedRules)) {
                    $newRules = ArrayHelper::merge($newRules, $loadedRules);
                }
            }
        }
        return $newRules;
    }
}
