<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $phone
 * @property string $note
 * @property string $name
 * @property int $status
 * @property string|null $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'name', 'status'], 'required'],
            [['note'], 'string'],
            [['status'], 'integer'],
            [['phone', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Телефон',
            'note' => 'Заметка',
            'name' => 'Имя',
            'status' => 'Статус',
            'deleted_at' => 'Удален',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
