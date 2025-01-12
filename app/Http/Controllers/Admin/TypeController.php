<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\TypeUpdateRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('id','DESC')->paginate(15);
        return view('admin.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        // dd($request);
        $types = Type::create($request->all());
        $types->save();
        return redirect()->route('backend.types.index');
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
        $type = Type::find($id);
        return view('admin.types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeUpdateRequest $request, string $id)
    {
        $type = Type::find($id);
        $type->update($request->all());
        $type->save();
        return redirect()->route('backend.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);
        $type->delete();
        return redirect()->route('backend.types.index');
    }
}
