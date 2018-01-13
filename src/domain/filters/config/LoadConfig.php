<?php

namespace yii2lab\app\domain\filters\config;

use yii\base\BaseObject;
use yii2lab\designPattern\filter\interfaces\FilterInterface;
use yii2mod\helpers\ArrayHelper;

class LoadConfig extends BaseObject implements FilterInterface {
	
	public $withLocal = true;
	public $name;
	public $app = APP;
	public $assignTo;
	
	public function run($config) {
		$loadedConfig = self::requireConfigWithLocal($this->app, $this->name, $this->withLocal);
		$loadedConfig = self::normalizeItems($loadedConfig);
		$config = $this->merge($config, $loadedConfig, $this->assignTo);
		return $config;
	}
	
	protected function merge($config, $loadedConfig, $name = null) {
		if(!empty($name)) {
			$configItem = ArrayHelper::getValue($config, $name, []);
			$configItem = ArrayHelper::merge($configItem, $loadedConfig);
			ArrayHelper::setValue($config, $name, $configItem);
		} else {
			$config = ArrayHelper::merge($config, $loadedConfig);
		}
		return $config;
	}
	
	protected function normalizeItems($items) {
		if(!method_exists($this, 'normalizeItem')) {
			return $items;
		}
		$newData = [];
		foreach($items as $name => $data) {
			$data = $this->normalizeItem($name, $data);
			if($data) {
				$newData[$name] = $data;
			}
		}
		return $newData;
	}
	
	protected static function requireConfigWithLocal($from, $name, $withLocal = true) {
		$config = self::requireConfigItem($from, $name);
		if($withLocal) {
			$configLocal = self::requireConfigItem($from, $name . '-local');
			if(is_array($configLocal)) {
				$config = ArrayHelper::merge($config, $configLocal);
			}
		}
		return $config;
	}
	
	protected static function requireConfigItem($from, $name) {
		$config = @include(ROOT_DIR . DS . $from . DS  . 'config' . DS . $name.'.php');
		return !empty($config) ? $config : [];
	}
	
}
