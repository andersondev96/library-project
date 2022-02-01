<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\State;
use App\Models\Address;
use App\Models\Client;
use App\Models\Book;
use App\Models\Loan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             StateSeeder::class,
             AddressSeeder::class,
             ClientSeeder::class,
             BookSeeder::class,
             LoanSeeder::class,
         ]);

    }
}
