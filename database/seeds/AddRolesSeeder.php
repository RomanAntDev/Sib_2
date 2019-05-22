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

        $vendor = User::create([
            'username' => 'vendor1',
            'fullname' => 'vendor1',
            'email' => 'vendor1@vendor1.com',
            'password' => Hash::make('secret'),
        ]);
        $vendor->assignRole('vendor');

        $buyer = User::create([
            'username' => 'buyer1',
            'fullname' => 'buyer1',
            'email' => 'buyer1@buyer1.com',
            'password' => Hash::make('secret'),
        ]);
        $buyer->assignRole('buyer');



    }
}
