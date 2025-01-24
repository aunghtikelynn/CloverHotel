<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;

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
        $date1 = $request->query('date1') ?? null;
        $date2 = $request->query('date2') ?? null;
        $person = $request->query('person') ?? null;
        $room = $request->query('room') ?? null;
        return view('front.booking',compact('room_names','date1','date2','person','room'));
    }
}
