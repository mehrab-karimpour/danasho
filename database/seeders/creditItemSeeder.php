<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\CreditItem;
use Illuminate\Database\Seeder;

class creditItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creditItem = new CreditItem();
        $creditItem->amount = 25000;
        $creditItem->save();
        $creditItem = new CreditItem();
        $creditItem->amount = 50000;
        $creditItem->save();
        $creditItem = new CreditItem();
        $creditItem->amount = 75000;
        $creditItem->save();
        $creditItem = new CreditItem();
        $creditItem->amount = 100000;
        $creditItem->save();


    }
}
