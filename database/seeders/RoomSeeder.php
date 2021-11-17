<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// for created_at and updated_at column value
use Carbon\Carbon;

// For sql query
use Illuminate\Support\Facades\DB;

use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->delete();

        $rooms = [
            //Kubo Fan
            [
                'room_type' => 'Kubo Fan Room 1',
                'room_count' => '2',
                'description' => 'Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great airflow enables it to trully allow the sea air breaths throughout the room. 
                With its bunk beds we made sure that theres enough room for you and up to three other persons.', //Capacity: 2-4 persons
                'price' => '2500.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '2',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['kubo_fan_room/kubo1.jpg', 'kubo_fan_room/kubo1.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // //Superior Room
            // [
            //     'room_type' => 'Superior Room 1',
            //     'room_count' => '4',
            //     'description' => 'Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.', //Capacity: 3-6 persons
            //     'price' => '5000.00',
            //     'recommended_capacity' => '3',
            //     'maximum_capacity' => '5',
            //     'image_paths' => ['picture' => 'superior_room/superior1.jpg',
            //                       'picture' => 'superior_room/superior1.jpg'],
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
            // //Villa
            // [
            //     'room_type' => 'Villa 1',
            //     'room_count' => '1',
            //     'description' => 'Experience Luxury with our near the shore Villa. With its rooftop overlooking the sea, enjoy the sunset with a drink then headback down to the airconditioned room with its 2 bunk beds, this could 
            //     easily accomodate up to 6 persons and still have plenty of floorspace.', //Capacity: 4-6 persons
            //     'price' => '7000.00',
            //     'image_paths' => ['amenities' => 'lol toothbrush?', 'amenities' => 'towel'],
            //     'recommended_capacity' => '4',
            //     'maximum_capacity' => '5',
            //     'image_paths' => ['picture' => 'villa_room/villa1.jpg'],
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
            // //Bhut Couple
            // [
            //     'room_type' => 'Couple Beach Hut 1',
            //     'room_count' => '1',
            //     'description' => 'Have a romantic retreat with your significant other. Have an intimate and cozy stay with this beach hut built for couples to enjoy and relax.', //Capacity: 2
            //     'price' => '3300.00',
            //     'image_paths' => ['amenities' => 'lol toothbrush?', 'amenities' => 'towel'],
            //     'recommended_capacity' => '2',
            //     'maximum_capacity' => '5',
            //     'image_paths' => ['picture' => 'couple_bhut/couple1.jpg'],
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
            // //Bhut Regular
            // [
            //     'room_type' => 'Regular Beach Hut 1',
            //     'room_count' => '2',
            //     'description' => 'Encapsulating aestethic, the Beach Hut is a fitting choice for a small family or a group of friends to experience style. Accomodating up to 4 persons the Beach Hut is sure to deliver.', //Capacity: 2-4 persons
            //     'price' => '4300.00',
            //     'image_paths' => ['amenities' => 'lol toothbrush?', 'amenities' => 'towel'],
            //     'recommended_capacity' => '2',
            //     'maximum_capacity' => '5',
            //     'image_paths' => ['picture' => 'regular_bhut/regular1.jpg'],
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
            // //Bhut Barkada
            // [
            //     'room_type' => 'Barkada Beach Hut 1',
            //     'room_count' => '2',
            //     'description' => 'We give the best for you and your best buds with our Barkada Beach Hut. Enjoy the fun and exciting activities that liwliwa could give with your mates then settle down and relax as the night grows ever deeper. 
            //     Able to accomodate up to 8 people we made sure that theres no one getting left behind.', //Capacity: 8 persons
            //     'price' => '8000.00',
            //     'image_paths' => ['amenities' => 'lol toothbrush?', 'amenities' => 'towel'],
            //     'recommended_capacity' => '5',
            //     'maximum_capacity' => '5',
            //     'image_paths' => ['picture' => 'barkada_bhut/barkada1.jpg'],
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
        ];

        Room::insert($rooms);
    }
}
