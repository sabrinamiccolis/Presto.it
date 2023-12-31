<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->admin();

        // Creazione dei revisori
        $this->revisors();

        // Creazione dei clienti normali
        \App\Models\User::factory(20)->create();

        // Creazione delle categorie
        $this->categories(); 
        
        // Creazione di 30 annunci revisionati
        \App\Models\Announcement::factory(30)->create(['revised' => true]);

        // Creazione di 20 annunci non revisionati
        \App\Models\Announcement::factory(20)->create(['revised' => null]);



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    private function admin() {
        \App\Models\User::create([
            'terms_accepted' => '1',
            'name' => 'IngegnerFra',
            'role' => 'admin',
            'birthday' => '1993-02-25',
            'city' => 'Polistena',
            'prov' => '(RC)',
            'email' => 'frainge@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        \App\Models\User::create([
            'terms_accepted' => '1',
            'name' => 'MiccoSabri',
            'role' => 'admin',
            'birthday' => '1993-02-25',
            'city' => 'Bari',
            'prov' => '(Ba)',
            'email' => 'sabrimicco@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        \App\Models\User::create([
            'terms_accepted' => '1',
            'name' => 'LadiDario',
            'role' => 'admin',
            'birthday' => '1993-02-25',
            'city' => 'Bitonto',
            'prov' => '(Ba)',
            'email' => 'darioladi@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }

    // Metodo per la creazione dei revisori
    private function revisors() {
        for ($i = 0; $i < 5; $i++) {
            \App\Models\User::create([
                'terms_accepted' => '1',
                'name' => fake()->unique()->name(),
                'role' => 'revisor',
                'birthday' => fake()->date('Y-m-d'),
                'city' => fake()->city(),
                'prov' => fake()->stateAbbr(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => \Illuminate\Support\Facades\Hash::make('password'), // Sostituisci con una password appropriata
            ]);
        }
    }


    private function categories()
    {

        \App\Models\Category::create(['name' => 'Moda']);
        \App\Models\Category::create(['name' => 'Giardino']);
        \App\Models\Category::create(['name' => 'Casa']);
        \App\Models\Category::create(['name' => 'Tecnologia']);
        \App\Models\Category::create(['name' => 'Sport']);
        \App\Models\Category::create(['name' => 'Animali']);
        \App\Models\Category::create(['name' => 'Veicoli']);
        \App\Models\Category::create(['name' => 'Artigianato']);
        \App\Models\Category::create(['name' => 'Musica']);
        \App\Models\Category::create(['name' => 'Libri']);

    }

}
