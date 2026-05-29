<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_page_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_new_users_must_verify_their_email(): void
    {
        Event::fake();

        $response = $this->post('/register', [
            'nama' => 'Test User',
            'email' => 'test@student.unud.ac.id',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@student.unud.ac.id',
        ]);

        $user = User::where('email', 'test@student.unud.ac.id')->first();
        $this->assertNull($user->email_verified_at);

        Event::assertDispatched(Registered::class);
    }

    public function test_unverified_user_is_redirected_to_verification_notice(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@student.unud.ac.id',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertRedirect('/email/verify');
    }

    public function test_email_can_be_verified(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@student.unud.ac.id',
            'password' => bcrypt('password123'),
        ]);

        $this->assertNull($user->email_verified_at);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        $response->assertRedirect('/dashboard');
        $this->assertNotNull($user->fresh()->email_verified_at);
    }
}
