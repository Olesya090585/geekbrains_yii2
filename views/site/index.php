<?php

/* @var $this yii\web\View */

$this->title = 'My Events';
?>
<div class="site-index">

<?php

use app\models\EventForm;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;


$user_id = Yii::$app->user->identity->id;
$dataProvider = new ActiveDataProvider([
        'query' => EventForm::find()->where(['user_id' => $user_id]),
        'pagination' => [
        'pageSize' => 20,
    ],
]);

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_index',
]);
?>
</div>
