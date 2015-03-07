<?php

namespace app\controllers;
use app\models\District;
use app\models\Tambon;

class BaseController extends \yii\web\Controller
{
    public function actionLoaddistrict($id=null)
    {
        $districts = District::find()
                        ->where(['province_id'=>$id])
                        ->orderBy('district_name ASC')
                        ->all();
        $option = '<option value="">-กรุณาเลือกอำเภอ-</option>';
        foreach($districts as $d){
            $option .= '<option value="'.$d->id.'">'.$d->district_name.'</option>';
        }
        echo $option;
        //return $this->render('loaddistrict');
    }

    public function actionLoadtambon($id=null)
    {
        $tambons = Tambon::find()
                        ->where(['district_id'=>$id])
                        ->orderBy('tambon_name ASC')
                        ->all();
        $option = '<option value="">-กรุณาเลือกตำบล-</option>';
        foreach($tambons as $t){
            $option .= '<option value="'.$t->id.'">'.$t->tambon_name.'</option>';
        }
        echo $option;
    }

}
