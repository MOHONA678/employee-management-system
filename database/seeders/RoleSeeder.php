<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $roles = [
            [ 'title' => 'Super Admin', 'slug' => 'super-admin', 'status' => 1 ],
            [ 'title' => 'Administrator', 'slug' => 'administrator', 'status' => 1 ],
            [ 'title' => 'Moderator', 'slug' => 'moderator', 'status' => 1 ],
            [ 'title' => 'HR Manager', 'slug' => 'hr-manager', 'status' => 1 ],
            [ 'title' => 'Payroll Manager', 'slug' => 'payroll-manager', 'status' => 1 ],
            [ 'title' => 'Data Analyst', 'slug' => 'data-analyst', 'status' => 1 ],
            [ 'title' => 'Department Head', 'slug' => 'department-head', 'status' => 1 ],
            [ 'title' => 'Employee', 'slug' => 'employee', 'status' => 1 ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
