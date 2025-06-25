<?php

use yii\db\Migration;

class m250603_225753_create_shkolala_tables extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        // Таблица курсов
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'complexity' => $this->string(50)->notNull(),
            'language' => $this->string(50)->notNull(),
            'duration' => $this->string(50)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Таблица преподавателей
        $this->createTable('{{%teachers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'username' => $this->string(50)->notNull()->unique(),
            'patronymic' => $this->string(100)->notNull(),
            'specialty' => $this->string(255)->notNull(),
            'education' => $this->string(255)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Таблица групп
        $this->createTable('{{%groups}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(20)->notNull()->unique(),
            'student_count' => $this->integer()->notNull()->defaultValue(0),
            'teacher_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Таблица студентов
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'patronymic' => $this->string(100),
            'email' => $this->string(255)->notNull()->unique(),
            'country' => $this->string(100)->notNull(),
            'city' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Таблица записей на курсы
        $this->createTable('{{%enrollments}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'enrolled_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Таблица оценок
        $this->createTable('{{%grades}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'value' => $this->integer()->notNull()->check('value BETWEEN 1 AND 5'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Таблица платежей
        $this->createTable('{{%payments}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'status' => $this->string(20)->notNull()->check("status IN ('paid', 'pending', 'canceled')"),
            'payment_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        // Создание индексов и внешних ключей
        $this->createIndex('idx_groups_teacher_id', '{{%groups}}', 'teacher_id');
        $this->createIndex('idx_groups_course_id', '{{%groups}}', 'course_id');
        $this->createIndex('idx_enrollments_student_id', '{{%enrollments}}', 'student_id');
        $this->createIndex('idx_enrollments_course_id', '{{%enrollments}}', 'course_id');
        $this->createIndex('idx_enrollments_group_id', '{{%enrollments}}', 'group_id');
        $this->createIndex('idx_grades_student_id', '{{%grades}}', 'student_id');
        $this->createIndex('idx_grades_course_id', '{{%grades}}', 'course_id');
        $this->createIndex('idx_payments_student_id', '{{%payments}}', 'student_id');

        // Внешние ключи
        $this->addForeignKey(
            'fk_groups_teacher_id',
            '{{%groups}}',
            'teacher_id',
            '{{%teachers}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_groups_course_id',
            '{{%groups}}',
            'course_id',
            '{{%courses}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_enrollments_student_id',
            '{{%enrollments}}',
            'student_id',
            '{{%students}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_enrollments_course_id',
            '{{%enrollments}}',
            'course_id',
            '{{%courses}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_enrollments_group_id',
            '{{%enrollments}}',
            'group_id',
            '{{%groups}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_grades_student_id',
            '{{%grades}}',
            'student_id',
            '{{%students}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_grades_course_id',
            '{{%grades}}',
            'course_id',
            '{{%courses}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_payments_student_id',
            '{{%payments}}',
            'student_id',
            '{{%students}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_payments_student_id', '{{%payments}}');
        $this->dropForeignKey('fk_grades_course_id', '{{%grades}}');
        $this->dropForeignKey('fk_grades_student_id', '{{%grades}}');
        $this->dropForeignKey('fk_enrollments_group_id', '{{%enrollments}}');
        $this->dropForeignKey('fk_enrollments_course_id', '{{%enrollments}}');
        $this->dropForeignKey('fk_enrollments_student_id', '{{%enrollments}}');
        $this->dropForeignKey('fk_groups_course_id', '{{%groups}}');
        $this->dropForeignKey('fk_groups_teacher_id', '{{%groups}}');

        $this->dropTable('{{%payments}}');
        $this->dropTable('{{%grades}}');
        $this->dropTable('{{%enrollments}}');
        $this->dropTable('{{%students}}');
        $this->dropTable('{{%groups}}');
        $this->dropTable('{{%teachers}}');
        $this->dropTable('{{%courses}}');
    }
}