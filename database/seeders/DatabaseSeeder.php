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
        Type::factory(5)->create();
        Room::factory(20)->create();
        Payment::factory(5)->create();
        Book::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'phone' => 'test@example.com',
        // ]);
    }
}
