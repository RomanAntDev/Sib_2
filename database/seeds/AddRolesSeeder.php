<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin777',
            'fullname' => 'admin777',
            'email' => 'admin777@admin777.com',
            'password' => Hash::make('secret'),
        ]);
        $admin->assignRole('admin');
    }
}
