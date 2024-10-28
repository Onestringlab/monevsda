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
        $faker = Faker\Factory::create();
        // $this->call(UsersTableSeeder::class);
        // $limit = 33;
        // for ($i = 0; $i < $limit; $i++) {
        //     DB::table('tb_username')->insert([
        //         'username' => $faker->username,
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'role' => 'Admin',
        //         'password' => bcrypt('secret'),
        //         'remember_token' => str_random(10)
        //     ]);
        // }
        factory(App\Username::class,10)->create();
        
    }
}
