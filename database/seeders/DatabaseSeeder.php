<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Rol;
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
        User::factory()->create([
            'name' => 'Pepe',
            'last_name' => 'Perez',
            'avatar' => 'pepote',
            'email' => 'pepe@mail.es',
            'password' => bcrypt('12345678')
        ]);

        Rol::factory(5)->create();
        $rols = Rol::all();
        $rols->each(function ($rol) {
            $rol->users()->saveMany(
                User::factory(5)->make()
            );
        });

        $users = User::all();
        $users->each(function ($user) {
            $user->posts()->saveMany(
                Post::factory(10)->make()
            );
        });


        $rols->each(function ($rol) {
            $users = User::factory(5)->create();
            $users->each(function ($user) use ($rol) {
                $user->role_id = $rol->id;
                $user->save();

                $user->posts()->saveMany(Post::factory(10)->make());
            });
        });

        /*foreach ($users as $user) {
            $user->posts()->saveMany(
                Post::factory(10)->make()
            );
        }*/

        /*foreach ($users as $user) {
            Post::factory(10)->create([
                'user_id' => $user->id
            ]);
        }*/
    }
}
