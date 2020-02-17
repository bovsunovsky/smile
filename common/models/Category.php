<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property int $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        return $this->hasOne(Product::className(), ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_ru', 'description_en', 'name_ru', 'name_en'], 'required'],
            [['description_ru', 'description_en'], 'string'],
            [['status'], 'integer'],
            [['name_ru', 'name_en'], 'string','min' => 2 ,'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => Yii::t('main', 'Название ru'),
            'name_en' => Yii::t('main', 'Название en'),
            'description_ru' => Yii::t('main', 'Описание ru'),
            'description_en' => Yii::t('main', 'Описание en'),
            'status' => Yii::t('main', 'Статус'),
        ];
    }
}
