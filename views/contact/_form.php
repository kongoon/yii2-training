<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\models\Province;
use app\models\District;
use app\models\Tambon;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){
    $province = [];
    $district = [];
    $tambon = [];

    $district_list = [];
    $tambon_list = [];
}else{
    $province = $model->tambon->province_id;
    $district = $model->tambon->district_id;
    $tambon = $model->tambon_id;

    $district_list = ArrayHelper::map(District::find()->where(['province_id'=>$province])->orderBy('district_name ASC')->all(),'id','district_name');
    $tambon_list = ArrayHelper::map(Tambon::find()->where(['district_id'=>$district])->orderBy('tambon_name ASC')->all(),'id','tambon_name');
}
?>
<?php
$this->registerJs('
    $("document").ready(function(){
        $("#new_contact").on("pjax:end",function(){
            $.pjax.reload({container:"#contact"});
        });
    });
        ');
?>
<div class="contact-form">
<?php Pjax::begin(['id'=>'new_contact'])?>
    <?php $form = ActiveForm::begin([
        'layout'=>'horizontal',
        'fieldConfig'=>[
            'template'=>"{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}",
            'horizontalCssClasses'=>[
                'label'=>'col-sm-4',
                'offset'=>'col-sm-offset-4',
                'wrapper'=>'col-sm-8',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::label('จังหวัด','province',['class'=>'control-label col-sm-4']);?>
        <div class="col-sm-8">
            <?= Html::dropDownList('province',$province,
                ArrayHelper::map(Province::find()->orderBy('province_name ASC')->all(), 'id','province_name'),
                [
                    'class'=>'form-control',
                    'id'=>'province',
                    'prompt'=>'-เลือกจังหวัด-',
                    'onchange'=>'
                        $.get("'.Url::toRoute('base/loaddistrict').'",{id:$(this).val()})
                        .done(function(data){
                            $("select#district").html(data);
                        });
                    '
                ]
            );?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::label('อำเภอ','district',['class'=>'control-label col-sm-4']);?>
        <div class="col-sm-8">
            <?= Html::dropDownlist('district',$district,
                $district_list,
                [
                    'class'=>'form-control',
                    'id'=>'district',
                    'prompt'=>'-เลือกอำเภอ-',
                    'onchange'=>'
                        $.get("'.Url::toRoute('base/loadtambon').'",{id:$(this).val()})
                        .done(function(data){
                            $("select#tambon").html(data);
                        });
                    '
                ]
            );?>
        </div>
    </div>
    <?= $form->field($model, 'tambon_id')->dropDownList($tambon_list,['prompt'=>'-เลือกตำบล-','id'=>'tambon']) ?>

    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => 20]) ?>
    
    <?= $form->field($model, 'lat')->textInput(['maxlength' => 45]) ?>
    
    <?= $form->field($model, 'lng')->textInput(['maxlength' => 45]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
<?php Pjax::end()?>
</div>
