<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessTable = new Item();
        $tableName = $accessTable->getTable();
        DB::beginTransaction();
        try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table($tableName)->truncate();
                Item::firstOrCreate([
                    'name'          => 'Head Item'
                ],[
                    'image' => 'https://ih1.redbubble.net/image.1262029934.5194/bg,f8f8f8-flat,750x,075,f-pad,750x1000,f8f8f8.jpg',
                    'category_id' => 1,
                    'price' => 10
                ]);
                Item::firstOrCreate([
                    'name'          => 'Hairs Item'
                ],[
                    'image' => 'https://i.pinimg.com/originals/30/c5/b3/30c5b3d3b2738eb095d7fc6833adeec8.png',
                    'category_id' => 2,
                    'price' => 20
                ]);
                Item::firstOrCreate([
                    'name'          => 'Eyes Item'
                ],[
                    'image' => 'https://tse4.mm.bing.net/th?id=OIP.PnJ07_1YPOYDK2a_cok15QHaFm&pid=Api&P=0&w=300&h=300',
                    'category_id' => 3,
                    'price' => 30
                ]);
                Item::firstOrCreate([
                    'name'          => 'Lips Item'
                ],[
                    'image' => 'https://tse1.mm.bing.net/th?id=OIP.8IbhILXrIqlszqkz8kjhCwHaHa&pid=Api&P=0&w=300&h=300',
                    'category_id' => 4,
                    'price' => 40
                ]);
                Item::firstOrCreate([
                    'name'          => 'Neck Item'
                ],[
                    'image' => 'https://tse2.mm.bing.net/th?id=OIP.H267FgholDN-GBhUTS5BqwHaIG&pid=Api&P=0',
                    'category_id' => 5,
                    'price' => 50
                ]);
                Item::firstOrCreate([
                    'name'          => 'Torso Item'
                ],[
                    'image' => 'https://tse1.mm.bing.net/th?id=OIP.KEnRDLU7tKoIgg9wgoP1GwHaHa&pid=Api&P=0',
                    'category_id' => 6,
                    'price' => 60
                ]);
                Item::firstOrCreate([
                    'name'          => 'Hand Item'
                ],[
                    'image' => 'https://cdn.mos.cms.futurecdn.net/RFn2pKbStRXtes8mB5f4mT-1200-80.jpg',
                    'category_id' => 7,
                    'price' => 70
                ]);
                Item::firstOrCreate([
                    'name'          => 'Vest Item'
                ],[
                    'image' => 'https://cdn.shopify.com/s/files/1/0625/2813/products/509-143.jpg?v=1584673177',
                    'category_id' => 8,
                    'price' => 80
                ]);
                Item::firstOrCreate([
                    'name'          => 'Pants Item'
                ],[
                    'image' => 'https://tse3.mm.bing.net/th?id=OIP.7FRbHZnD0QErBvRNoQNMjgHaJ4&pid=Api&P=0',
                    'category_id' => 9,
                    'price' => 90
                ]);
                Item::firstOrCreate([
                    'name'          => 'Shoes Item'
                ],[
                    'image' => 'https://tse3.mm.bing.net/th?id=OIP.5rjS65hEOTLldMLA1k3xEwHaHa&pid=Api&H=160&W=160',
                    'category_id' => 10,
                    'price' => 100
                ]);
                Item::firstOrCreate([
                    'name'          => 'Skin Item'
                ],[
                    'image' => 'https://tse3.mm.bing.net/th?id=OIP.OrHGHXq3zLmHdPyRkWgdlAHaEJ&pid=Api&P=0&w=300&h=300',
                    'category_id' => 11,
                    'price' => 110
                ]);
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                DB::commit();
            } catch (\Exception $th) {
                DB::rollback();
            }
    }
}
