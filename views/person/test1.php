<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>
<h1>เพิ่ม Person</h1>
<?php $form = ActiveForm::begin();?>
<?= $form->field($model,'firstname');?>
<?= $form->field($model,'lastname');?>
<?= $form->field($model,'email');?>
<?= $form->field($model,'address')->textarea(['rows'=>5]);?>
<?= $form->field($model,'verifyCode')->widget(Captcha::className(),[
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]);?>
<?= Html::submitButton('บันทึก',['class'=>'btn btn-primary']);?>

<?php ActiveForm::end();?>

<?php print_r($value);?>