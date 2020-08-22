<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'profile_create',
            ],
            [
                'id'    => 18,
                'title' => 'profile_edit',
            ],
            [
                'id'    => 19,
                'title' => 'profile_show',
            ],
            [
                'id'    => 20,
                'title' => 'profile_delete',
            ],
            [
                'id'    => 21,
                'title' => 'profile_access',
            ],
            [
                'id'    => 22,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'category_create',
            ],
            [
                'id'    => 24,
                'title' => 'category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'category_show',
            ],
            [
                'id'    => 26,
                'title' => 'category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'category_access',
            ],
            [
                'id'    => 28,
                'title' => 'subcategory_create',
            ],
            [
                'id'    => 29,
                'title' => 'subcategory_edit',
            ],
            [
                'id'    => 30,
                'title' => 'subcategory_show',
            ],
            [
                'id'    => 31,
                'title' => 'subcategory_delete',
            ],
            [
                'id'    => 32,
                'title' => 'subcategory_access',
            ],
            [
                'id'    => 33,
                'title' => 'product_create',
            ],
            [
                'id'    => 34,
                'title' => 'product_edit',
            ],
            [
                'id'    => 35,
                'title' => 'product_show',
            ],
            [
                'id'    => 36,
                'title' => 'product_delete',
            ],
            [
                'id'    => 37,
                'title' => 'product_access',
            ],
            [
                'id'    => 38,
                'title' => 'location_management_access',
            ],
            [
                'id'    => 39,
                'title' => 'region_create',
            ],
            [
                'id'    => 40,
                'title' => 'region_edit',
            ],
            [
                'id'    => 41,
                'title' => 'region_show',
            ],
            [
                'id'    => 42,
                'title' => 'region_delete',
            ],
            [
                'id'    => 43,
                'title' => 'region_access',
            ],
            [
                'id'    => 44,
                'title' => 'place_create',
            ],
            [
                'id'    => 45,
                'title' => 'place_edit',
            ],
            [
                'id'    => 46,
                'title' => 'place_show',
            ],
            [
                'id'    => 47,
                'title' => 'place_delete',
            ],
            [
                'id'    => 48,
                'title' => 'place_access',
            ],
            [
                'id'    => 49,
                'title' => 'address_create',
            ],
            [
                'id'    => 50,
                'title' => 'address_edit',
            ],
            [
                'id'    => 51,
                'title' => 'address_show',
            ],
            [
                'id'    => 52,
                'title' => 'address_delete',
            ],
            [
                'id'    => 53,
                'title' => 'address_access',
            ],
            [
                'id'    => 54,
                'title' => 'account_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 56,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 57,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 58,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 59,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 60,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}