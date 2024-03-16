<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Storage::deleteDirectory('productos');
        Storage::makeDirectory('productos');
        // \App\Models\User::factory(10)->create();

    \App\Models\User::factory()->create([
            'name' => 'Melissa',
            'last_name' => 'Lucero',
            'document_type' => '1',
            'document_number' => '8335117',
            'email' => 'melimin2010@gmail.com',
            'phone' => '69765795',
            'password' => bcrypt('Sung2010')
     ]);
        $this->call([
            FamiliaSeeder::class,
        ]);

        Producto::factory(5)->create();
    }
}
