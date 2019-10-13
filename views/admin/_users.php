<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="post">
    <?= Html::encode($model->username) ?> | <?= HtmlPurifier::process($model->email) ?>
</div>
