<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Role::create([
            'name'=>'Admin',
            'slug' => 'admin',
            'permissions'=> [
                'role' => ['index', 'create', 'update', 'destroy', 'store', 'edit','getPermissions'],
                'user' => ['index', 'create', 'update', 'destroy', 'store', 'edit', 'getPermissions'],
                'welcome' => ['index','admin']
            ]
        ]);

        \App\Role::create([
            'name'=>'User',
            'slug' => 'user',
            'permissions'=> [
                'welcome' => ['index','user']
            ]
        ]);

        \App\Role::create([
            'name'=>'Client',
            'slug' => 'client',
            'permissions'=> [
                'welcome' => ['index','client']
            ]
        ]);

        \App\User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password'),
            'role_id'=>'1'
        ]);
    }
}
