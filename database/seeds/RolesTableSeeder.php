<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'slug' => 'admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'lig member',
                'slug' => 'lig-member',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'client',
                'slug' => 'client',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

        $this->command->info('Three roles Admin, Lig-member and client has been created');
    }
}
