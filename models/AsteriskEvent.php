<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "asterisk_event".
 *
 * @property int $id
 * @property string $event
 * @property string $privilege
 * @property string $bridge_uniqueid
 * @property string $bridge_type
 * @property string $bridge_technology
 * @property string $bridge_creator
 * @property string $bridge_name
 * @property int $bridge_num_channels
 * @property string $bridge_video_source_mode
 * @property string $channel
 * @property string $channel_state
 * @property string $channel_state_desc
 * @property int $caller_id_num
 * @property string $caller_id_name
 * @property string $connected_line_num
 * @property string $connected_line_name
 * @property string $language
 * @property string|null $account_code
 * @property string $context
 * @property string|null $exten
 * @property int $priority
 * @property string $uniqueid
 * @property string $linkedid
 */
class AsteriskEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asterisk_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['event', 'privilege', 'bridge_uniqueid', 'bridge_type', 'bridge_technology', 'bridge_creator', 'bridge_name', 'bridge_num_channels', 'bridge_video_source_mode', 'channel', 'channel_state', 'channel_state_desc', 'caller_id_num', 'caller_id_name', 'connected_line_num', 'connected_line_name', 'language', 'context', 'priority', 'uniqueid', 'linkedid'], 'required'],
            [['event', 'privilege', 'bridge_uniqueid', 'bridge_type', 'bridge_technology', 'bridge_creator', 'bridge_name', 'bridge_video_source_mode', 'channel', 'channel_state', 'channel_state_desc', 'caller_id_name', 'connected_line_num', 'connected_line_name', 'language', 'account_code', 'context', 'exten', 'uniqueid', 'linkedid','cause_txt', 'dial_status', 'variable', 'dest_channel_state_desc'], 'string'],
            [['bridge_num_channels', 'caller_id_num', 'priority', 'dest_connected_line_num', 'dest_exten'], 'integer'], 'cause_txt', 'dial_status', 'variable', 'dest_channel_state_desc',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event' => 'Event',
            'privilege' => 'Privilege',
            'bridge_uniqueid' => 'Bridge Uniqueid',
            'bridge_type' => 'Bridge Type',
            'bridge_technology' => 'Bridge Technology',
            'bridge_creator' => 'Bridge Creator',
            'bridge_name' => 'Bridge Name',
            'bridge_num_channels' => 'Bridge Num Channels',
            'bridge_video_source_mode' => 'Bridge Video Source Mode',
            'channel' => 'Channel',
            'channel_state' => 'Channel State',
            'channel_state_desc' => 'Channel State Desc',
            'caller_id_num' => 'Caller Id Num',
            'caller_id_name' => 'Caller Id Name',
            'connected_line_num' => 'Connected Line Num',
            'connected_line_name' => 'Connected Line Name',
            'language' => 'Language',
            'account_code' => 'Account Code',
            'context' => 'Context',
            'exten' => 'Exten',
            'priority' => 'Priority',
            'uniqueid' => 'Uniqueid',
            'linkedid' => 'Linkedid',
            'cause_txt' =>'Cause-txt',
            'dial_status'=>'DialStatus',
            'dest_connected_line_num'=>'DestConnectedLineNum',
            'variable'=>'Variable',
            'dest_exten'=>'DestExten',
            'dest_channel_state_desc'=>'DestChannelStateDesc',
        ];
    }
}
