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
            'site_name' => 'My Shop',
            'layout' => 'default',
            'contact_email' => 'contact@myshop.com',
            'contact_phone' => '1234567890',
            'contact_address' => '123 Main Street, USA',
            'map' => null,
            'currency_name' => 'USD',
            'currency_icon' => '$',
            'time_zone' => 'UTC',
        ]);
    }
}
