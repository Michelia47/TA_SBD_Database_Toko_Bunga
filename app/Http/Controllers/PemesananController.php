<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PemesananController extends Controller
{
    public function create() {
        return view('pemesanan.add');
    }
    public function store(Request $request) {
        $request->validate([
            'ID_PESAN' => 'required',
            'TANGGAL_PESAN' => 'required',
            'ID_BUNGA' => 'required',
            'ID_MEMBER' => 'required',
            'ID_ADMIN' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pemesanan(ID_PESAN, TANGGAL_PESAN, ID_BUNGA, ID_MEMBER, ID_ADMIN) 
            VALUES (:ID_PESAN, :TANGGAL_PESAN, :ID_BUNGA, :ID_MEMBER, :ID_ADMIN)',[
            'ID_PESAN' => $request->ID_PESAN,
            'TANGGAL_PESAN' => $request->TANGGAL_PESAN,
            'ID_BUNGA' => $request->ID_BUNGA,
            'ID_MEMBER' => $request->ID_MEMBER,
            'ID_ADMIN' => $request->ID_ADMIN,]
        );
        return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan berhasil disimpan');
    }
    public function index() {
        $datas = DB::select('select * from pemesanan');
        return view('pemesanan.index')->with('datas', $datas);
    }
    public function edit($id) {
        $data = DB::table('pemesanan')->where('ID_PESAN', $id)->first();
        return view('pemesanan.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_PESAN' => 'required',
        'TANGGAL_PESAN' => 'required',
        'ID_BUNGA' => 'required',
        'ID_MEMBER' => 'required',
        'ID_ADMIN' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE pemesanan SET ID_PESAN = :ID_PESAN, TANGGAL_PESAN = :TANGGAL_PESAN, ID_BUNGA = :ID_BUNGA, ID_MEMBER = :ID_MEMBER, ID_ADMIN = :ID_ADMIN WHERE ID_PESAN = :id',[
        'id' => $id,
        'ID_PESAN' => $request->ID_PESAN,
        'TANGGAL_PESAN' => $request->TANGGAL_PESAN,
        'ID_BUNGA' => $request->ID_BUNGA,
        'ID_MEMBER' => $request->ID_MEMBER,
        'ID_ADMIN' => $request->ID_ADMIN,]);
    return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan berhasil diubah');
}
public function delete($id) {
// Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM pemesanan WHERE ID_PESAN = :ID_PESAN', ['ID_PESAN' => $id]);
    return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan berhasil dihapus');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('pemesanan')->where('ID_PESAN', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from pemesanan');
    }
    return view('pemesanan.index')->with('datas', $datas); 
}
}