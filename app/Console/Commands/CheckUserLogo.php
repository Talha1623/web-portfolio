<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CheckUserLogo extends Command
{
    protected $signature = 'check:user-logo';
    protected $description = 'Check and fix user logo';

    public function handle()
    {
        $user = User::where('is_admin', true)->first();
        
        if ($user) {
            $this->info('Current logo_image: ' . ($user->logo_image ?? 'NULL'));
            
            // If logo_image is not null but should be, let's fix it
            if ($user->logo_image) {
                $this->info('Logo exists in database: ' . $user->logo_image);
                
                // Check if file actually exists
                if (!file_exists(storage_path('app/public/' . $user->logo_image))) {
                    $this->info('Logo file does not exist, setting to null');
                    $user->logo_image = null;
                    $user->save();
                    $this->info('Logo set to null in database');
                } else {
                    $this->info('Logo file exists');
                }
            } else {
                $this->info('Logo is already null in database');
            }
        } else {
            $this->error('No admin user found');
        }
    }
}