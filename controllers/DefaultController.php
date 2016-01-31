<?php

namespace app\modules\main\controllers;

use \app\base\CustomController;
use Yii;

class DefaultController extends CustomController
{

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionIndex()
	{
		return $this->render('index');
	}
}