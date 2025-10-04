<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'admin_sidebar_name',
                'value' => 'Super Admin',
                'type' => 'text',
                'description' => 'Admin sidebar main title'
            ],
            [
                'key' => 'admin_sidebar_subtitle',
                'value' => 'Administrator',
                'type' => 'text',
                'description' => 'Admin sidebar subtitle'
            ],
            [
                'key' => 'site_title',
                'value' => 'Muhammad Talha | Portfolio',
                'type' => 'text',
                'description' => 'Website main title'
            ],
            [
                'key' => 'site_description',
                'value' => 'Professional Laravel Developer & PHP Expert',
                'type' => 'text',
                'description' => 'Website description'
            ],
            [
                'key' => 'contact_email',
                'value' => 'itsocial470@gmail.com',
                'type' => 'email',
                'description' => 'Contact email address'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+92 332 9911276',
                'type' => 'text',
                'description' => 'Contact phone number'
            ],
            [
                'key' => 'contact_address',
                'value' => 'Peshawar University Road, KPK, Pakistan',
                'type' => 'text',
                'description' => 'Contact address'
            ],
            [
                'key' => 'social_facebook',
                'value' => '',
                'type' => 'url',
                'description' => 'Facebook profile URL'
            ],
            [
                'key' => 'social_twitter',
                'value' => '',
                'type' => 'url',
                'description' => 'Twitter profile URL'
            ],
            [
                'key' => 'social_linkedin',
                'value' => '',
                'type' => 'url',
                'description' => 'LinkedIn profile URL'
            ],
            [
                'key' => 'social_github',
                'value' => '',
                'type' => 'url',
                'description' => 'GitHub profile URL'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Enable maintenance mode'
            ],
            [
                'key' => 'allow_registration',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Allow user registration'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}