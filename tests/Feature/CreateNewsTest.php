<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateNewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_success()
    {
        // Если есть проверка на пользователя (Middleware):
        // $user = User::factory()->create(); // создание пользователя
        // $this->actingAs($user); // действие от имени созданного пользователя

        $category = Category::factory()->create(); // создание категории, чтобы она была в базе

        $newsData = [
            'title' => 'This is a title',
            'description' => 'This is a description',
            'category_id' => $category->id
        ];

        $response = $this->post('/news/create', $newsData);

        $this->assertDatabaseHas('news', $newsData);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_invalid_form_without_title()
    {
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'description' => 'This is a description',
            'category_id' => $category->id
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_invalid_form_with_too_long_title()
    {
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'hfsdjhgsduigworeghsldghsghireghdskghsdljghbjesghsilhjgdkjchvsldhgsieoSHgjshgjhsoerseoipqowqkxzlmzlkvneihglsidlsdjhgkgkgkgkgkggdhlseiowdihgsldkghleisop',
            'description' => 'This is a description',
            'category_id' => $category->id
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_invalid_form_without_description()
    {
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'name' => 'This is a title',
            'category_id' => $category->id
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }
}
