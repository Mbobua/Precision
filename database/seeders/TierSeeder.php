<?php

namespace Database\Seeders;

use App\Models\Tier;
use Illuminate\Database\Seeder;

class TierSeeder extends Seeder
{

    public function run()
    {
        Tier::firstorcreate([
            'tier_name' => 'Tier-One'
        ]);
        Tier::firstorcreate([
            'tier_name' => 'Tier-Two'
        ]);
        Tier::firstorcreate([
            'tier_name' => 'Tier-Three'
        ]);
    }
}
