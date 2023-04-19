<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int|null $tickets_id Ticket No.
 * @property string|null $started_at วันที่เริ่ม
 * @property string|null $finished_at วันที่เสร็จ
 * @property string|null $details รายละเอียด
 * @property string|null $actor ผู้ดำเนินการ
 * @property string|null $image รูปภาพ
 *
 * @property Tickets $tickets
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_id'], 'integer'],
            [['details', 'image'], 'string'],
            [['started_at', 'finished_at'], 'string', 'max' => 45],
            [['actor'], 'string', 'max' => 200],
            [['tickets_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tickets::className(), 'targetAttribute' => ['tickets_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tickets_id' => Yii::t('app', 'Ticket No.'),
            'started_at' => Yii::t('app', 'วันที่เริ่ม'),
            'finished_at' => Yii::t('app', 'วันที่เสร็จ'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'actor' => Yii::t('app', 'ผู้ดำเนินการ'),
            'image' => Yii::t('app', 'รูปภาพ'),
        ];
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasOne(Tickets::className(), ['id' => 'tickets_id']);
    }
}
