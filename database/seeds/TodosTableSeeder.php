<?php
use Illuminate\Database\Seeder;         //生成したSeederファイルを使用
use Carbon\Carbon;

class TodosTableSeeder extends Seeder   //Seederクラスを継承したクラスTodosTableSeederを定義
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate();     //truncateで全件削除
        DB::table('todos')->insert([
            [
                'title'      => 'Laravel Lessonを終わらせる',//titleはDBテーブルのカラムに挿入
                'created_at' => Carbon::create(2018, 1, 1),
                'updated_at' => Carbon::create(2018, 1, 1),
            ],
            [
                'title'      =>'レビューに向けて理解を深める',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
        ]);
    }
}