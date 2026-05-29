<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Mime\Address;
use App\Models\Tugas;
use App\Mail\DeadlineReminderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('send-mail', function () {
    $email = (new MailtrapEmail())
        ->from(new Address('hello@demomailtrap.co', 'Mailtrap Test'))
        ->to(new Address('paulina.2311411143@student.unud.ac.id'))
        ->subject('You are awesome!')
        ->category('Integration Test')
        ->text('Congrats for sending test email with Mailtrap!');

    $response = MailtrapClient::initSendingEmails(
        apiKey: env('MAILTRAP_API_KEY')
    )->send($email);

    var_dump(ResponseHelper::toArray($response));
})->purpose('Send Mail');

Artisan::command('send:deadline-reminders', function () {
    $hariIni = now()->toDateString();
    $besok = now()->addDay()->toDateString();

    $tugasList = Tugas::with(['user', 'kategori'])
        ->where('is_selesai', false)
        ->where(function ($query) use ($hariIni, $besok) {
            $query->whereDate('waktu_reminder', $hariIni)
                  ->orWhereDate('deadline', $besok);
        })
        ->get();

    if ($tugasList->isEmpty()) {
        $this->info('Tidak ada tugas yang membutuhkan pengingat hari ini.');
        return;
    }

    $tugasGroupedByUser = $tugasList->groupBy('user_id');

    $sentCount = 0;
    foreach ($tugasGroupedByUser as $userId => $tasks) {
        $user = $tasks->first()->user;

        if ($user && $user->email) {
            Mail::to($user->email)->send(new DeadlineReminderMail($user, $tasks));
            $sentCount++;
            sleep(3);
        }
    }

    $this->info("Berhasil mengirim email pengingat ke {$sentCount} pengguna.");
})->purpose('Send automated email reminders for tasks approaching deadline');

Schedule::command('send:deadline-reminders')->dailyAt('08:00');
