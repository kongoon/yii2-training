<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PersonForm;

class PersonController extends Controller{
    public function actions(){
        return [
            'captcha'=>[
                'class'=>'yii\captcha\CaptchaAction',
            ],
        ];
    }
    public function actionTest1(){
        $model = new PersonForm(['scenario'=>'s2']);
        if($model->load(Yii::$app->request->post())){
            $value = $_POST['PersonForm'];
        }else{
            $value = null;
        }
        return $this->render('test1',['model'=>$model,'value'=>$value]);
    }
}
