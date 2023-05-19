<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
            'photo' => 'required|image|max:2048',
            'keterangan' => 'required',
        ]);

        $imagePath = $request->file('photo')->store('photos', 'public');
        
        House::create([
            'type' => $request->type,
            'price' => $request->price,
            'status' => $request->status,
            'photo' => $imagePath,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('houses.index')->with('success', 'Rumah berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $house = House::find($id);
        return view('houses.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'type' => 'required',
        'price' => 'required|numeric',
        'status' => 'required',
        'photo' => 'nullable|image|max:2048',
        'keterangan' => 'required',
    ]);

    $house = House::find($id);

    if ($request->hasFile('photo')) {
        $imagePath = $request->file('photo')->store('photos', 'public');
        $house->photo = $imagePath;
    }

    $house->type = $request->type;
    $house->price = $request->price;
    $house->status = $request->status;
    $house->keterangan = $request->keterangan;
    $house->save();

    return redirect()->route('houses.index')->with('success', 'Rumah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $house = House::find($id);
    
        if (!$house) {
            return redirect()->route('houses.index')->with('error', 'Rumah tidak ditemukan');
        }
    
        // Menghapus foto rumah dari penyimpanan
        Storage::disk('public')->delete($house->photo);
    
        $house->delete();
    
        return redirect()->route('houses.index')->with('success', 'Rumah berhasil dihapus');
    }
}
