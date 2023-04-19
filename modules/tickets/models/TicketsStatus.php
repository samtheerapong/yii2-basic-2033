<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tickets_status".
 *
 * @property int $id
 * @property string|null $tickets_status สถานะ
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class TicketsStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_status'], 'string', 'max' => 45],
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
            'tickets_status' => Yii::t('app', 'สถานะ'),
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
        return $this->hasMany(Tickets::className(), ['tickets_status_id' => 'id']);
    }
}
