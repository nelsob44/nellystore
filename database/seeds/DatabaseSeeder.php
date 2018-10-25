<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Category;
use App\Model\Product;
use App\Model\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Category::class, 5)->create();
        factory(Product::class, 50)->create();
        factory(Payment::class, 20)->create();
    }
}
