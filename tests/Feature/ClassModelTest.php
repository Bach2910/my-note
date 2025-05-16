<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Classes;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_class(): void
    {
        $classes = new Classes([
            'name' => 'CNTT3 k1',
            'description' => 'Lớp công nghệ thông tin',
        ]);

        $this->assertEquals('CNTT3 k1', $classes->name);
        $this->assertEquals('Lớp công nghệ thông tin', $classes->description);
    }

    public function test_update_class(): void
    {
        $classes = Classes::factory()->create();

        $response = $this->put("/classes/{$classes->id}", [
            'name' => 'CNTT3 k1',
            'description' => 'Lớp công nghệ thông tin',
        ]);

        $response->assertRedirect('/classes');

        $this->assertDatabaseHas('classes', [
            'id' => $classes->id,
            'name' => 'CNTT3 k1',
            'description' => 'Lớp công nghệ thông tin',
        ]);
    }
}

