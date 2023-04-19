<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tickets_priority".
 *
 * @property int $id
 * @property string|null $tickets_priority ความสำคัญ
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class TicketsPriority extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets_priority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_priority'], 'string', 'max' => 45],
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
            'tickets_priority' => Yii::t('app', 'ความสำคัญ'),
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
        return $this->hasMany(Tickets::className(), ['tickets_priority_id' => 'id']);
    }
}
