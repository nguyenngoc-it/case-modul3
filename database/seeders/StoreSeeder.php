<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store= new Store();
        $store->name='Bia Hơi';
        $store->address= 'Hà Nội';
        $store->user_id=1;
        $store->id=1;
        $store->save();
        $store= new Store();
        $store->name='Bia Hơi Hai Xom';
        $store->address= 'Hà Nội';
        $store->user_id=1;
        $store->id=2;
        $store->save();
    }
}
