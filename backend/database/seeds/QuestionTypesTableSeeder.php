<?php

use Illuminate\Database\Seeder;

class QuestionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->truncate();

        $records = [
            [
                'name' => 'text',
                'description' => 'テキスト入力'
            ],
            [
                'name' => 'select one',
                'description' => '1つ選択'
            ],
            [
                'name' => 'select multiple',
                'description' => '複数選択'
            ]
        ];

        foreach ($records as $record) {
            DB::table('question_types')->insert($record);
        }
    }
}
