<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessTable = new User();
        $tableName = $accessTable->getTable();
        DB::beginTransaction();
        try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table($tableName)->truncate();
                User::firstOrCreate([
                    'name'          => 'Sanu Basak',
                    'email' => 'sanu.bhumca2014@gmail.com'
                ],[
                    'currency' => '1000',
                    'password' => bcrypt('qwerty@123')
                ]);
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                DB::commit();
            } catch (\Exception $th) {
                DB::rollback();
            }
    }
}
