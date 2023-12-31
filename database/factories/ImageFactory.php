<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            "announcements/Finiture3-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti10-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti2-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti3-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti4-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti5-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti6-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti7-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti8-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Impianti9-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/Interventi-Murari2-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/OIG.La.jpg",
            "announcements/Pavimento-Rivestimento2-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/ProgettiConsulenza2-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/ProgettiConsulenza3-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/ProgettiConsulenza4-Tim-Edile-Ristrutturazione-Milano.png",
            "announcements/border collie.png",
            "announcements/brutto trittico.png",
            "announcements/fra e cri.png",
            "announcements/fra e cri2.png",
            "announcements/fra e cri3.png",
            "announcements/lavastoviglie.png",
            "announcements/lavastoviglie2.png",
            "announcements/lavastoviglie3.png",
            "announcements/nada e nocciola.png",
            "announcements/nada in bagno con la coda.png",
            "announcements/nocciola e camilla.png",
            "announcements/nocciola e camilla2.png",
            "announcements/sfondoLegno2-Tim-Edile-Ristrutturazione-Milano.jpg",
            "announcements/spillo che dorme 1.png",
            "announcements/spillo che dorme 2.png",
            "announcements/spillo che dorme 3.png",
            "announcements/spillo che dorme 4.png",
            "announcements/spillo e leo dormono.png",
            "announcements/zeus e nada litigano di brutto.png",
            "announcements/zeus e nada litigano.png",
            "announcements/zeus e nada.png",
            // ...aggiungi tutti gli altri percorsi delle immagini qui
        ];

        return [
            'path' => $this->faker->randomElement($images),
        ];
    }
}
