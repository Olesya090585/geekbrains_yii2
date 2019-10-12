<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\EventForm;

class EventController extends Controller
{
     /**
     * Displays edit page.
     *
     * @return Response|string
     */
    public function actionNew()
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        $model = new EventForm();

        if ($model->load($request->post()) && $model->create_or_edit()) {
            $session->setFlash('eventNewFormSubmitted');
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionEdit()
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $id = $request->get('id');

        $model = EventForm::findOne($id);

        if ($model->load($request->post()) && $model->create_or_edit()) {
            $session->setFlash('eventEditFormSubmitted');
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
