<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// For sql query
use Illuminate\Support\Facades\DB;

use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->delete();

        $rooms = [
            [
                'name' => 'RoomName',
                'description' => 'RoomDescription',
                'price' => '0.00',
                'picture' => 'RoomPicture',
            ],
            [
                'name' => 'Kubo Fan Room',
                'description' => 'Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great airflow enables it to trully allow the sea air breaths throughout the room. 
                With its bunk beds we made sure that theres enough room for you and up to three other persons.', //Capacity: 2-4 persons
                'price' => '2500.00',
                'picture' => 'RoomPicture',
            ],
            [
                'name' => 'Superior Room',
                'description' => 'Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.', //Capacity: 3-6 persons
                'price' => '5000.00',
                'picture' => 'RoomPicture',
            ],
            [
                'name' => 'Villa',
                'description' => 'Experience Luxury with our near the shore Villa. With its rooftop overlooking the sea, enjoy the sunset with a drink then headback down to the airconditioned room with its 2 bunk beds, this could 
                easily accomodate up to 6 persons and still have plenty of floorspace.', //Capacity: 4-6 persons
                'price' => '7000.00',
                'picture' => 'RoomPicture',
            ],
            [
                'name' => 'Couple Beach Hut',
                'description' => 'Have a romantic retreat with your significant other. Have an intimate and cozy stay with this beach hut built for couples to enjoy and relax.', //Capacity: 2
                'price' => '3300.00',
                'picture' => 'RoomPicture',
            ],
            [
                'name' => 'Regular Beach Hut',
                'description' => 'Encapsulating aestethic, the Beach Hut is a fitting choice for a small family or a group of friends to experience style. Accomodating up to 4 persons the Beach Hut is sure to deliver.', //Capacity: 2-4 persons
                'price' => '4300.00',
                'picture' => 'RoomPicture',
            ],
            [
                'name' => 'Barkada Beach Hut',
                'description' => 'We give the best for you and your best buds with our Barkada Beach Hut. Enjoy the fun and exciting activities that liwliwa could give with your mates then settle down and relax as the night grows ever deeper. 
                Able to accomodate up to 8 people we made sure that theres no one getting left behind.', //Capacity: 8 persons
                'price' => '8000.00',
                'picture' => 'RoomPicture',
            ],
        ];

        Room::insert($rooms);
    }
}
