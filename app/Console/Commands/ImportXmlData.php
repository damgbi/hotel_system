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
            Hotel::updateOrCreate([
                'external_id' => (string) $hotel['id'],
            ], [
                'name' => (string) $hotel->name,
            ]);
        }

        $this->info('Hoteis importados com sucesso!');

        $this->info('importando quartos...');

        $roomsXml = simplexml_load_file(storage_path('xml/rooms.xml'));

        foreach ($roomsXml->room as $room) {  
            $hotel = Hotel::where('external_id', (string) $room['hotel_id'])->first();

            if (!$hotel) {
                $this->warn('Hotel não encontrado para quarto XML ID: ' . (string) $room['id']);
                continue;
            } 

            Room::updateOrCreate(
                ['external_id' => (string) $room['id']], 
                [
                'hotel_id' => $hotel->id,
                'name' => (string) $room,
                'inventory_count' => (int) $room['inventory_count'],
                ]
            );
        }

        $this->info('Quartos importados com sucesso!');

        $this->info('importando reservas...');

        $reservationsXml = simplexml_load_file(storage_path('xml/reservations.xml'));
        foreach ($reservationsXml->reservation as $reservation) {

            $roomXml = $reservation->room ?? null;

            if (!$roomXml) {
                 continue;
            }

            $hotel = Hotel::where('external_id', (string) $reservation->hotel_id)->first();

            if (!$hotel) {
                $this->warn('Hotel não encontrado para reserva XML ID: ' . (string) $reservation->id);
                continue;
            }

            $room = Room::where('external_id', (string) $roomXml->id)
            ->where('hotel_id', $hotel->id)
            ->first();

            if (!$room) {
                $this->warn('Quarto não encontrado para reserva XML ID: ' . (string) $reservation->id);
                continue;
            }


            Reservation::updateOrCreate(
                [
                    'external_id' => (string) $reservation->id,
                ],
                [
                    'hotel_id' => $hotel->id,
                    'room_id' => $room->id,
                    'customer_first_name' => (string) $reservation->customer->first_name,
                    'customer_last_name' => (string) $reservation->customer->last_name,
                    'arrival_date' => (string) $roomXml->arrival_date,
                    'departure_date' => (string) $roomXml->departure_date,
                    'total_price' => (float) ($roomXml->totalprice ?? 0),
                ]
            );
        }


        $this->info('Reservas importadas com sucesso!');
    }
}
