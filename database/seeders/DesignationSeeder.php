<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $designations = [
            [ 'title' => 'Chief Executive Officer (CEO)', 'status' => 1 ],
            [ 'title' => 'Chief Operating Officer (COO)', 'status' => 1 ],
            [ 'title' => 'Chief Information Officer (CIO)', 'status' => 1 ],
            [ 'title' => 'Vice President', 'status' => 1 ],
            [ 'title' => 'Director', 'status' => 1 ],
            [ 'title' => 'Senior Project Manager', 'status' => 1 ],
            [ 'title' => 'Senior Software Engineer', 'status' => 1 ],
            [ 'title' => 'Senior Financial Analyst', 'status' => 1 ],
            [ 'title' => 'IT Support Specialist', 'status' => 1 ],
            [ 'title' => 'HR Generalist', 'status' => 1 ],
            [ 'title' => 'Operations Manager', 'status' => 1 ],
            [ 'title' => 'Product Manager', 'status' => 1 ],
            [ 'title' => 'Software Engineer', 'status' => 1 ],
            [ 'title' => 'Financial Planner', 'status' => 1 ],
            [ 'title' => 'Data Analyst', 'status' => 1 ],
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
