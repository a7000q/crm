<?php

namespace app\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "sensor_monitors".
 *
 * @property integer $id
 * @property integer $id_sensor
 * @property integer $date
 * @property double $fuel_level
 * @property double $temp
 * @property double $density
 * @property double $water_level
 */
class SensorMonitors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sensor_monitors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sensor', 'date', 'fuel_level', 'temp', 'density', 'water_level'], 'required'],
            [['id_sensor', 'date'], 'integer'],
            [['fuel_level', 'temp', 'density', 'water_level'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sensor' => 'Id Sensor',
            'date' => 'Date',
            'fuel_level' => 'Fuel Level',
            'temp' => 'Temp',
            'density' => 'Density',
            'water_level' => 'Water Level',
        ];
    }

    public function setSensorId($name)
    {
        $sensor = Sensors::findOne(["name" => $name]);

        if ($sensor)
            $this->id_sensor = $sensor->id;
        else
            return false;
    }

    public function getSensor()
    {
        return $this->hasOne(Sensors::className(), ['id' => 'id_sensor']);
    }
}