<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Kategori;
use App\Mail\DeadlineReminderMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class DeadlineReminderTest extends TestCase
{
    use RefreshDatabase;

    public function test_deadline_reminder_command_sends_emails_to_matching_users(): void
    {
        Mail::fake();

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        $kategori = Kategori::create([
            'nama' => 'Kuliah',
        ]);

        $tugasA = Tugas::create([
            'judul' => 'Tugas Matematika',
            'kategori_id' => $kategori->id,
            'deadline' => now()->addDays(5)->toDateString(),
            'waktu_reminder' => now()->toDateString(),
            'is_selesai' => false,
            'user_id' => $user->id,
        ]);

        $tugasB = Tugas::create([
            'judul' => 'Tugas Fisika',
            'kategori_id' => $kategori->id,
            'deadline' => now()->addDay()->toDateString(),
            'waktu_reminder' => null,
            'is_selesai' => false,
            'user_id' => $user->id,
        ]);

        $tugasC = Tugas::create([
            'judul' => 'Tugas Kimia',
            'kategori_id' => $kategori->id,
            'deadline' => now()->addDays(7)->toDateString(),
            'waktu_reminder' => now()->addDays(2)->toDateString(),
            'is_selesai' => false,
            'user_id' => $user->id,
        ]);

        $tugasD = Tugas::create([
            'judul' => 'Tugas Biologi',
            'kategori_id' => $kategori->id,
            'deadline' => now()->addDays(5)->toDateString(),
            'waktu_reminder' => now()->toDateString(),
            'is_selesai' => true,
            'user_id' => $user->id,
        ]);

        $this->artisan('send:deadline-reminders')
            ->expectsOutput('Berhasil mengirim email pengingat ke 1 pengguna.')
            ->assertExitCode(0);

        Mail::assertSent(DeadlineReminderMail::class, function (DeadlineReminderMail $mail) use ($user, $tugasA, $tugasB, $tugasC, $tugasD) {
            $this->assertEquals($user->email, $mail->user->email);
            
            $tugasIds = $mail->tugasList->pluck('id')->toArray();
            
            $this->assertContains($tugasA->id, $tugasIds);
            $this->assertContains($tugasB->id, $tugasIds);
            
            $this->assertNotContains($tugasC->id, $tugasIds);
            $this->assertNotContains($tugasD->id, $tugasIds);

            return true;
        });
    }
}
