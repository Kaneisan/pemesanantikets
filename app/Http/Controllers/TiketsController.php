<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use Illuminate\Support\Facades\Session;

class TiketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('home');
    }

    public function index()
    {
        return view('pesantiket');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tikets = new Tiket;
        Session::put([

        ]);
        $tikets->no_tiket = random_int(10000, 99999);
        $tikets->nama = $request->input('nama');
        $tikets->email = $request->input('email');
        $tikets->alamat = $request->input('alamat');
        $tikets->artis = $request->input('artis');
        Session::put('no_tiket', $tikets->no_tiket);
        Session::put('nama', $tikets->nama);
        Session::put('email', $tikets->email);
        $tikets->save();
        return redirect('/tikettemp');
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
        $tikets = Tiket::find($id);
        return view('admin.edit', compact('tikets'));
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
        $tikets = Tiket::find($id);
        $tikets->nama = $request->input('nama');
        $tikets->email = $request->input('email');
        $tikets->alamat = $request->input('alamat');
        $tikets->artis = $request->input('artis');
        $tikets->update();
        return redirect('/home')->with('status', 'Tiket Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tikets = Tiket::find($id);
        $tikets->delete();
        return redirect('/home')->with('status', 'Tiket Berhasil Dihapus');
    }

    public function checkin(Request $request)
    {
        $tikets = Tiket::where('no_tiket', $request->no_tiket);
        return view('admin.checkin', compact('tikets'));
    }

    public function checkindetail(Request $request)
    {
        $tikets = Tiket::where('no_tiket', $request->no_tiket)->first();
        Session::put('tikets', Tiket::where('no_tiket', $request->no_tiket)->first());
        // dd($tikets);
        // exit();
        if ($tikets->status_tiket == "belum_terpakai") {
            Session::put('tikets', Tiket::where('no_tiket', $request->no_tiket)->first());
            $tikets->status_tiket = "Terpakai";
            $tikets->update();
            Session::flash('sukses', 'Tiket anda valid, silahkan masuk');
            return redirect('/tiketvalid');
        } elseif ($tikets->status_tiket == "Terpakai") {
            Session::flash('gagal', 'Tiket anda sudah terpakai, Gagal checkin');
            return redirect('/checkin');
        } else {
            Session::flash('error', 'Tiket anda tidak terdaftar');
            return redirect('/checkin');
        }
    }

    public function tiketvalid()
    {
        return view('admin.tiketvalid');
    }

    public function laporanuser(){
        $tikets = Tiket::all();
        return  view('admin.laporanuser', compact('tikets'));
    }
    
    public function tikettemp(){
        // $tikets = Tiket::all();
        return view('admin.tikettemp');
        
    }
}
