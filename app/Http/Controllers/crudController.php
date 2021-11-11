<?php

namespace App\Http\Controllers;
use App\bahanbaku;
use Illuminate\Http\Request;

class crudController extends Controller
{
    public function index()
    {
        $bahan =  bahanbaku::All()->sortBy("part_number");
        return view('bahancrud', 
        [
            'title' => 'bahan_baku',
            "active" =>'bahanbaku',
            'bahans'=> $bahan
        ]);
    }
    public function tambah()
    {
        return view('tambahData');
    }
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'part_number' => 'required',
            'name' => 'required',
            'um' => 'required'
        ]);
       bahanbaku::create($validatedData);
       //$request->session()->flash('success','Registration Success');
       return redirect('/bahancrud')->with('success','Data Berhasil ditambah');
    }
    public function editData($id)
    {
        $editdata =  bahanbaku::All()->firstWhere('id', $id);
        return view('editData', 
        [
            'title' => "Data edit : $editdata->part_number",
            "active" =>'editdata',
            'bahans'=> $editdata
        ]);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'part_number' => 'required',
            'name' => 'required',
            'um' => 'required'
        ]);
       bahanbaku::where('id',$request->id)->update([
		'part_number' => $request->part_number,
		'name' => $request->name,
		'um' => $request->um
	]);
       //$request->session()->flash('success','Registration Success');
       return redirect('/bahancrud')->with('success','Data Berhasil diupdate');
    }
    public function destroy($id)
    {
        $bahan= bahanbaku::destroy($id);
        return redirect('/bahancrud')->with('delete','Data Berhasil didelete');
    }
    public function cari(request $request)
    {
        $bahan =  bahanbaku::where('part_number','LIKE','%'.$request->part_number)->get();
        return view('bahancrud', 
        [
            'title' => 'bahan_baku',
            "kunci" =>$request->part_number,
            'bahans'=> $bahan
        ]);
    }
}
