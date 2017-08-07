<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker = Faker\Factory::create();

        \App\Test::truncate();
        for($i=0; $i<10000; $i++)
        {
            $test = new \App\Test();

            $test->title = $faker->realText(256, 3);
            $test->content = $faker->realText(1024, 3);
            $test->save();
        }

    }
}
