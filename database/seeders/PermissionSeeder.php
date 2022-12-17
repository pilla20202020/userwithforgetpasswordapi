<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $permissions =  [
            //permission for Permissions
            [
                "name" => "permission-index",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-data",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-create",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-store",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-show",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-edit",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-update",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-delete",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            //permission for roles
            [
                "name" => "role-index",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-data",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-create",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-store",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-show",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-edit",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-update",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-delete",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            //permission for staff
            [
                "name" => "staff-index",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-data",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-create",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-store",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-show",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-edit",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-update",
                "guard_name" => "web",
                "group_name" => "staff",
            ],
            [
                "name" => "staff-delete",
                "guard_name" => "web",
                "group_name" => "staff",
            ],


            

            //permission for student
            [
                "name" => "student-index",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-data",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-create",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-store",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-show",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-edit",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-update",
                "guard_name" => "web",
                "group_name" => "student",
            ],
            [
                "name" => "student-delete",
                "guard_name" => "web",
                "group_name" => "student",
            ],
        ];

        foreach ($permissions as $permission) {
            $menu = new Permission();
            $menu->fill($permission);
            $menu->save();
        }
    }
}
