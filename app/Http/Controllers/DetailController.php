<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DetailController extends Controller
{
    public function index() {
        $datas = DB::table('pemesanan')
        ->leftJoin('bunga', 'pemesanan.ID_BUNGA', '=', 'bunga.ID_BUNGA')
        ->leftJoin('member', 'pemesanan.ID_MEMBER', '=', 'member.ID_MEMBER')
        ->leftJoin('admin', 'pemesanan.ID_ADMIN', '=', 'admin.ID_ADMIN')
        ->select('pemesanan.ID_PESAN', 'pemesanan.TANGGAL_PESAN', 'member.NAMA_MEMBER', 'member.ALAMAT_MEMBER', 'member.NO_TELEPON', 'bunga.NAMA_BUNGA', 'admin.NAMA_ADMIN')
        ->get();
        return view('detail.index')->with('datas', $datas);
    }
}