<?php

namespace nagser\main\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AdminController extends \nagser\base\controllers\AdminController
{

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['index-admin'],
                    ],
                ],
            ],
        ]);
    }

	public function actionIndex()
	{
		return $this->render('index');
	}

}