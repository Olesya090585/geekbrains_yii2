<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\EventForm;

class CalendarController extends Controller
{
     /**
     * Displays edit page.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->identity->id;
        $my_events = EventForm::find()->where(['user_id' => $user_id])->all();
        return $this->render('index', ['myEvents' => $my_events]);
    }

}
