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
            [['category_id', 'param_done', 'param_all'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['param_all'], 'number'],
            //[['param_done'], ],
            [['param_done'], 'compare', 'compareAttribute' => 'param_all', 'operator' => '<=', 'type' => 'number'],
            /*['param_done', 'required', 'when' => function($model) {
                return $model->param_done <= $model->param_all && $model->param_done > 0;
            }],*/
            
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryName' => 'Categories',
            'category_id' => 'Categories',
            'description' => 'Description',
            'param_done' => 'Param Done',
            'param_all' => 'Param All',
            //'created_at' => 'Created At',
            'updated_at' => 'Date updatet',
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
