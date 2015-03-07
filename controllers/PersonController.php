<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\PersonForm;

class PersonController extends Controller{
    public function actionTest1(){
        $model = new PersonForm(['scenario'=>'s2']);
        return $this->render('test1',['model'=>$model]);
    }
}
