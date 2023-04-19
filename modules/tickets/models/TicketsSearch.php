<?php

namespace app\modules\tickets\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\tickets\models\Tickets;

/**
 * TicketsSearch represents the model behind the search form of `app\modules\tickets\models\Tickets`.
 */
class TicketsSearch extends Tickets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tickets_type_id', 'tickets_status_id', 'request_sources_id', 'tickets_urgency_id', 'tickets_impact_id', 'tickets_priority_id', 'location_id'], 'integer'],
            [['request_at', 'image'], 'safe'],
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
        $query = Tickets::find();

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
            'tickets_type_id' => $this->tickets_type_id,
            'tickets_status_id' => $this->tickets_status_id,
            'request_sources_id' => $this->request_sources_id,
            'tickets_urgency_id' => $this->tickets_urgency_id,
            'tickets_impact_id' => $this->tickets_impact_id,
            'tickets_priority_id' => $this->tickets_priority_id,
            'location_id' => $this->location_id,
        ]);

        $query->andFilterWhere(['like', 'request_at', $this->request_at])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
