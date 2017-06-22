<?php

namespace yii2lab\app\helpers;

class Load
{

	public static function helpers()
	{
		require('Env.php');
		require('Constant.php');
		require('Func.php');
		require('Db.php');
		require('Api.php');
		require('Config.php');
	}

	public static function bootstrap()
	{
		require(COMMON_DIR . DS . 'config' . DS . 'bootstrap.php');
		require(APP_DIR . DS . 'config' . DS . 'bootstrap.php');
	}

	public static function required()
	{
		require(VENDOR_DIR . DS . 'autoload.php');
		require(VENDOR_DIR . DS . 'yiisoft' . DS . 'yii2' . DS . 'Yii.php');
		require(VENDOR_DIR . DS . 'wooppay/yii2-foundation/src/helpers' . DS . 'Func.php');
	}

}
