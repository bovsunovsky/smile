<?php
namespace common\models;
use Yii;
/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $user_name
 * @property string|null $user_email
 * @property int|null $created_at
 * @property int|null $status
 * @property string|null $comment
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'product_id', 'created_at', 'status'], 'integer'],
            [['comment'], 'string'],
            [['created_at'], 'safe'],
            [['user_name'], 'string', 'max' => 100],
            [['user_email'], 'string', 'max' => 150],
            [['user_email'], 'email'],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => Yii::t('main', 'Номер продукта'),
            'user_name' => Yii::t('main', 'Имя пользователя'),
            'user_email' => Yii::t('main', 'E-mail пользователя'),
            'created_at' => Yii::t('main', 'Дата создания'),
            'status' => Yii::t('main', 'Статус'),
            'comment' => Yii::t('main', 'Комментарий'),
        ];
    }
}