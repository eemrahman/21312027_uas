<?php

namespace App\Http\Controllers;
use App\Models\Uas;
use Illuminate\Http\Request;

class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uas = Uas::all();
        return view('21312027.index',compact('uas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('21312027.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uas = new Uas;

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $uas->npm = $request->npm;
        $uas->nama = $request->nama;
        $uas->alamat = $request->alamat;

        $simpan = $uas->save();

        
        if($simpan){
            Alert::success('success', 'data bergasil ditambah');
            redirect('/21312027');
        }else{
            Alert::error('Failed', 'Gagal menyimpan data');
        }
        
        return redirect('/21312027');
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
        $uas = Uas::where('id',$id)->first();

        return view('21312027.edit', compact('uas'));
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
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $uas = Uas::find($id);
        $uas->npm = $request->npm;
        $uas->nama = $request->nama;
        $uas->alamat = $request->alamat;

        $ubah = $uas->save();

        if($ubah){
            Alert::success('success', 'data bergasil di ubah');
            redirect('/21312027');
        }else{
            Alert::error('Failed', 'Gagal menyimpan data');
        }
        
        return redirect('/uas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uas = Uas::find($id);
        $hapus= $uas ->delete();


        Alert::success('success', 'data bergasil di hapus');

        return redirect('/21312027');
    }
}
