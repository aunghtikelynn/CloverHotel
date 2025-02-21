<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Room;
use App\Models\Payment;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Type::factory(2)->create();
        // Room::factory(5)->create();
        // Payment::factory(5)->create();
        // Book::factory(2)->create();

        User::create([
            'name' => 'Super Admin',
            'phone' => '09876145278',
            'profile' => '/images/profiles/sa.png',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'Super Admin',
        ]);
    }
}
