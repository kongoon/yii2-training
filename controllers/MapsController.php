<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Contact;

class MapsController extends Controller{
    public function actionMaps(){
        $contacts = Contact::find()->all();
        //print_r($contacts);
        return $this->render('maps',['contacts'=>$contacts]);
    }
}

