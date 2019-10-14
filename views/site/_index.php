<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="post">
    <?= Html::encode($model->title) ?> | <?= HtmlPurifier::process($model->starts) ?>
    | <?= HtmlPurifier::process($model->ends) ?>
</div>
