<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form about `app\models\Category`.
 */
class CategorySearch extends Category
{
    public $up_picker;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'up_picker'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id',
                    'name',
                    'updated_at' => [
                        'asc' => ['updated_at' => SORT_ASC],
                        'desc' => ['updated_at' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],
                ],
            ],
        ]);

        /*$dataProvider->setSort([
            'attributes' => array_merge($dataProvider->getSort()->attributes, [
                'updated_at' => [
                    'asc' => ['updated_at' => SORT_ASC],
                    'desc' => ['updated_at' => SORT_DESC],
                    'default' => SORT_DESC,
                ],
            ]),
        ]);*/
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        
        if ( $this->up_picker !== '' && !is_null($this->up_picker) ) {
            $up_time = str_replace('.', '-', $this->up_picker);
            $query->andFilterWhere(['<', 'updated_at', Yii::$app->formatter->format($up_time, 'timestamp') - 10800]);
            
            //$query->andFilterWhere(['<', 'updated_at', $this->updated_at]);
      
            
            /*$query->andFilterWhere(
                [
                    '>',
                    new \yii\db\Expression('DATE_FORMAT(updated_at, "%Y.%c.%d %H:%i:%k")'),
                    date('Y.m.d H:i:s', strtotime($this->up_picker)),
                ]
            );*/
            /*$query->andFilterWhere(
                [
                    '>',
                    new \yii\db\Expression('DATE_FORMAT(updated_at, "%Y.%c.%d %H:%i:%k")'),
                    date('Y.m.d H:i:s', strtotime($this->up_picker)),
                ]
            );*/
            //$query->andFilterWhere(['<=', 'updated_at', Yii::$app->getFormatter()->asTimestamp($this->up_picker)]);
        } 
        
        /*if ( $this->updated_at !== '' && !is_null($this->updated_at) ) {

            $query->andFilterWhere(['<', 'updated_at', $this->updated_at]);

        }*/
        
        //$query->andFilterWhere(['>', 'updated_at', Yii::$app->formatter->asTimestamp($this->up_picker)]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
