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
        return view('front.index');
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

    public function booking()
    {
        return view('front.booking');
    }
}
