<?php

namespace app\modules\tickets\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\modules\tickets\models\User;

class Tickets extends \yii\db\ActiveRecord
{

    public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::class,
            'createdAtAttribute' => 'request_at',
            'createdAtAttribute' => 'created_at',
            'updatedAtAttribute' => 'updated_at'
        ],
        [
            'class' => BlameableBehavior::class,
            'createdByAttribute' => 'request_by',
            'updatedByAttribute' => 'updated_by',
        ],
    ];
}
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
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::class, 'targetAttribute' => ['location_id' => 'id']],
            [['request_sources_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestSources::class, 'targetAttribute' => ['request_sources_id' => 'id']],
            [['tickets_impact_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsImpact::class, 'targetAttribute' => ['tickets_impact_id' => 'id']],
            [['tickets_priority_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsPriority::class, 'targetAttribute' => ['tickets_priority_id' => 'id']],
            [['tickets_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsStatus::class, 'targetAttribute' => ['tickets_status_id' => 'id']],
            [['tickets_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsType::class, 'targetAttribute' => ['tickets_type_id' => 'id']],
            [['tickets_urgency_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsUrgency::class, 'targetAttribute' => ['tickets_urgency_id' => 'id']],
            [['request_at','request_by','updated_by','created_at','updated_at'], 'safe'],
            [['request_at','tickets_status_id','tickets_type_id', 'request_sources_id', 'tickets_urgency_id', 'tickets_impact_id', 'tickets_priority_id', 'location_id'], 'required'],
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
            'request_by' => Yii::t('app', 'ผู้แจ้ง'),
            'updated_by' => Yii::t('app', 'ผู้ปรับปรุง'),
            'created_at' => Yii::t('app', 'วันที่สร้าง'),
            'updated_at' => Yii::t('app', 'วันที่ปรับปรุง'),
            'tickets_number' => Yii::t('app', 'เลขที่'),
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

    public function getRequester(){
        return $this->hasOne(User::class, ['id' => 'request_by']);
    }
    public function getUpdater(){
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
