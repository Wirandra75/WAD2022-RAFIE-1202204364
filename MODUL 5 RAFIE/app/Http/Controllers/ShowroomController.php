<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showroom = Showroom::where('user_id', auth()->user()->id)->get();
        $jmlMobil = Showroom::where('user_id', auth()->user()->id)->count();
        $setelNavbar = Cookie::get('warna_navbar') ? Cookie::get('warna_navbar') : '#3563e9'; 
        if($jmlMobil === 0) {
            return redirect('/showroom/create');
        }
        return view('showroom', compact('showroom', 'jmlMobil', 'setelNavbar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setelNavbar = Cookie::get('warna_navbar') ? Cookie::get('warna_navbar') : '#3563e9';
        return view('add', compact('setelNavbar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('image')->getClientOriginalName() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('gambar/', $gambar);
        Showroom::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'owner' => $request->owner,
            'brand' => $request->brand,
            'purchase_date' => $request->purchase_date,
            'description' => $request->description,
            'image' => $gambar,
            'status' => $request->status
        ]);
        session()->flash('toast-biru', 'Data berhasil ditambahkan');
        return redirect('/showroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function show(Showroom $showroom)
    {
        $setelNavbar = Cookie::get('warna_navbar') ? Cookie::get('warna_navbar') : '#3563e9'; 
        $showroom->purchase_date = date('Y-m-d');
        return view('detail', compact('setelNavbar', 'showroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Showroom $showroom)
    {
        $setelNavbar= Cookie::get('warna_navbar') ? Cookie::get('warna_navbar') : '#3563e9';
        $showroom->purchase_date = date('Y-m-d');
        return view('edit', compact('showroom', 'setelNavbar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showroom $showroom)
    {
        if($request->file('image')) {
            Storage::delete('gambar/' . $showroom->image);
            $gambar = $request->file('image')->getClientOriginalName() . '-' . auth()->user()->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('gambar/', $gambar);
            Showroom::where('id', $showroom->id)->update([
                'name' => $request->name,
                'owner' => $request->owner,
                'brand' => $request->brand,
                'purchase_date' => $request->purchase_date,
                'description' => $request->description,
                'image' => $gambar
            ]);
        } else {
            Showroom::where('id', $showroom->id)->update([
                'name' => $request->name,
                'owner' => $request->owner,
                'brand' => $request->brand,
                'purchase_date' => $request->purchase_date,
                'description' => $request->description,
            ]);
        }
        session()->flash('toast-kuning', 'Data berhasil diupdate');
        return redirect('/showroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showroom $showroom)
    {
        Showroom::destroy($showroom->id);
        Storage::delete('gambar/' . $showroom->image);
        session()->flash('toast-merah', 'Data berhasil dihapus');
        return redirect('/showroom');
    }
}
