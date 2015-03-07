<?php
namespace app\models;

use yii\base\Model;

class PersonForm extends Model{
    //กำหนด Attributes
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $verifyCode;
    
    //กำหนด Attribute Labels
    public function attributeLabels() {
        return [
            'firstname'=>'ชื่อ',
            'lastname'=>'นามสกุล',
            'email'=>'อีเมลล์',
            'address'=>'ที่อยู่',
            'verifyCode'=>'รหัสตรวจสอบ'
        ];
    }
    //กำหนดการเข้าถึงข้อมูล
    public function scenarios() {
        return [
            's1'=>['firstname','lastname'],
            's2'=>['firstname','lastname','email','address']
        ];
    }
    
    public function rules(){
        return [
            [['firstname','lastname','email'],'required','on'=>'s2'],
            [['firstname','lastname'],'required','on'=>'s1'],
            
            [['address'],'string'],
            ['email','email'],
            
            ['verifyCode','captcha'],
            
        ];
    }
}
