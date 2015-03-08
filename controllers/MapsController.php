<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Contact;

class MapsController extends Controller{
    public function actionMaps(){
        $contacts = Contact::find()->each();
        return $this->render('maps',['contacts'=>$contacts]);
    }
}

