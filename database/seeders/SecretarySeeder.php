<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Database\Factories\SecretaryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecretarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = "admin.user@leopardi.it";
        $user->password = password_hash('admin', PASSWORD_ARGON2ID);
        $user->save();
        $admin = new Teacher();
        $admin->firstname = 'admin';
        $admin->lastname = 'user';
        $admin->role = 'Segreteria';
        $admin->user_id = $user->id;
        $admin->site_id = null;
        $admin->save();
        Teacher::factory()->count(20)->create(['site_id' => null, 'role' => 'Segreteria']);
    }
}
