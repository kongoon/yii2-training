<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $address
 * @property integer $tambon_id
 * @property string $zipcode
 * @property string $email
 * @property string $tel
 * @property string $created
 *
 * @property BaseTambon $tambon
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'address', 'tambon_id', 'zipcode', 'email', 'tel'], 'required'],
            [['address'], 'string'],
            [['tambon_id'], 'integer'],
            [['created'], 'safe'],
            [['fullname', 'email'], 'string', 'max' => 255],
            [['email'],'email'],
            [['zipcode'], 'string', 'max' => 5],
            [['tel'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ชื่อ',
            'address' => 'ที่อยู่',
            'tambon_id' => 'ตำบล',
            'zipcode' => 'รหัสไปรษณีย์',
            'email' => 'อีเมลล์',
            'tel' => 'เบอร์โทร',
            'created' => 'บันทึกเมื่อ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTambon()
    {
        return $this->hasOne(Tambon::className(), ['id' => 'tambon_id']);
    }
}
