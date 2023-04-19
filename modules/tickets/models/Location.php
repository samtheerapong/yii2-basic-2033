<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string|null $code รหัส
 * @property string|null $location สถานที่
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 45],
            [['location'], 'string', 'max' => 100],
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
            'code' => Yii::t('app', 'รหัส'),
            'location' => Yii::t('app', 'สถานที่'),
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
        return $this->hasMany(Tickets::className(), ['location_id' => 'id']);
    }
}
