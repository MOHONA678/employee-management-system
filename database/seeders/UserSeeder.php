<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $users = [
            [ 'role_id' => 1, 'name' => 'Mohona Akter', 'email' => 'mohona@gmail.com', 'phone' => '+88 (014) 22-455656', 'status' => 1, 'password' => Hash::make('admin') ],
            [ 'role_id' => 1, 'name' => 'Shorifa Akter', 'email' => 'shorifa@gmail.com', 'phone' => '+88 (015) 22-455656', 'status' => 1, 'password' => Hash::make('admin') ],
            [ 'role_id' => 1, 'name' => 'Shawon Khan', 'email' => 'shawonk007@gmail.com', 'phone' => '+88 (016) 88-947741', 'status' => 1, 'password' => Hash::make('Dhaka1216') ],
            [ 'role_id' => 2, 'name' => 'Tony Stark', 'email' => 'tony@stark.com', 'phone' => '+88 (012) 34-567890', 'status' => 1, 'password' => Hash::make('secret') ],
            [ 'role_id' => 3, 'name' => 'John Doe', 'email' => 'admin@email.com', 'phone' => '+88 (012) 34-567891', 'status' => 1, 'password' => Hash::make('secret') ],
            [ 'role_id' => 3, 'name' => 'Jane Smith', 'email' => 'jsmith@email.com', 'phone' => '+88 (012) 34-567892', 'status' => 1, 'password' => Hash::make('secret') ],
            [ 'role_id' => 4, 'name' => 'John Smith', 'email' => 'john@email.com', 'phone' => '+88 (012) 34-567893', 'status' => 1, 'password' => Hash::make('secret') ],
            [ 'role_id' => 5, 'name' => 'James Brown', 'email' => 'james@email.com', 'phone' => '+88 (012) 34-567894', 'status' => 1, 'password' => Hash::make('secret') ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
