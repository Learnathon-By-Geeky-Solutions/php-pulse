<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    // Admin Login Test Case
    public function test_admin_can_login_with_valid_credentials()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200); // Check if login is successful (200 OK)
        $response->assertRedirect('/admin/dashboard'); // Redirect to admin dashboard after login
    }

    public function test_admin_cannot_login_with_invalid_credentials()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302); // Expecting a redirect for failed login
        $response->assertSessionHasErrors(['email' => 'The credentials provided are incorrect.']); // Error message for invalid login
    }

    // User Login Test Case
    public function test_user_can_login_with_valid_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'user@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(200); // Check if login is successful
        $response->assertRedirect('/home'); // Redirect to home page after login
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'user@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302); // Expecting a redirect
        $response->assertSessionHasErrors(['email' => 'The credentials provided are incorrect.']); // Error message for invalid login
    }

    // Vendor Login Test Case
    public function test_vendor_can_login_with_valid_credentials()
    {
        $response = $this->post('/vendor/login', [
            'email' => 'vendor@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(200); // Check if login is successful
        $response->assertRedirect('/vendor/dashboard'); // Redirect to vendor dashboard after login
    }

    public function test_vendor_cannot_login_with_invalid_credentials()
    {
        $response = $this->post('/vendor/login', [
            'email' => 'vendor@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302); // Expecting a redirect
        $response->assertSessionHasErrors(['email' => 'The credentials provided are incorrect.']); // Error message for invalid login
    }
}
