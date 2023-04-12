<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{

    public function run()
    {

        //Tier Data

        Department::firstorcreate([
            'department_name' => 'Executive', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Innovations', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Service Delivery', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Infrastructure', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Business Development', 'company_id' => 8
        ]);

        //Nabo Capital
        Department::firstorcreate([
            'department_name' => 'Executive', 'company_id' => 6
        ]);
        Department::firstorcreate([
            'department_name' => 'Marketing', 'company_id' => 6
        ]);
        Department::firstorcreate([
            'department_name' => 'Distribution', 'company_id' => 6
        ]);
        Department::firstorcreate([
            'department_name' => 'Investments', 'company_id' => 6
        ]);
        Department::firstorcreate([
            'department_name' => 'Operations', 'company_id' => 6
        ]);
        Department::firstorcreate([
            'department_name' => 'Finance', 'company_id' => 6
        ]);

    }
}
