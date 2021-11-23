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
                'room_type' => 'Kubo Fan Room ',
                'room_count' => '2',
                'description' => 'Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great
                airflow from the sea breeze throughout the room, thus giving a relaxing vibe. With its bunk beds we made sure that theres
                enough room for you and up to three other persons. And there is no need to worry about privacy, with the simple yet sturdy
                design of our kubo, we implemented a door inside and actual glass pane windows to have a safe and secluded place inside the kubo room.', //Capacity: 2-4 persons
                'price' => '2500.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '2',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['rooms/kubo_fan_room/kubo1.jpg', 'rooms/kubo_fan_room/kubo2.jpg', 'rooms/kubo_fan_room/kubo3.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // //Superior Room
            [
                'room_type' => 'Superior Room',
                'room_count' => '4',
                'description' => 'A simple yet elegant design. The wide space of our superior room is able to accommodate up to 6 persons. This room also
                has a TV and a small dining area with a mini fridge, a small bed and a bunk bed and a bathroom already built in, making the
                superior room an amazing choice for a family or a group of friends. With its sound proof walls, you can rest all night long in
                peace and quiet space. Or just stay up all night binge watching your favorite show.', //Capacity: 3-6 persons
                'price' => '5000.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '3',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['rooms/superior_room/superior1.jpg', 'rooms/superior_room/superior2.jpg', 'rooms/superior_room/superior3.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // //Villa
            [
                'room_type' => 'Villa',
                'room_count' => '1',
                'description' => 'Indulge in our luxurious villa that is just near the shore of the resort. With its rooftop overlooking the sea, you can enjoy the
                sunset with a delicious meal and down them with a drink then headback down to the airconditioned room with its 2 bunk beds,
                and with a bathroom already provided, the villa could easily accommodate up to 6 persons and still have plenty of floorspace.', //Capacity: 4-6 persons
                'price' => '7000.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '4',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['rooms/villa_room/villa1.jpg', 'rooms/villa_room/villa2.jpg', 'rooms/villa_room/villa3.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // //Bhut Couple
            [
                'room_type' => 'Couple Beach Hut',
                'room_count' => '1',
                'description' => 'If you are planning for a great place to stay with your partner, this modernized take of a beach hut is the one to get. Enjoy a
                long day at the beach and have a romantic retreat with your significant other in our couples beach hut. After having fun during
                the day, end it with an intimate and cozy night stay with this beach hut built for couples to enjoy and relax.', //Capacity: 2
                'price' => '3300.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '2',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['rooms/couple_bhut/couple1.jpg', 'rooms/couple_bhut/couple2.jpg', 'rooms/couple_bhut/couple3.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // //Bhut Regular
            [
                'room_type' => 'Regular Beach Hut',
                'room_count' => '2',
                'description' => 'Encapsulating aestethic, though it is somewhat a small beach hut, it is a fitting choice for a small family or a group of friends
                to experience this style of a modern kubo. It has a built in TV and a mini fridge and an aircon as well. Accommodating up to
                4 persons the Beach Hut is sure to deliver.', //Capacity: 2-4 persons
                'price' => '4300.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '2',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['rooms/regular_bhut/regular1.jpg', 'rooms/regular_bhut/regular2.jpg', 'rooms/regular_bhut/regular3.jpg', 'rooms/regular_bhut/regular4.jpg', 'rooms/regular_bhut/regular5.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // //Bhut Barkada
            [
                'room_type' => 'Barkada Beach Hut',
                'room_count' => '2',
                'description' => 'Having a last minute outings with the gang? We give you the best place to hang out in our resort. Our barkada beach hut
                is the perfect choice for you and your best buds. Enjoy the fun and exciting activities that liwliwa could give with your mates then
                settle down and relax as the night grows ever deeper. With the basic necessities already provided,this hut is able to accomodate
                up to 8 people we made sure that theres no one getting left behind.', //Capacity: 8 persons
                'price' => '8000.00',
                'amenities' => json_encode(['lol toothbrush', 'towel']),
                'recommended_capacity' => '5',
                'maximum_capacity' => '5',
                'image_paths' => json_encode(['rooms/barkada_bhut/barkada1.jpg', 'rooms/barkada_bhut/barkada2.jpg', 'rooms/barkada_bhut/barkada3.jpg', 'rooms/barkada_bhut/barkada4.jpg', 'rooms/barkada_bhut/barkada5.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Room::insert($rooms);
    }
}
