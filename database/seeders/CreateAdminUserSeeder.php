<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Eve4 Girl',
            'email' => 'eve6@gmail.com',
            'password' => bcrypt('samkipz12345')
        ]);


        $role = Role::create(['name' => 'SuperAdmin6'])->givePermissionTo(Permission::all());
//        Role::create(['name' => $superAdmin,'guard_name'=>$api])->givePermissionTo(Permission::all());

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

//        $role->syncPermissions($permissions);

//        $permissions->syncRoles($role);

        $user->assignRole([$role->id]);
    }
}
