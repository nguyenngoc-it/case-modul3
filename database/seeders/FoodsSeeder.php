<?php

namespace Database\Seeders;

use App\Models\Foods;
use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $food= new Foods();
       $food->name= 'Bánh trôi nước';
       $food->price= 10000;
       $food->category_id=1;
       $food->store_id=1;
       $food->save();
    }
}
