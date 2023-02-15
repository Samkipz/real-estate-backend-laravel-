<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Define Permissions
        $addRole = 'add role';
        $updateRole = 'update role';
        $listRole = 'list role';
        $deleteRole = 'delete role';

        $addPermission = 'add permission';
        $updatePermission = 'update permission';
        $listPermission = 'list permission';
        $deletePermission = 'delete permission';

        $addUser = 'add user';
        $updateUser = 'update user';
        $listUser = 'list user';
        $deleteUser = 'delete user';

        $addTenant = 'add tenant';
        $updateTenant = 'update tenant';
        $listTenant = 'list tenant';
        $deleteTenant = 'delete tenant';

        $addUnit = 'add unit';
        $updateUnit = 'update unit';
        $listUnit = 'list unit';
        $deleteUnit = 'delete unit';

        $addProject = 'add project';
        $updateProject = 'update project';
        $listProject = 'list project';
        $deleteProject = 'delete project';

        $api='api';

        //Create Permissions
        Permission::updateOrCreate(['name' => $addUser, 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $updateUser , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $listUser , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $deleteUser , 'guard_name'=>$api]);

        Permission::updateOrCreate(['name' => $addRole , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $updateRole , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $listRole , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $deleteRole , 'guard_name'=>$api]);

        Permission::updateOrCreate(['name' => $addTenant , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $updateTenant , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $listTenant , 'guard_name'=>$api]);
        Permission::updateOrCreate(['name' => $deleteTenant , 'guard_name'=>$api]);

        //Defining Roles
        $superAdmin = 'super-admin';
        $projectAdmin = 'project-admin';
        $tenant = 'tenant';
        $guestUser = 'guest-user';

        //Create Roles
        Role::updateOrCreate(['name' => $superAdmin, 'guard_name'=>$api])->givePermissionTo(Permission::all());
        Role::updateOrCreate(['name' => $projectAdmin, 'guard_name'=>$api])->givePermissionTo([
            $addTenant,
            $updateTenant,
            $listTenant,
            $deleteTenant
        ]);
        Role::updateOrCreate(['name' => $tenant, 'guard_name'=>$api])->givePermissionTo([
            $listRole
        ]);
    }
}
