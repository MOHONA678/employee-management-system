<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $employees = [
            ['schedule_id' => 1,'department_id' => 1, 'firstname' => 'Mohona', 'lastname' => 'Akter', 'email' => 'mohona@gmail.com', 'phone' => '+88 (014) 22-455656', 'address' => 'Mirpur-01, Dhaka-1216', 'dob' => '2001-01-01', 'gender' => 2, 'religion' => 1, 'marital' => 2, 'status' => 1 ],
            ['schedule_id' => 1,'department_id' => 2, 'firstname' => 'Shorifa', 'lastname' => 'Akter', 'email' => 'shorifa@gmail.com', 'phone' => '+88 (015) 22-455656', 'address' => 'Mirpur-13, Dhaka-1216', 'dob' => '2001-01-01', 'gender' => 2, 'religion' => 1, 'marital' => 2, 'status' => 1 ],
            ['schedule_id' => 1,'department_id' => 6, 'firstname' => 'Shawon', 'lastname' => 'Khan', 'email' => 'shawonk007@email.com', 'phone' => '+88 (016) 88-947741', 'address' => 'Mirpur-12, Dhaka-1216', 'dob' => '1994-03-06', 'gender' => 1, 'religion' => 1, 'marital' => 2, 'status' => 1 ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
