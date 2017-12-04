<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leave".
 *
 * @property integer $l_id
 * @property string $l_name
 * @property string $l_countent
 * @property string $l_time
 * @property integer $u_id
 */
class Leave extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leave';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_time', 'u_id'], 'integer'],
            [['l_name', 'l_countent'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'l_id' => 'L ID',
            'l_name' => 'L Name',
            'l_countent' => 'L Countent',
            'l_time' => 'L Time',
            'u_id' => 'U ID',
        ];
    }
}
