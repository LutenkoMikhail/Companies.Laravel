<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiCompanyTest extends TestCase
{

    /** @test */
    public function test_assert_status_site()
    {
        $response = $this->get(route('companies'));

        $response->assertStatus(200);

    }

    /** @test */
    public function test_get_company_all()
    {
        $response = $this->json('GET', route('api.v1.companies'));

        $response->assertJson(fn(AssertableJson $json) => $json->hasAll(
            [
                Config::get('constants.json.company'),
                Config::get('constants.json.links'),
                Config::get('constants.json.meta')
            ]
        ));

    }

    /** @test */
    public function test_get_company_all_no_url()
    {
        $response = $this->json('GET', route('api.v1.companies') . 's');

        $response->assertNotFound();

    }

    /** @test */
    public function test_get_company_all_name()
    {
        $response = $this->json('GET', route('api.v1.companies'));

        $response->assertJsonStructure([
            'Company' => [
                '*' => [
                    'edrpou',
                    'full_name',
                    'short_name',
                ]
            ]
        ]);
    }

}
