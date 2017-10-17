<?php

namespace yii2lab\app\admin\helpers;

use Yii;

// todo: отрефакторить - сделать нормальный интерфейс и родителя

class Navigation {
	
	static function getMenu() {
		return [
			'label' => t('app/main', 'title'),
			'icon' => 'cogs',
			'items' => [
				[
					'label' => ['app/mode', 'title'],
					'url' => 'app/mode',
				],
				[
					'label' => ['app/url', 'title'],
					'url' => 'app/url',
				],
				[
					'label' => ['app/connection', 'title'],
					'url' => 'app/connection',
				],
				[
					'label' => ['app/cookie', 'title'],
					'url' => 'app/cookie',
				],
				[
					'label' => ['app/server', 'title'],
					'url' => 'app/server',
				],
				[
					'label' => ['app/remote', 'title'],
					'url' => 'app/remote',
				],
			],
		];
	}

}
