@extends('bunga.layout')

@section('content')

<h4 class="mt-3">Data Detail Pemesanan</h4>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal Pesan</th>
        <th>Nama Member</th>
        <th>Alamat Member</th>
        <th>No Telepon</th>
        <th>Nama Bunga</th>
        <th>Nama Admin</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_PESAN }}</td>
                <td>{{ $data->TANGGAL_PESAN }}</td>
                <td>{{ $data->NAMA_MEMBER }}</td>
                <td>{{ $data->ALAMAT_MEMBER }}</td>
                <td>{{ $data->NO_TELEPON }}</td>
                <td>{{ $data->NAMA_BUNGA }}</td>
                <td>{{ $data->NAMA_ADMIN }}</td>
            </tr>
            @endforeach
    </tbody>
</table>
@stop