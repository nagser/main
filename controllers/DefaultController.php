<?php

namespace nagser\main\controllers;

use nagser\base\controllers\Controller;
use Yii;

class DefaultController extends Controller
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