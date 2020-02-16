<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_ru
 * @property string $description_en
 * @property int $status
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCateg()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'status'], 'integer'],
            [['name_en', 'name_ru', 'description_ru', 'description_en', 'status'], 'required'],
            [['description_ru', 'description_en', 'image'], 'string'],
            [['name_en', 'name_ru'], 'string', 'max' => 100],
            [['imageFile'], 'file', /*'skipOnEmpty' => true, */'extensions' => 'png, jpg, jpeg, gif, pdf'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name_en' => 'Название En',
            'name_ru' => 'Название Ru',
            'description_ru' => 'Описание Ru',
            'description_en' => 'Описание En',
            'status' => 'Статус',
        ];
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'imageFile')) {
            $dir = 'uploads/';
            $this->image = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->image);
        }

        return parent::beforeSave($insert);
    }
}
