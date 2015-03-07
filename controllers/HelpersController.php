<?php
namespace app\controllers;
use yii\web\Controller;

class HelpersController extends Controller{
    public function actionEncode(){
        return $this->render('encode');
    }
    public function actionA(){
        return $this->render('a');
    }
    public function actionImg(){
        return $this->render('img');
    }
}