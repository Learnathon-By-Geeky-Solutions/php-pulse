<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::create([
            'site_name' => 'My Awesome Site',
            'layout' => 'default',
            'contact_email' => 'admin@example.com',
            'contact_phone' => '123456789',
            'contact_address' => '123 Main Street, City, Country',
            'map' => '<iframe>Google Map Code</iframe>',
            'currency_name' => 'USD',
            'currency_icon' => '$',
            'time_zone' => 'UTC',
        ]);
    }
}
