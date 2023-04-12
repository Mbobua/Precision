<?php

namespace Database\Seeders;

use App\Models\LeaveReason;
use Illuminate\Database\Seeder;

class LeaveReasonSeeder extends Seeder
{

    public function run()
    {
        LeaveReason::firstorcreate([
            'reason' => 'Bereavement'
        ]);
        LeaveReason::firstorcreate([
            'reason' => 'Extended Vacation'
        ]);
        LeaveReason::firstorcreate([
            'reason' => 'Family/Personal Leave'
        ]);
        LeaveReason::firstorcreate([
            'reason' => 'Long-Term Disability'
        ]);
        LeaveReason::firstorcreate([
            'reason' => 'Ongoing Education/Training'
        ]);
        LeaveReason::firstorcreate([
            'reason' => 'Sabbatical Leave'
        ]);
        LeaveReason::firstorcreate([
            'reason' => 'Short-Term Disability'
        ]);
    }
}
