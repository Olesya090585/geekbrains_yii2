<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\EventForm;

class EventController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays edit page.
     *
     * @return Response|string
     */
    public function actionNew()
    {
        $model = new EventForm();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('eventNewFormSubmitted');

            return $this->refresh();
        }
        return $this->render('new', [
            'model' => $model,
        ]);
    }

}
