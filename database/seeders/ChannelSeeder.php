<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{

    public function run()
    {
        Channel::firstorcreate([
            'channel_name' => 'Email Address'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'Phone Call'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'Microsoft Teams'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'SMS'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'Verbal'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'WhatsApp'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'Telegram'
        ]);
        Channel::firstorcreate([
            'channel_name' => 'User Dashboard'
        ]);

    }
}
