<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['petugas'] = Petugas::orderBy('id_petugas','desc')->paginate(5);
    return view('petugas.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('petugas.create');
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
        'nama_petugas' => 'required',
        'username' => 'required',
        'password' => 'required'
    ]);

    $petugas = new Petugas;
    $petugas->nama_petugas = $request->nama_petugas;
    $petugas->username = $request->username;
    $petugas->password = Hash::make($request->password);
    $petugas->id_level = "1";
    $petugas->save();
    return redirect()->route('petugas')
    ->with('success','petugas has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\petugas  $petugas
    * @return \Illuminate\Http\Response
    */
    public function show(Petugas $petugas)
    {
    return view('petugas.show',compact('petugas'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\petugas  $petugas
    * @return \Illuminate\Http\Response
    */
    public function edit(Petugas $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\petugas  $petugas
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required'
        ]);
        $petugas = Petugas::find($id);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
    if($request->password){
        $petugas->password = Hash::make($request->password);
    }
    $petugas->username = "1";
    $petugas->save();
    return redirect()->route('petugas.index')
    ->with('success','petugas Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\petugas  $petugas
    * @return \Illuminate\Http\Response
    */
    public function destroy(Petugas $petugas, $id)
    {
    $petugas->where('id_petugas', $id)->delete();
    return redirect()->route('petugas.index')
    ->with('success','petugas has been deleted successfully');
    }
}
