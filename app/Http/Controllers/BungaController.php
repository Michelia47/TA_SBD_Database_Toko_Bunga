<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Bunga;

class BungaController extends Controller
{
    public function create() {
        return view('bunga.add');
    }
    public function store(Request $request) {
        $request->validate([
            'ID_BUNGA' => 'required',
            'NAMA_BUNGA' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO bunga(ID_BUNGA, NAMA_BUNGA) 
        VALUES (:ID_BUNGA, :NAMA_BUNGA)',[
            'ID_BUNGA' => $request->ID_BUNGA,
            'NAMA_BUNGA' => $request->NAMA_BUNGA,]
        );
        return redirect()->route('bunga.index')->with('success', 'Data Bunga berhasil disimpan');
    }
    public function index() {
        $datas = DB::select('select * from bunga WHERE deleted_at is null ');

        return view('bunga.index')
            ->with('datas', $datas);
    }
    public function edit($id) {
        $data = DB::table('bunga')->where('ID_BUNGA', $id)->first();
        return view('bunga.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_BUNGA' => 'required',
        'NAMA_BUNGA' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE bunga SET ID_BUNGA = :ID_BUNGA, NAMA_BUNGA = :NAMA_BUNGA WHERE ID_BUNGA = :id',[
        'id' => $id,
        'ID_BUNGA' => $request->ID_BUNGA,
        'NAMA_BUNGA' => $request->NAMA_BUNGA,]);
    return redirect()->route('bunga.index')->with('success', 'Data Bunga berhasil diubah');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('bunga')->where('ID_BUNGA', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from bunga');
    }
    return view('bunga.index')->with('datas', $datas); 
}
public function softDeleted($id){
    DB::update('UPDATE bunga SET deleted_at = now() WHERE ID_BUNGA = :ID_BUNGA',
    [
        'ID_BUNGA' => $id,
    ]);
    return redirect('bunga')->with('success', 'Data bunga berhasil dibuang');
}
public function trash() {
    $datas = DB::select('select * from bunga WHERE deleted_at is not null ');

    return view('bunga.trash')
        ->with('datas', $datas);
}

public function restore($id){
    DB::update('UPDATE bunga SET deleted_at = null WHERE ID_BUNGA = :ID_BUNGA',
    [
        'ID_BUNGA' => $id,
    ]);
    return redirect('bunga/trash')->with('success', 'Data bunga berhasil di restore');
}


public function delete($id) {
    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM bunga WHERE ID_BUNGA = :ID_BUNGA', 
    [
        'ID_BUNGA' => $id
    ]);

    return redirect('bunga/trash')->with('success', 'Data bunga berhasil dihapus');
}
}