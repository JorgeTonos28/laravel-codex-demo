<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['name' => '5to A', 'capacity' => 30],
            ['name' => '4to ECI', 'capacity' => 25],
            ['name' => 'Auditorio', 'capacity' => 200],
            ['name' => '4to ONA', 'capacity' => 20],
        ];

        foreach ($rooms as $room) {
            Room::updateOrCreate(['name' => $room['name']], $room);
        }
    }
}
