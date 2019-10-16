<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['getUsers'],
                    ],
                ],
            ],
         ];
    }

    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $this->view->title = 'User List';
        return $this->render('index');
    }
}
