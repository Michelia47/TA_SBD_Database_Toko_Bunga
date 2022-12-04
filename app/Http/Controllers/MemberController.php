<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function create() {
        return view('member.add');
    }
    public function store(Request $request) {
        $request->validate([
            'ID_MEMBER' => 'required',
            'NAMA_MEMBER' => 'required',
            'NO_TELEPON' => 'required',
            'ALAMAT_MEMBER' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO member(ID_MEMBER, NAMA_MEMBER, NO_TELEPON, ALAMAT_MEMBER) 
            VALUES (:ID_MEMBER, :NAMA_MEMBER, :NO_TELEPON, :ALAMAT_MEMBER)',[
            'ID_MEMBER' => $request->ID_MEMBER,
            'NAMA_MEMBER' => $request->NAMA_MEMBER,
            'NO_TELEPON' => $request->NO_TELEPON,
            'ALAMAT_MEMBER' => $request->ALAMAT_MEMBER,]
        );
        return redirect()->route('member.index')->with('success', 'Data Member berhasil disimpan');
    }
    public function index() {
        $datas = DB::select('select * from member');
        return view('member.index')->with('datas', $datas);
    }
    public function edit($id) {
        $data = DB::table('member')->where('ID_MEMBER', $id)->first();
        return view('member.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_MEMBER' => 'required',
        'NAMA_MEMBER' => 'required',
        'NO_TELEPON' => 'required',
        'ALAMAT_MEMBER' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE member SET ID_MEMBER = :ID_MEMBER, NAMA_MEMBER = :NAMA_MEMBER, NO_TELEPON = :NO_TELEPON, ALAMAT_MEMBER = :ALAMAT_MEMBER WHERE ID_MEMBER = :id',[
        'id' => $id,
        'ID_MEMBER' => $request->ID_MEMBER,
        'NAMA_MEMBER' => $request->NAMA_MEMBER,
        'NO_TELEPON' => $request->NO_TELEPON,
        'ALAMAT_MEMBER' => $request->ALAMAT_MEMBER,]);
    return redirect()->route('member.index')->with('success', 'Data Member berhasil diubah');
}
public function delete($id) {
// Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM member WHERE ID_MEMBER = :ID_MEMBER', ['ID_MEMBER' => $id]);
    return redirect()->route('member.index')->with('success', 'Data Admin berhasil dihapus');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('member')->where('ID_MEMBER', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from member');
    }
    return view('member.index')->with('datas', $datas); 
}
}