<?php

namespace app\modules\tickets\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\tickets\models\Tasks;

/**
 * TasksSearch represents the model behind the search form of `app\modules\tickets\models\Tasks`.
 */
class TasksSearch extends Tasks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tickets_id'], 'integer'],
            [['started_at', 'finished_at', 'details', 'actor', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tasks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tickets_id' => $this->tickets_id,
        ]);

        $query->andFilterWhere(['like', 'started_at', $this->started_at])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
