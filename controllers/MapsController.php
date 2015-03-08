<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Contact;

class MapsController extends Controller{
    public function actionMaps(){
        $maps = Contact::find();
        return $this->render('maps',['maps'=>$maps]);
    }
}

