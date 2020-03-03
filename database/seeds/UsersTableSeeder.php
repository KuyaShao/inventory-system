<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();
        $authorRole = Role::where('name','author')->first();

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
        ]);

        $user = User::create([
            'name'=>'user',
            'email'=>'gsoOffice@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $author = User::create([
            'name'=>'author',
            'email'=>'misOffice@gmail.com',
            'password'=>Hash::make('password')
        ]);
        $admin->role()->attach($adminRole);
        $user->role()->attach($adminRole);
        $author->role()->attach($adminRole);

    }
}
