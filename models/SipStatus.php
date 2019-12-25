<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sip_status".
 *
 * @property int $id
 * @property string $sip
 * @property string $status
 * @property string $datetime
 */
class SipStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sip_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sip', 'status', 'datetime'], 'required'],
            [['status'], 'string'],
            [['datetime'], 'safe'],
            [['sip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sip' => 'Sip',
            'status' => 'Status',
            'datetime' => 'Datetime',
        ];
    }
}
