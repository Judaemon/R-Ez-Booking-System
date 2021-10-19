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
                'name' => 'Kubo Fan Room 1',
                'description' => 'Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great airflow enables it to trully allow the sea air breaths throughout the room. 
                With its bunk beds we made sure that theres enough room for you and up to three other persons.', //Capacity: 2-4 persons
                'price' => '2500.00',
                'recommended_capacity' => '2',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Kubo Fan Room 2',
                'description' => 'Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great airflow enables it to trully allow the sea air breaths throughout the room. 
                With its bunk beds we made sure that theres enough room for you and up to three other persons.', //Capacity: 2-4 persons
                'price' => '2500.00',
                'recommended_capacity' => '2',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //Superior Room
            [
                'name' => 'Superior Room 1',
                'description' => 'Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.', //Capacity: 3-6 persons
                'price' => '5000.00',
                'recommended_capacity' => '3',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Superior Room 2',
                'description' => 'Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.', //Capacity: 3-6 persons
                'price' => '5000.00',
                'recommended_capacity' => '3',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Superior Room 3',
                'description' => 'Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.', //Capacity: 3-6 persons
                'price' => '5000.00',
                'recommended_capacity' => '3',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Superior Room 4',
                'description' => 'Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.', //Capacity: 3-6 persons
                'price' => '5000.00',
                'recommended_capacity' => '3',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //Villa
            [
                'name' => 'Villa 1',
                'description' => 'Experience Luxury with our near the shore Villa. With its rooftop overlooking the sea, enjoy the sunset with a drink then headback down to the airconditioned room with its 2 bunk beds, this could 
                easily accomodate up to 6 persons and still have plenty of floorspace.', //Capacity: 4-6 persons
                'price' => '7000.00',
                'recommended_capacity' => '4',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //Bhut Couple
            [
                'name' => 'Couple Beach Hut 1',
                'description' => 'Have a romantic retreat with your significant other. Have an intimate and cozy stay with this beach hut built for couples to enjoy and relax.', //Capacity: 2
                'price' => '3300.00',
                'recommended_capacity' => '2',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //Bhut Regular
            [
                'name' => 'Regular Beach Hut 1',
                'description' => 'Encapsulating aestethic, the Beach Hut is a fitting choice for a small family or a group of friends to experience style. Accomodating up to 4 persons the Beach Hut is sure to deliver.', //Capacity: 2-4 persons
                'price' => '4300.00',
                'recommended_capacity' => '2',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Regular Beach Hut 2',
                'description' => 'Encapsulating aestethic, the Beach Hut is a fitting choice for a small family or a group of friends to experience style. Accomodating up to 4 persons the Beach Hut is sure to deliver.', //Capacity: 2-4 persons
                'price' => '4300.00',
                'recommended_capacity' => '2',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //Bhut Barkada
            [
                'name' => 'Barkada Beach Hut 1',
                'description' => 'We give the best for you and your best buds with our Barkada Beach Hut. Enjoy the fun and exciting activities that liwliwa could give with your mates then settle down and relax as the night grows ever deeper. 
                Able to accomodate up to 8 people we made sure that theres no one getting left behind.', //Capacity: 8 persons
                'price' => '8000.00',
                'recommended_capacity' => '5',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Barkada Beach Hut 2',
                'description' => 'We give the best for you and your best buds with our Barkada Beach Hut. Enjoy the fun and exciting activities that liwliwa could give with your mates then settle down and relax as the night grows ever deeper. 
                Able to accomodate up to 8 people we made sure that theres no one getting left behind.', //Capacity: 8 persons
                'price' => '8000.00',
                'recommended_capacity' => '5',
                'image_path' => 'Room image_path',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];

        Room::insert($rooms);
    }
}
