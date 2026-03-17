<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reservation;

class ImportXmlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa dados dos arquivos XML para o banco de dados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Importando hotéis...');

        $hotelsXml = simplexml_load_file(storage_path('xml/hotels.xml'));

        foreach ($hotelsXml->hotel as $hotel) {
            Hotel::create([
                'external_id' => (string) $hotel['id'],
                'name' => (string) $hotel->name,
            ]);
        }

        $this->info('Hoteis importados com sucesso!');

        $this->info('importando quartos...');

        $roomsXml = simplexml_load_file(storage_path('xml/rooms.xml'));

        foreach ($roomsXml->room as $room) {   

            Room::updateOrCreate(
                ['external_id' => (string) $room['id']], 
                [
                'hotel_id' => (string) $room['hotel_id'],
                'name' => (string) $room,
                'inventory_count' => (int) $room['inventory_count'],
                ]
            );
        }

        $this->info('Quartos importados com sucesso!');

        $this->info('importando reservas...');

        $reservationsXml = simplexml_load_file(storage_path('xml/reservations.xml'));
        foreach ($reservationsXml->reservation as $reservation) {
            
            $rooms = $reservation->rooms->room ?? [];

            foreach ($rooms as $room) {

                Reservation::create([
                    'external_id' => (string) $reservation->id,
                    'hotel_id' => (string) $reservation->hotel_id,
                    'customer_first_name' => (string) $reservation->customer_first_name,
                    'customer_last_name' => (string) $reservation->customer_last_name,
                    'arrival_date' => (string) $reservation->arrival_date,
                    'departure_date' => (string) $reservation->departure_date,
                    'total_price' => (float) $reservation->room->totalprice
                ]);
            }
        }

        $this->info('Reservas importadas com sucesso!');
    }
}
