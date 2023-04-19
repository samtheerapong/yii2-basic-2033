<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tickets_type".
 *
 * @property int $id
 * @property string|null $tickets_type สถานะ
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class TicketsType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_type'], 'string', 'max' => 45],
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
            'tickets_type' => Yii::t('app', 'สถานะ'),
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
        return $this->hasMany(Tickets::className(), ['tickets_type_id' => 'id']);
    }
}
