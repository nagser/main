<?php

namespace app\modules\main\controllers;

use \app\base\CustomAdminController;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AdminController extends CustomAdminController
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