<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>

<?php $form = ActiveForm::begin();?>
<?= $form->field($model,'firstname');?>
<?= $form->field($model,'lastname');?>
<?= $form->field($model,'email');?>
<?= $form->field($model,'address')->textarea(['rows'=>5]);?>
<?= $form->field($model,'verifyCode')->widget(Captcha::className(),[
    
]);?>
<?= Html::submitButton('บันทึก',['class'=>'btn btn-primary']);?>

<?php ActiveForm::end();?>
