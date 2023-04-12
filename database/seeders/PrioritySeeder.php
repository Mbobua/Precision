<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{

    public function run()
    {
        Priority::firstorcreate([
            'priority_name' => 'Low' //primary
        ]);
        Priority::firstorcreate([
            'priority_name' => 'Medium' //warning
        ]);
        Priority::firstorcreate([
            'priority_name' => 'High' //amber
        ]);
        Priority::firstorcreate([
            'priority_name' => 'Urgent' //danger
        ]);
    }
}
