<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{

    public function run()
    {
        Asset::firstorcreate([
            'name' => 'AntiVirus/Bit Defender'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'APX'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'ESD SetUp'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Go to Meeting'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Go to Webinar'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Login/Security Credentials'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Mirror Op'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Nitro PDF'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Office 365'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'One Drive'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Outlook Email'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Precision HR'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Procore'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Procure-ke'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Real CRM'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Revenue Stadia'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'SharePoint'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Social Media'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Software License'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Virus'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Website'
        ])->categories()->attach([2]);
        Asset::firstorcreate([
            'name' => 'Zoom'
        ])->categories()->attach([2]);
        /*Hardware*/
        Asset::firstorcreate([
            'name' => 'Boardroom-Microphone'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'CCTV'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Desk phone'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Desktop'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Desktop-Keyboard'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Desktop-Monitor'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Desktop-Mouse'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'ESD Machine'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Ethernet Cable'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Extension Cable'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Guest WiFi'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'HDMI Cable'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'HDMI-VGA-converter'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Laptop'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Laptop-Charger'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Laptop-Screen'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Laptop-Touchpad'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Meeting-Room-iPad'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Mi-fi'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Mirror Op Device'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Mobile Phone'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Office WiFi'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Paper Shredder'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Printer'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'ProBook'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Router'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Staff Access Card'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Switch'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Tablet'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Television'
        ])->categories()->attach([1]);
        Asset::firstorcreate([
            'name' => 'Other/Not found my pick'
        ])->categories()->attach([2]);


    }
}
