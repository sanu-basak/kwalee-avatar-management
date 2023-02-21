<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessTable = new Category();
        $tableName = $accessTable->getTable();
        DB::beginTransaction();
        try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table($tableName)->truncate();
                Category::firstOrCreate([
                    'name'          => 'Head'
                ],[
                    'icon' => 'https://ih1.redbubble.net/image.1262029934.5194/bg,f8f8f8-flat,750x,075,f-pad,750x1000,f8f8f8.jpg',
                    'sequnece' => 1
                ]);
                Category::firstOrCreate([
                    'name'          => 'Hairs'
                ],[
                    'icon' => 'https://i.pinimg.com/originals/30/c5/b3/30c5b3d3b2738eb095d7fc6833adeec8.png',
                    'sequnece' => 2
                ]);
                Category::firstOrCreate([
                    'name'          => 'Eyes'
                ],[
                    'icon' => 'https://tse4.mm.bing.net/th?id=OIP.PnJ07_1YPOYDK2a_cok15QHaFm&pid=Api&P=0&w=300&h=300',
                    'sequnece' => 3
                ]);
                Category::firstOrCreate([
                    'name'          => 'Lips'
                ],[
                    'icon' => 'https://tse1.mm.bing.net/th?id=OIP.8IbhILXrIqlszqkz8kjhCwHaHa&pid=Api&P=0&w=300&h=300',
                    'sequnece' => 4
                ]);
                Category::firstOrCreate([
                    'name'          => 'Neck'
                ],[
                    'icon' => 'https://tse2.mm.bing.net/th?id=OIP.H267FgholDN-GBhUTS5BqwHaIG&pid=Api&P=0',
                    'sequnece' => 5
                ]);
                Category::firstOrCreate([
                    'name'          => 'Torso'
                ],[
                    'icon' => 'https://tse1.mm.bing.net/th?id=OIP.KEnRDLU7tKoIgg9wgoP1GwHaHa&pid=Api&P=0',
                    'sequnece' => 6
                ]);
                Category::firstOrCreate([
                    'name'          => 'Hand'
                ],[
                    'icon' => 'https://cdn.mos.cms.futurecdn.net/RFn2pKbStRXtes8mB5f4mT-1200-80.jpg',
                    'sequnece' => 7
                ]);
                Category::firstOrCreate([
                    'name'          => 'Vest'
                ],[
                    'icon' => 'https://cdn.shopify.com/s/files/1/0625/2813/products/509-143.jpg?v=1584673177',
                    'sequnece' => 8
                ]);
                Category::firstOrCreate([
                    'name'          => 'Pants'
                ],[
                    'icon' => 'https://tse3.mm.bing.net/th?id=OIP.7FRbHZnD0QErBvRNoQNMjgHaJ4&pid=Api&P=0',
                    'sequnece' => 9
                ]);
                Category::firstOrCreate([
                    'name'          => 'Shoes'
                ],[
                    'icon' => 'https://tse3.mm.bing.net/th?id=OIP.5rjS65hEOTLldMLA1k3xEwHaHa&pid=Api&H=160&W=160',
                    'sequnece' => 10
                ]);
                Category::firstOrCreate([
                    'name'          => 'Skin'
                ],[
                    'icon' => 'https://tse3.mm.bing.net/th?id=OIP.OrHGHXq3zLmHdPyRkWgdlAHaEJ&pid=Api&P=0&w=300&h=300',
                    'sequnece' => 11
                ]);
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                DB::commit();
            } catch (\Exception $th) {
                DB::rollback();
            }
    }
}

