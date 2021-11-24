<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class BookingController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->filled('rental_id'));
    // dd(isEmpty($request->input('rental_id')));

        $validated = Validator::make($request->all(),[
            'start' => 'required',
            'end' => 'required',
            'adult' => 'required|Numeric',
            'children' => 'Numeric',
            'address' => 'required|string|max:250',
            'payment_method' => 'required|string|max:250',
            'room_id' => 'required|array'
        ]);

        if($validated->fails()){
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        $request->request->add(['user_id' => Auth()->id()]);
        $request->request->add(['user_id' => Auth()->id()]);
        
        $booking = Booking::create($request->all());
        
        $rooms = $request->input('room_id');
        $finalRooms = [];

        foreach ($rooms as $room) {
            $finalRooms[] = [
            "room_id" => $room,
            "start" => $request->input('start'), 
            "end" => $request->input('end')];   
        }

        // dd($finalRooms);
        $rentals = $request->input('rental_id');
        $finalRental = [];
        
        if ($request->filled('rental_id')) {
            foreach ($rentals as $rental) {
                $finalRental[] = [
                "rental_id" => $rental,
                "start" => $request->input('start'), 
                "end" => $request->input('end')];   
            }

            $booking->rentals()->sync(
                $finalRental
            );
        }

        $booking->rooms()->sync(
            $finalRooms
        );

        return response()->json([
            'status' => 1,
            'msg' => "Your booking is successfully created."
        ]);

    }

    public function show(Booking $Booking)
    {
        //
    }

    public function edit(Booking $Booking)
    {
        //
    }

    public function update(Request $request, Booking $Booking)
    {
        //
    }

    public function destroy(Booking $Booking)
    {
        //
    }

    // Scheduller
    public function getAllBooking()
    {
        $bookings = DB::select('SELECT *, CONCAT(`bookings`.`id`, " ", users.firstname, " ", users.lastname) AS "title" FROM `bookings` 
        INNER JOIN `users` ON `bookings`.`user_id` = `users`.`id`');

        foreach($bookings as $booking){
            switch ($booking->booking_status) {
                case 'Pending':
                    $booking->color = '#2f8dfa';
                    break;
                case 'Booked':
                    $booking->color = '#1fd0bf';
                    break;
                case 'Canceled':
                    $booking->color = '#eb648b';
                    break;
                case 'Declined':
                    $booking->color = '#f8c753';
                    break;
                case 'On-going':
                    $booking->color = '#eb7e30';
                    break;
                case 'Finished':
                    $booking->color = '#a93790';
                    break;
                default:
                    $booking->color = 'red';
                    break;
            }
        }
        
       return $bookings;

        return response()->json([
            'status'=> 1,
            'transactions' => $bookings
        ]);

        
    }

    public function showAllTransaction()
    {
        $booking = DB::table('booking')
        ->join('users', 'users.id', '=', 'booking.user_id')
        ->join('rooms', 'rooms.id', '=', 'booking.room_id')
        ->select('users.firstname', 'users.lastname', 'booking.id', 'booking.title', 'booking.payment_status', 'transactions.start', 'transactions.end')
        ->get();

        return view('components.transactionComponents.transactionTable', compact('booking'));
    }

    public function getAvailableRooms(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');

        $rooms = DB::select("SELECT *, (rooms.room_count - t2.occupiedRoom) as availableRoom
        FROM `rooms` 
        LEFT JOIN (	SELECT rooms.id AS occupiedRoomsID, count(*) AS occupiedRoom
                FROM `rooms`
                LEFT JOIN `booking_room`
                    ON rooms.id = booking_room.room_id
                    WHERE (booking_room.start BETWEEN '".$checkIn."' AND '".$checkOut."') 
                    OR (booking_room.end BETWEEN '".$checkIn."' AND '".$checkOut."')
                GROUP BY rooms.room_type) AS t2
        ON rooms.id = t2.occupiedRoomsID");

        return view('components.bookingComponents.roomList', compact('rooms'));
    }

    public function getAvailableRentals(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        
        $rentals = DB::select("SELECT *, (rentals.rental_count - t2.occupiedRental) as availableRental
        FROM `rentals` 
        LEFT JOIN (	SELECT rentals.id AS occupiedRentalsID, count(*) AS occupiedRental
                FROM `rentals`
                LEFT JOIN `booking_rental`
                    ON rentals.id = booking_rental.rental_id
                    WHERE (booking_rental.start BETWEEN '".$checkIn."' AND '".$checkOut."') 
                    OR (booking_rental.end BETWEEN '".$checkIn."' AND '".$checkOut."')
                GROUP BY rentals.rental_type) AS t2
        ON rentals.id = t2.occupiedRentalsID");

        return view('components.bookingComponents.rentalList', compact('rentals'));
    }

    public function getBookingTable(){

        $bookings = Booking::with(['rooms', 'rentals'])->get();
        // pamakita yung itsura
        // http://127.0.0.1:8000/admin/getBookingTable
        return view('components.BookingComponents.bookingTable',compact('bookings'));
        
    }

    public function getUserBookingTable(){

        $bookings = Booking::with(['rooms', 'rentals'])
        ->join('users', 'users.id', '=', 'bookings.user_id')
        ->where('users.id', '=', Auth::user()->id)
        ->get();
        
        // pamakita yung itsura
        // http://127.0.0.1:8000/admin/getBookingTable
        
        // dd($bookings);
        return view('components.BookingComponents.userbookingstable',compact('bookings'));
    }

    public function getUserBooking(){
        // $bookings = Booking::with(['rooms', 'rentals'])->get();
        // $userid = Auth::user()->id;
        // $bookings = $bookings->select('SELECT * FROM bookings WHERE id =',$userid);
        // $bookings->where('id', '=' , Auth::user()->id);
        // dd($bookings);
        return view('userbookings');
    }

    public function declineBooking(Request $request){
        $query = DB::table('bookings')
        ->where('id', $request->id)
        ->update(['booking_status' => 'Declined']);

        return response()->json([
            'status' => 1,
            'msg' => 'Booking has been declined'
        ]);        
    }

    public function acceptBooking(Request $request){
        $query = DB::table('bookings')
        ->where('id', $request->id)
        ->update(['booking_status' => 'Booked']);

        return response()->json([
            'status' => 1,
            'msg' => 'Booking has been booked'
        ]);        
    }
    public function ongoingBooking(Request $request){
        $query = DB::table('bookings')
        ->where('id', $request->id)
        ->update(['booking_status' => 'On-going']);

        return response()->json([
            'status' => 1,
            'msg' => 'The Booked is now on-going'
        ]);        
    }
    public function finishBooking(Request $request){
        $query = DB::table('bookings')
        ->where('id', $request->id)
        ->update(['booking_status' => 'Finished']);

        return response()->json([
            'status' => 1,
            'msg' => 'Booking has been finished'
        ]);        
    }

    public function displaySchedule(Request $request){
        //dd($request);
        //return view('components.schedulerComponents.viewSchedule',compact('booking'));
        
        return response()->json([
            'status' => 1,
            'msg' => $request->all()
        ]);
    }
}

    
