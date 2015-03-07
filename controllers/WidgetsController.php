<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Contact;
use yii\data\ActiveDataProvider;

class WidgetsController extends Controller {

    public function actionDetailview($id) {
        //http://localhost/yii2-training/web/widgets/detailview?id=1
        $model = Contact::findOne($id);
        return $this->render('detailview',['model'=>$model]);
    }

    public function actionGridview() {
        $dataProvider = new ActiveDataProvider([
            'query'=>Contact::find(),
            'pagination'=>[
                'pageSize'=>20,
            ]
        ]);
        return $this->render('gridview',['dataProvider'=>$dataProvider]);
    }

    public function actionListview() {
        $dataProvider = new ActiveDataProvider([
            'query'=>  Contact::find(),
            'pagination'=>[
                'pageSize'=>20,
            ]
        ]);
        return $this->render('listview',['dataProvider'=>$dataProvider]);
    }

}
