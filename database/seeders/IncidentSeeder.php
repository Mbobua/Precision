<?php

namespace Database\Seeders;

use App\Models\Incidents;
use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{

    public function run()
    {
        Incidents::firstorcreate([
            'incident_name' => 'Access Right Request'
        ])->assets()->attach([2,6,10,11,14,16,17,18,45]);
        Incidents::firstorcreate([
            'incident_name' => 'Not booting'
        ])->assets()->attach([26,27,37,47]);
        Incidents::firstorcreate([
            'incident_name' => 'Spillage'
        ])->assets()->attach([26,27,37,47]);
        Incidents::firstorcreate([
            'incident_name' => 'CToo slow/Hanging'
        ])->assets()->attach([27,37,47]);
        Incidents::firstorcreate([
            'incident_name' => 'Restarts/Shuts down without a command'
        ])->assets()->attach([26,27,37]);

    }
}
