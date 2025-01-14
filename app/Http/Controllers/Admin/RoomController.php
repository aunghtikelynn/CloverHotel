<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\RoomUpdateRequest;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('id','DESC')->paginate(15);
        return view('admin.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.rooms.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        // dd($request); 
        // var_dump($request);
        $rooms = Room::create($request->all());
        $file_name = Str::random(5).'.'.$request->image->extension();
        $upload = $request->image->move(public_path('images/rooms/'),$file_name);
        if($upload){
            $rooms->image = "/images/rooms/".$file_name;
        }

        $file_name1 = Str::random(5).'.'.$request->image_1->extension();
        $upload = $request->image_1->move(public_path('images/rooms/'),$file_name1);
        if($upload){
            $rooms->image_1 = "/images/rooms/".$file_name1;
        }

        $file_name2 = Str::random(5).'.'.$request->image_2->extension();
        $upload = $request->image_2->move(public_path('images/rooms/'),$file_name2);
        if($upload){
            $rooms->image_2 = "/images/rooms/".$file_name2;
        }

        $file_name3 = Str::random(5).'.'.$request->image_3->extension();
        $upload = $request->image_3->move(public_path('images/rooms/'),$file_name3);
        if($upload){
            $rooms->image_3 = "/images/rooms/".$file_name3;
        }

        $file_name4 = Str::random(5).'.'.$request->image_4->extension();
        $upload = $request->image_4->move(public_path('images/rooms/'),$file_name4);
        if($upload){
            $rooms->image_4 = "/images/rooms/".$file_name4;
        }
        $rooms->save();

        return redirect()->route('backend.rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $types = Type::all();
        return view('admin.rooms.edit',compact('room','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomUpdateRequest $request, string $id)
    {
        // dd($request);
        $room = Room::find($id);
        $room->update($request->all());

        if($request->hasFile('image')){
            $file_name = uniqid().'.'.$request->image->extension();
            $upload = $request->image->move(public_path('images/rooms/'),$file_name);
            if($upload){
                $room->image = "/images/rooms/".$file_name;
            }
        }else{
            $room->image = $request->old_image;
        }

        if($request->hasFile('image_1')){
            $file_name_1 = uniqid().'.'.$request->image_1->extension();
            $upload = $request->image_1->move(public_path('images/rooms/'),$file_name_1);
            if($upload){
                $room->image_1 = "/images/rooms/".$file_name_1;
            }
        }else{
            $room->image_1 = $request->old_image_1;
        }

        if($request->hasFile('image_2')){
            $file_name_2 = uniqid().'.'.$request->image_2->extension();
            $upload = $request->image_2->move(public_path('images/rooms/'),$file_name_2);
            if($upload){
                $room->image_2 = "/images/rooms/".$file_name_2;
            }
        }else{
            $room->image_2 = $request->old_image_2;
        }

        if($request->hasFile('image_3')){
            $file_name_3 = uniqid().'.'.$request->image_3->extension();
            $upload = $request->image_3->move(public_path('images/rooms/'),$file_name_3);
            if($upload){
                $room->image_3 = "/images/rooms/".$file_name_3;
            }
        }else{
            $room->image_3 = $request->old_image_3;
        }

        if($request->hasFile('image_4')){
            $file_name_4 = uniqid().'.'.$request->image_3->extension();
            $upload = $request->image_4->move(public_path('images/rooms/'),$file_name_4);
            if($upload){
                $room->image_4 = "/images/rooms/".$file_name_4;
            }
        }else{
            $room->image_4 = $request->old_image_4;
        }

        $room->save();
        return redirect()->route('backend.rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('backend.rooms.index');
    }
}
