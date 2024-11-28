<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Credential;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'Valb',
            'email'    => 'valb.mig@gmail.com',
            'password' => Hash::make('password')
        ]);

        Application::factory()->create([
            'application_name' => 'Github',
            'application_icon' => 'fa-brands fa-github'
        ]);

        Credential::factory()->create([
            'user_id'          => 1,
            'application_id'   => 1,
            'credential_user'  => 'valbb',
            'credential_token' => '1234567890',
            'credential_token_status' => 'UNKNOWN'
        ]);
    }
}
