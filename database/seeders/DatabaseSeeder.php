<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea los roles si no existen todavía (evita duplicados en re-seeds)
        $adminRole = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $editorRole = Role::create(['name' => 'Editor', 'guard_name' => 'web']);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        $admin->assignRole($adminRole);

        $editor = User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@example.com',
            'password' => bcrypt('editor'),
        ]);

        $editor->assignRole($editorRole);

        Post::factory(20)->create()
            ->each(function ($post) {
                Comment::factory(rand(0, 5))->create([
                    'post_id' => $post->id,
                ]);
            });
    }
}
