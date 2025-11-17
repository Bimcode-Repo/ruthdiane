<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bimcode.io',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $this->command->info('✅ Compte admin créé avec succès !');
    }
}
