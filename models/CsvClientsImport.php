<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CsvClientsImport extends Model
{

    public $csv;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

        ];
    }

    public function attributeLabels()
    {
        return [
            'csv' => 'Загрузите csv фаил со списком клиентов',
        ];
    }
}
