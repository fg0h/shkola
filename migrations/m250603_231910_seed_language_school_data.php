<?php

use yii\db\Migration;

class m250603_231910_seed_language_school_data extends Migration
{
    public function safeUp()
    {
        // Добавление курсов
        $this->batchInsert('{{%courses}}',
            ['name', 'complexity', 'language', 'duration'],
            [
                ['Английский для начинающих', 'Начальный', 'Английский', '3 месяца'],
                ['Разговорный английский', 'Средний', 'Английский', '4 месяца'],
                ['Подготовка к IELTS', 'Продвинутый', 'Английский', '2 месяца'],
                ['Французский язык', 'Начальный', 'Французский', '5 месяцев'],
                ['Испанский для путешествий', 'Средний', 'Испанский', '3 месяца'],
            ]
        );

        // Добавление преподавателей
        $this->batchInsert('{{%teachers}}',
            ['name', 'username', 'patronymic', 'specialty', 'education'],
            [
                ['Иванова Анна', 'aivanova', 'Сергеевна', 'Лингвистика', 'МГУ, филологический факультет'],
                ['Петров Дмитрий', 'dpetrov', 'Игоревич', 'Преподавание английского', 'МГЛУ, факультет иностранных языков'],
                ['Сидорова Елена', 'esidorova', 'Викторовна', 'Французская литература', 'Сорбонна, магистр лингвистики'],
                ['Кузнецов Алексей', 'akuznetsov', 'Олегович', 'Испанская филология', 'Университет Барселоны'],
            ]
        );

        // Добавление групп
        $this->batchInsert('{{%groups}}',
            ['number', 'student_count', 'teacher_id', 'course_id'],
            [
                ['ENG-101', 12, 1, 1],
                ['ENG-201', 10, 2, 2],
                ['ENG-301', 8, 2, 3],
                ['FR-101', 15, 3, 4],
                ['SP-201', 10, 4, 5],
            ]
        );

        // Добавление студентов
        $this->batchInsert('{{%students}}',
            ['first_name', 'last_name', 'patronymic', 'email', 'country', 'city'],
            [
                ['Иван', 'Смирнов', 'Иванович', 'ivan@example.com', 'Россия', 'Москва'],
                ['Ольга', 'Ковалева', 'Олеговна', 'olga@example.com', 'Россия', 'Санкт-Петербург'],
                ['Алексей', 'Попов', 'Алексеевич', 'alex@example.com', 'Казахстан', 'Алматы'],
                ['Мария', 'Лебедева', 'Сергеевна', 'maria@example.com', 'Беларусь', 'Минск'],
                ['Денис', 'Новиков', 'Денисович', 'denis@example.com', 'Украина', 'Киев'],
                ['Екатерина', 'Фролова', 'Егоровна', 'ekaterina@example.com', 'Россия', 'Казань'],
            ]
        );

        // Запись на курсы
        $this->batchInsert('{{%enrollments}}',
            ['student_id', 'course_id', 'group_id'],
            [
                [1, 1, 1],
                [2, 2, 2],
                [3, 3, 3],
                [4, 4, 4],
                [5, 5, 5],
                [6, 1, 1],
            ]
        );

        // Добавление оценок
        $this->batchInsert('{{%grades}}',
            ['student_id', 'course_id', 'value'],
            [
                [1, 1, 5],
                [2, 2, 4],
                [3, 3, 5],
                [4, 4, 4],
                [5, 5, 5],
                [6, 1, 5],
            ]
        );

        // Добавление платежей
        $this->batchInsert('{{%payments}}',
            ['student_id', 'amount', 'status'],
            [
                [1, 12500.00, 'paid'],
                [2, 14800.00, 'paid'],
                [3, 18900.00, 'pending'],
                [4, 13200.00, 'paid'],
                [5, 10900.00, 'paid'],
                [6, 12500.00, 'canceled'],
            ]
        );
    }

    public function safeDown()
    {
        $this->delete('{{%payments}}');
        $this->delete('{{%grades}}');
        $this->delete('{{%enrollments}}');
        $this->delete('{{%students}}');
        $this->delete('{{%groups}}');
        $this->delete('{{%teachers}}');
        $this->delete('{{%courses}}');
    }
}