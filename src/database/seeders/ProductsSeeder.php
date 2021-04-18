<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::factory()->times(1000)->create();
        $values = [];
        $counter = 1000;
        while($counter >= 2000) {
            $values[] = [
                'product_id' => $counter,
                'p_name'     => 'Produckt_'.$counter++,
                'owner'      => 3
            ];
        }
        #DB::table('products')->insert($values);
    }
}
