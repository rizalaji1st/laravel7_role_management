<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $superUserRole = Role::where('name','superUser')->first();
        $adminRole = Role::where('name','admin')->first();
        $pendaftarRole = Role::where('name','pendaftar')->first();

        $superUser = User::create([
            'name' => 'Super User',
            'email' => 'superuser@example.com',
            'password' => Hash::make('password'),
        ]);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $pendaftar = User::create([
            'name' => 'User pendaftar',
            'email' => 'pendaftar@example.com',
            'password' => Hash::make('password'),
        ]);

        $superUser->roles()->attach($superUserRole);
        $admin->roles()->attach($adminRole);
        $pendaftar->roles()->attach($pendaftarRole);
    }
}
