<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "element".
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $description
 * @property float $param_done
 * @property float $param_all
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 */
class Element extends ActiveRecord
{
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'param_done', 'param_all'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 512],
            [['description'], 'string'],
            [['param_done', 'param_all'], 'number'],
            [['param_done'], 'compare', 'compareAttribute' => 'param_all', 'operator' => '<=', 'type' => 'number'], 
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            //'categoryName' => 'Categories Name',
            'category_id' => Yii::t('main', 'Category'),
            'description' => Yii::t('main', 'Description'),
            'param_done' => Yii::t('main', 'Param Done'),
            'param_all' => Yii::t('main', 'Param All'),
            //'created_at' => 'Created At',
            'updated_at' => Yii::t('main', 'Date updatet'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    public function getCategoryName() {
        return (isset($this->category) ? $this->category->name : ' не задана');
    }
    
}
