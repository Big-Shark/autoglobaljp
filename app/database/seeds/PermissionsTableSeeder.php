<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();


        $permissions = array(
            array(
                'name'      => 'manage_cars',
                'display_name'      => 'manage cars'
            ),
            array(
                'name'      => 'manage_customers',
                'display_name'      => 'manage customers'
            ),
            array(
                'name'      => 'manage_users',
                'display_name'      => 'manage users'
            ),
            array(
                'name'      => 'manage_roles',
                'display_name'      => 'manage roles'
            ),
        );

        DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->delete();

        $permissions = array(
            array(
                'role_id'      => 1,
                'permission_id' => 1
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 2
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 3
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 4
            ),
        );

        DB::table('permission_role')->insert( $permissions );
    }

}
