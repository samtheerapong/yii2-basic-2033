<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "request_sources".
 *
 * @property int $id
 * @property string|null $request_sources แหล่งที่มา
 * @property string|null $color สี
 *
 * @property Tickets[] $tickets
 */
class RequestSources extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_sources';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_sources'], 'string', 'max' => 45],
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
            'request_sources' => Yii::t('app', 'แหล่งที่มา'),
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
        return $this->hasMany(Tickets::className(), ['request_sources_id' => 'id']);
    }
}
