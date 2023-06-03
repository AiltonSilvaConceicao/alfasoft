<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contacts;
use DateTime;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        $newContact = new Contacts([
            "name" => "Antonio Santos",
            "contact" => "(71) 99158-5487",
            "email" => "antonio@terra.com",
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $newContact->save();

        $newContact = new Contacts([
            "name" => "Maria Luiza",
            "contact" => "(71) 99155-5465",
            "email" => "marialuiza@gmail.com",
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $newContact->save();

        $newContact = new Contacts([
            "name" => "Frederico Silva",
            "contact" => "(75) 98587-3622",
            "email" => "fred@hotmail.com",
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $newContact->save();

        $newContact = new Contacts([
            "name" => "Gessica Santos",
            "contact" => "(71) 99958-5466",
            "email" => "gessica@terra.com",
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $newContact->save();

        $newContact = new Contacts([
            "name" => "Paulo Santana",
            "contact" => "(71) 98857-5460",
            "email" => "paulo@gmail.com",
            'created_at' => $now,
            'updated_at' => $now
        ]);
        $newContact->save();
    }
}
