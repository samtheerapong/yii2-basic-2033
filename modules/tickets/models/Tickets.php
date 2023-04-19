<?php

namespace app\modules\tickets\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string|null $request_at วันที่เปิด
 * @property int|null $tickets_type_id ประเภท
 * @property int|null $tickets_status_id สถานะ
 * @property int|null $request_sources_id แหล่งที่มา
 * @property int|null $tickets_urgency_id ความเร่งรีบ
 * @property int|null $tickets_impact_id ผลกระทบ
 * @property int|null $tickets_priority_id ความสำคัญ
 * @property int|null $location_id สถานที่
 * @property string|null $image รูปภาพ
 *
 * @property Tasks[] $tasks
 * @property Location $location
 * @property RequestSources $requestSources
 * @property TicketsImpact $ticketsImpact
 * @property TicketsPriority $ticketsPriority
 * @property TicketsStatus $ticketsStatus
 * @property TicketsType $ticketsType
 * @property TicketsUrgency $ticketsUrgency
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tickets_type_id', 'tickets_status_id', 'request_sources_id', 'tickets_urgency_id', 'tickets_impact_id', 'tickets_priority_id', 'location_id'], 'integer'],
            [['image'], 'string'],
            [['request_at'], 'safe'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::class, 'targetAttribute' => ['location_id' => 'id']],
            [['request_sources_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestSources::class, 'targetAttribute' => ['request_sources_id' => 'id']],
            [['tickets_impact_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsImpact::class, 'targetAttribute' => ['tickets_impact_id' => 'id']],
            [['tickets_priority_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsPriority::class, 'targetAttribute' => ['tickets_priority_id' => 'id']],
            [['tickets_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsStatus::class, 'targetAttribute' => ['tickets_status_id' => 'id']],
            [['tickets_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsType::class, 'targetAttribute' => ['tickets_type_id' => 'id']],
            [['tickets_urgency_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsUrgency::class, 'targetAttribute' => ['tickets_urgency_id' => 'id']],
            [['tickets_type_id', 'request_sources_id', 'tickets_urgency_id', 'tickets_impact_id', 'tickets_priority_id', 'location_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'request_at' => Yii::t('app', 'วันที่เปิด'),
            'tickets_type_id' => Yii::t('app', 'ประเภท'),
            'tickets_status_id' => Yii::t('app', 'สถานะ'),
            'request_sources_id' => Yii::t('app', 'แหล่งที่มา'),
            'tickets_urgency_id' => Yii::t('app', 'ความเร่งรีบ'),
            'tickets_impact_id' => Yii::t('app', 'ผลกระทบ'),
            'tickets_priority_id' => Yii::t('app', 'ความสำคัญ'),
            'location_id' => Yii::t('app', 'สถานที่'),
            'image' => Yii::t('app', 'รูปภาพ'),
        ];
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::class, ['tickets_id' => 'id']);
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::class, ['id' => 'location_id']);
    }

    /**
     * Gets query for [[RequestSources]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestSources()
    {
        return $this->hasOne(RequestSources::class, ['id' => 'request_sources_id']);
    }

    /**
     * Gets query for [[TicketsImpact]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketsImpact()
    {
        return $this->hasOne(TicketsImpact::class, ['id' => 'tickets_impact_id']);
    }

    /**
     * Gets query for [[TicketsPriority]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketsPriority()
    {
        return $this->hasOne(TicketsPriority::class, ['id' => 'tickets_priority_id']);
    }

    /**
     * Gets query for [[TicketsStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketsStatus()
    {
        return $this->hasOne(TicketsStatus::class, ['id' => 'tickets_status_id']);
    }

    /**
     * Gets query for [[TicketsType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketsType()
    {
        return $this->hasOne(TicketsType::class, ['id' => 'tickets_type_id']);
    }

    /**
     * Gets query for [[TicketsUrgency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketsUrgency()
    {
        return $this->hasOne(TicketsUrgency::class, ['id' => 'tickets_urgency_id']);
    }
}
