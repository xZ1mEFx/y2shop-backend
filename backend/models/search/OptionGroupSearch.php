<?php

namespace backend\models\search;

use common\models\Option;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class OptionGroupSearch
 * @package backend\models\search
 */
class OptionGroupSearch extends Option
{

    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'status', 'order', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string'],
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
        $query = Option::find()->alias('o')->joinWith(['optionTranslate']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['name'] = [
            'asc' => ['ot.name' => SORT_ASC],
            'desc' => ['ot.name' => SORT_DESC],
            'default' => SORT_ASC,
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid option conditions
        $query
            ->andFilterWhere([
                'o.id' => $this->id,
                'o.parent_id' => 0,
                'o.status' => $this->status,
                'o.order' => $this->order,
                'o.created_by' => $this->created_by,
                'o.updated_by' => $this->updated_by,
                'o.created_at' => $this->created_at,
                'o.updated_at' => $this->updated_at,
                'o.updated_at' => $this->updated_at,
            ]);

        $query->andFilterWhere(['like', 'ot.name', $this->name]);

        return $dataProvider;
    }

}
