<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $id_category
 * @property string $title
 * @property string $description
 * @property string $time
 * @property string $date
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CategoryEvent[] $categoryEvents
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category', 'title', 'time', 'date', 'status'], 'required'],
            [['description'], 'string'],
            [['time', 'date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['id_category'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'date' => 'Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryEvents()
    {
        return $this->hasMany(CategoryEvent::className(), ['id_event' => 'id']);
    }
}
