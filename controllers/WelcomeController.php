<?php

namespace app\controllers;

use yii\web\Controller;

class WelcomeController extends Controller
{
    /**
     * Index page.
     *
     * @return string
     */

    public function actionIndex()
    {
        date_default_timezone_set('Europe/Moscow');
        $hour = date('H');

        if ($hour>=6 and $hour<12){
            $message = 'Доброе утро!';
        } elseif($hour>=12 and $hour<17){
            $message="Добрый день!";
        }elseif($hour>=17 and $hour<23){
            $message = 'Добрый вечер!';
        }else{
            $message = 'Доброй ночи!';
        }

        return $this->render('index', ['message' => $message]);
    }

}
