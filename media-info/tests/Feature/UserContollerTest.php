<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserContollerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_registerPage_returnCorrectView()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('user.register');
    }

    public function test_storeUser_RedirectToHomePage()
    {
        $response = $this->post('/users');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
    public function test_loginPage_returnCorrectView()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('user.login');
    }

    public function test_authenticationUser_RedirectToHomePage()
    {
        $response = $this->post('/users/authenticate');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
  

    public function test_logoutUser_RedirectToHomePage()
    {
        $response = $this->post('/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
