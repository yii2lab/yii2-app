<?php

namespace yii2lab\app\domain\helpers;

class Load
{

	public static function helpers()
	{
		require('BaseConfig.php');
		require('Env.php');
		require('Constant.php');
		require('Func.php');
		require('Db.php');
		require('Config.php');
	}
	
	public static function autoload()
	{
		require(VENDOR_DIR . DS . 'autoload.php');
	}
	
	public static function required()
	{
		require(VENDOR_DIR . DS . 'yiisoft' . DS . 'yii2' . DS . 'Yii.php');
		require(VENDOR_DIR . DS . 'yii2lab/yii2-helpers/src' . DS . 'Func.php');
	}

}
