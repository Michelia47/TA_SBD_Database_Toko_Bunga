<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create() {
        return view('admin.add');
    }
    public function store(Request $request) {
        $request->validate([
            'ID_ADMIN' => 'required',
            'NAMA_ADMIN' => 'required',
            'NO_TELEPON' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO admin(ID_ADMIN, NAMA_ADMIN, NO_TELEPON) 
            VALUES (:ID_ADMIN, :NAMA_ADMIN, :NO_TELEPON)',[
            'ID_ADMIN' => $request->ID_ADMIN,
            'NAMA_ADMIN' => $request->NAMA_ADMIN,
            'NO_TELEPON' => $request->NO_TELEPON,]
        );
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }
    public function index() {
        $datas = DB::select('select * from admin');
        return view('admin.index')->with('datas', $datas);
    }
    public function edit($id) {
        $data = DB::table('admin')->where('ID_ADMIN', $id)->first();
        return view('admin.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_ADMIN' => 'required',
        'NAMA_ADMIN' => 'required',
        'NO_TELEPON' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE admin SET ID_ADMIN = :ID_ADMIN, NAMA_ADMIN = :NAMA_ADMIN, NO_TELEPON = :NO_TELEPON WHERE ID_ADMIN = :id',[
        'id' => $id,
        'ID_ADMIN' => $request->ID_ADMIN,
        'NAMA_ADMIN' => $request->NAMA_ADMIN,
        'NO_TELEPON' => $request->NO_TELEPON,]);
    return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
}
public function delete($id) {
// Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM admin WHERE ID_ADMIN = :ID_ADMIN', ['ID_ADMIN' => $id]);
    return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('admin')->where('ID_ADMIN', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from admin');
    }
    return view('admin.index')->with('datas', $datas); 
}
}