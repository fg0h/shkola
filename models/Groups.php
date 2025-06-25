<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $number
 * @property int $student_count
 * @property int $teacher_id
 * @property int $course_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Courses $course
 * @property Enrollments[] $enrollments
 * @property Raspisanie[] $raspisanies
 * @property Teachers $teacher
 * @property Zapis[] $zapis
 */
class Groups extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_count'], 'default', 'value' => 0],
            [['number', 'teacher_id', 'course_id'], 'required'],
            [['student_count', 'teacher_id', 'course_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['number'], 'string', 'max' => 20],
            [['number'], 'unique'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::class, 'targetAttribute' => ['course_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'student_count' => 'Student Count',
            'teacher_id' => 'Teacher ID',
            'course_id' => 'Course ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['group_id' => 'id']);
    }

    /**
     * Gets query for [[Raspisanies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaspisanies()
    {
        return $this->hasMany(Raspisanie::class, ['group_id' => 'id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::class, ['id' => 'teacher_id']);
    }

    /**
     * Gets query for [[Zapis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZapis()
    {
        return $this->hasMany(Zapis::class, ['group_id' => 'id']);
    }

}
