<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Illuminate\Console\Command;

class SendDailyReservationNotifications extends Command
{
    protected $signature = 'reservations:notify';
    protected $description = 'Send daily reservations list to janitors via WhatsApp';

    public function handle(): int
    {
        $today = now()->toDateString();
        $reservations = Reservation::where('date', $today)->where('is_canceled', false)->get();

        // TODO: integrate WhatsApp notification
        $this->info('Would send '.count($reservations).' reservations for '.$today);

        return Command::SUCCESS;
    }
}
