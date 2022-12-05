@extends('bunga.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h4 class="mt-5 p-2 bg-white text-dark rounded-2">Kotak Sampah Data Member</h4>


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table text-center table-hover mt-2 mb-4 bg-light p-2 rounded-2" >
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Member</th>
        <th>No Telepon</th>
        <th>Alamat Member</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_MEMBER }}</td>
                <td>{{ $data->NAMA_MEMBER }}</td>
                <td>{{ $data->NO_TELEPON }}</td>
                <td>{{ $data->ALAMAT_MEMBER }}</td>
                
                <td>
                <a href="{{ route('member.restore', $data->ID_MEMBER) }}" type="button" class="btn btn-warning rounded-3"><i class="fa"></i>Restore</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_MEMBER }}"> 
                        <i class="fa"></i>Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->ID_MEMBER }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('member.delete', $data->ID_MEMBER) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ID Member {{ $data->ID_MEMBER }} selamanya ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer ">
    <a href="{{ route('member.index') }}" type="button" class="btn btn-primary p-2 rounded-3">Kembali</a>
</div>
@stop