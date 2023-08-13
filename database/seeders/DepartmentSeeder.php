<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [ 'title' => 'Finance and Accounting', 'status' => 1 ],
            [ 'title' => 'Human Resources (HR)', 'status' => 1 ],
            [ 'title' => 'Marketing and Sales', 'status' => 1 ],
            [ 'title' => 'Research and Development (R&D)', 'status' => 1 ],
            [ 'title' => 'Operations and Supply Chain', 'status' => 1 ],
            [ 'title' => 'Information Technology (IT)', 'status' => 1 ],
            [ 'title' => 'Legal and Compliance', 'status' => 1 ],
            [ 'title' => 'Corporate Communications', 'status' => 1 ],
            [ 'title' => 'Strategy and Business Development', 'status' => 1 ],
            [ 'title' => 'Customer Service', 'status' => 1 ],
            [ 'title' => 'Environmental, Health, and Safety (EHS)', 'status' => 1 ],
            [ 'title' => 'Quality Assurance', 'status' => 1 ],
            [ 'title' => 'Corporate Social Responsibility (CSR)', 'status' => 1 ],
            [ 'title' => 'International Operations', 'status' => 1 ],
            [ 'title' => 'Risk Management', 'status' => 1 ],
            [ 'title' => 'Strategic Partnerships and Alliances', 'status' => 1 ],
            [ 'title' => 'Learning and Development', 'status' => 1 ],
            [ 'title' => 'Diversity and Inclusion', 'status' => 1 ],
            [ 'title' => 'Internal Audit', 'status' => 1 ],
            [ 'title' => 'Data Analytics and Business Intelligence', 'status' => 1 ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
