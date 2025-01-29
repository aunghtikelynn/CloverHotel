<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;
use App\Models\Payment;
use App\Models\Book;
use Carbon\Carbon;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\BookNowRequest;

use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('id','DESC')->limit(3)->get();
        $room_names = Room::all();
        return view('front.index',compact('rooms','room_names'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function service()
    {
        return view('front.service');
    }

    public function room()
    {
        $rooms = Room::orderBy('id','DESC')->paginate(6);
        return view('front.room',compact('rooms'));
    }

    public function roomDetail($id)
    {
        $room = Room::find($id);
        return view('front.room-detail',compact('room'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function team()
    {
        return view('front.team');
    }

    public function testimonial()
    {
        return view('front.testimonial');
    }

    public function booking(Request $request)
    {
        $room_names = Room::all();
        // dd($request);
        //var_dump($request);
        $checkin = $request->query('checkin') ?? null;
        $checkout = $request->query('checkout') ?? null;
        $adult = $request->query('adult') ?? null;
        $child = $request->query('child') ?? 0;
        return view('front.booking',compact('room_names','checkin','checkout','adult','child'));
    }

    public function bookNow(BookNowRequest $request)
    {
        $payments = Payment::all();
        // dd($request);
        // $dataArray = json_decode($request);
        // var_dump($request);
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $qty = $request->input('qty');
        $adult = $request->input('adult');
        $child = $request->input('child');
        $checkin = Carbon::parse($request->input('checkin'));
        $checkout = Carbon::parse($request->input('checkout'));
        $room = $request->input('room');
        $message = $request->input('message');

        $room_name = Room::find($room);

        $existingBooking = Book::where('room_id',$room)
            ->where(function($query) use($checkin, $checkout){
                $query->whereBetween('check_in',[$checkin, $checkout])
                    ->orWhereBetween('check_out',[$checkin, $checkout])
                    ->orWhere(function ($query) use ($checkin, $checkout){
                        $query->where('check_in', '<', $checkin)
                            ->where('check_out', '>', $checkout);
                    });
            })
            ->count();

        if($existingBooking < 2){
            return view('front.book-now',compact('payments','room_name','qty'));
            // return response()->json([
            //     'redirect_url' => '/book-now'
            // ], 200);
        }else{
            // return response()->json([
            //     'alert' => 'Out of Booking, Please choose another room'
            // ], 400);
            alert('Out of Booking, Please choose another room');
        }
        
    }
}
