<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tickets_impact".
 *
 * @property int $id
 * @property string|null $tickets_impact ผลกระทบ
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class TicketsImpact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets_impact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_impact'], 'string', 'max' => 45],
            [['color'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tickets_impact' => Yii::t('app', 'ผลกระทบ'),
            'color' => Yii::t('app', 'สี'),
        ];
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['tickets_impact_id' => 'id']);
    }
}
