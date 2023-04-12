<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{

    public function run()
    {
        Companies::firstorcreate([
            'company_name' => 'ADMI'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Centum Capital'
        ]);
        Companies::firstorcreate([
            'company_name' => 'CICP'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Centum RE'
        ]);
        Companies::firstorcreate([
            'company_name' => 'GBL'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Nabo Capital'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Pearl Marina'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Tier Data Ltd'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Tribus'
        ]);

        Companies::firstorcreate([
            'company_name' => 'TRLC'
        ]);
        Companies::firstorcreate([
            'company_name' => 'VDL'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Zohari Leasing'
        ]);
    }
}
