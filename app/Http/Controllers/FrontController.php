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

        // dd($name);
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
            return view('front.book-now',compact('payments','name','phone','email','adult','child','checkin','checkout','room','room_name','qty','message'));
        }else {
            return redirect()->route('front.booking');
            
        }
        
    }

    public function bookSuccessful(Request $request)
    {
        // dd($request);

        $room = $request->input('room');
        $rooms = Room::find($room);
        $type_id = $rooms->type_id;
        $type = Type::find($type_id);

        $booking_no = time();

        $cash = $request->input('cash');
        $transfer = $request->input('transfer');

        $payment_type = null;

        if(is_null($cash) && !is_null($transfer)){
            $payment_type = $transfer;
        }else{
            $payment_type = $cash;
        }

        if ($request->hasFile('payment_slip')) {
            $file_name = time().'.'.$request->payment_slip->extension();
            $upload = $request->payment_slip->move(public_path('images/payment-slips/'), $file_name);
            $payment_slip = "/images/payment-slips/".$file_name;
        } else {
            $payment_slip = null;
        }

        $payment_method = $request->payment_method ?? null;

        $books = Book::create([
            'booking_no' => $booking_no,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adult' => $request->adult,
            'child' => $request->child,
            'check_in' => $request->checkin,
            'check_out' => $request->checkout,
            'qty' => $request->qty,
            'total' => $request->qty * $rooms->price,
            'payment_type' => $payment_type,
            'payment_slip' => $payment_slip,
            'room_id' => $request->room,
            'payment_id' => $payment_method,
            'message' => $request->message,
            'status' => 'Pending',
        ]);
        $books->save();

        return view('front.book-successful',compact('books','rooms','type'));
    }

    public function printPdf()
    {

    }

}
