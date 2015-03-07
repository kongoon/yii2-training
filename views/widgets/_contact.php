<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div>
    <h3><?= Html::encode($model->fullname)?></h3>
    <?= HtmlPurifier::process($model->address)?>
    <?= Html::encode($model->tambon->tambon_name)?>
    <?= Html::encode($model->tambon->district->district_name)?>
    <?= Html::encode($model->tambon->province->province_name)?>
    <?= Html::encode($model->zipcode)?>
    <?= Html::encode($model->email)?>
    <?= Html::encode($model->tel)?>
</div>
