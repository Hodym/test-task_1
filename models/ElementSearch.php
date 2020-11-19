<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Element;

/**
 * ElementSearch represents the model behind the search form about `app\models\Element`.
 */
class ElementSearch extends Element {

    const PAGE_S = 5;

    public $up_picker;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['id', 'category_id', 'created_at', 'updated_at'], 'integer'],
                [['name', 'description', 'categoryName', 'up_picker'], 'safe'],
                [['param_done', 'param_all'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Element::find()->with('category');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id',
                    'name',
                    'category_id',
                    'description',
                    'param_done',
                    /*'param_done' => [
                        'asc' => ['param_done' => SORT_ASC],
                        'desc' => ['param_done' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],*/
                    'param_all',
                    'updated_at' => [
                        'asc' => ['updated_at' => SORT_ASC],
                        'desc' => ['updated_at' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],
                ],
            ],
            'pagination' => [
                'pageSize' => self::PAGE_S,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
                //'param_done' => $this->param_done,
                //'param_all' => $this->param_all,
                //'created_at' => $this->created_at,
                //'updated_at' => $this->updated_at,
        ]);
        
        $query->andFilterWhere(['like', 'name', $this->name]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        if ($this->up_picker !== '' && !is_null($this->up_picker)) {
            $up_time = str_replace('.', '-', $this->up_picker);
            $query->andFilterWhere(['<', 'updated_at', Yii::$app->formatter->asTimestamp($up_time . ' UTC')]);
        }

        //if ( is_integer($this->param_progress) && 0 < $this->param_progress && $this->param_progress <= 100 ) {
        if ($this->param_done !== '' && !is_null($this->param_done)) {
            $query->andFilterWhere(['>', 'param_done', 0])
                    ->andWhere('ROUND(param_done * 100.0 / param_all, 1) > :param_progress', [':param_progress' => $this->param_done]);
        }

        return $dataProvider;
    }

}
