<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Message;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer des users spécifiques
        $john = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.test',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        $jane = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.test',
            'password' => bcrypt('password'),
        ]);

        // Créer des users additionnels
        $additionalUsers = User::factory(20)->create();

        //Création de groupes
        for ($i = 0; $i < 5; $i++) {
            $group = Group::factory()->create([
                'owner_id' => $john->id
            ]);

            // Ajouter les utilisateurs aux groupes
            $userIds = User::inRandomOrder()->limit(rand(2, 5))->pluck('id')->toArray(); // On prend entre 2 et 5 personnes
            $group->users()->attach(array_unique([$john->id, ...$userIds])); // Puis on les insère dans la table pivot group_user
        }

        // Créer des messages de discussion
        Message::factory(1000)->create();


        // Loguer la complétion du seedage
        $this->command->info('Seeding database successfully'); 
    }
}
