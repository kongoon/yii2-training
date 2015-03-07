<?php
/* @var $this yii\web\View */
$this->title = 'Programmer Thailand';
Yii::$app->db->open();

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Province;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Programmer Thailand Application!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p>
            <?= Html::a('รายการผู้ติดต่อ', ['/contact/'], ['class'=>'btn btn-lg btn-success']);?>
            
    </div>

    <div class="body-content">

<div class="row">
    <div class="col-md-12">
    <?= Html::beginForm('','post',['class'=>'form-horizontal']);?>
        <div class="form-group">
            <?= Html::label('จังหวัด','province',['class'=>'control-label col-sm-2']);?>
            <div class="col-sm-10">
                <?= Html::dropDownList('province',null,
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
            <?= Html::label('อำเภอ','district',['class'=>'control-label col-sm-2']);?>
            <div class="col-sm-10">
                <?= Html::dropDownlist('district',null,
                    [],
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
        <div class="form-group">
            <?= Html::label('ตำบล','tambon',['class'=>'control-label col-sm-2']);?>
            <div class="col-sm-10">
                <?= Html::dropDownlist('tambon',null,
                    [],
                    [
                        'class'=>'form-control',
                        'id'=>'tambon',
                        'prompt'=>'-เลือกตำบล-',

                    ]
                );?>
            </div>
        </div>
        <?= Html::input('submit','submit_form','ส่งข้อมูล',['class'=>'btn btn-primary']);?>

    <?= Html::endForm();?>
    <?php
    if(isset($_POST['tambon'])){
        echo $_POST['province'].'<br>';
        echo $_POST['district'].'<br>';
        echo $_POST['tambon'].'<br>';
    }
    ?>
    </div>
</div>

    </div>
</div>
