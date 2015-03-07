<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base_province".
 *
 * @property integer $id
 * @property string $province_name
 * @property string $province_name_en
 *
 * @property BaseDistrict[] $baseDistricts
 * @property BaseTambon[] $baseTambons
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'base_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'province_name'], 'required'],
            [['id'], 'integer'],
            [['province_name', 'province_name_en'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสจังหวัด',
            'province_name' => 'จังหวัด',
            'province_name_en' => 'Province',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['province_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTambons()
    {
        return $this->hasMany(Tambon::className(), ['province_id' => 'id']);
    }
}
