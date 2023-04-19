<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tickets_urgency".
 *
 * @property int $id
 * @property string|null $tickets_urgency ความเร่งรีบ
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class TicketsUrgency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets_urgency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_urgency'], 'string', 'max' => 45],
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
            'tickets_urgency' => Yii::t('app', 'ความเร่งรีบ'),
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
        return $this->hasMany(Tickets::className(), ['tickets_urgency_id' => 'id']);
    }
}
