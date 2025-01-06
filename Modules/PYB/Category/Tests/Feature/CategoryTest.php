<?php

namespace PYB\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PYB\Category\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Tests admin use case see category index page
     * A basic feature test example.
     */
    public function test_admin_use_case_see_category_index_page()
    {
        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
        $response->assertViewIs('category::index');
        $response->assertViewHas('category');
    }

}
