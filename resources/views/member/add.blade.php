@extends('bunga.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Data Member</h5>

		<form method="post" action="{{ route('member.store') }}">
			@csrf
            <div class="mb-3">
                <label for="ID_MEMBER" class="form-label">ID Member</label>
                <input type="text" class="form-control" id="ID_MEMBER" name="ID_MEMBER">
            </div>
			<div class="mb-3">
                <label for="NAMA_MEMBER" class="form-label">Nama Member</label>
                <input type="text" class="form-control" id="NAMA_MEMBER" name="NAMA_MEMBER">
            </div>
            <div class="mb-3">
                <label for="NO_TELEPON" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="NO_TELEPON" name="NO_TELEPON">
            </div>
            <div class="mb-3">
                <label for="ALAMAT_MEMBER" class="form-label">Alamat Member</label>
                <input type="text" class="form-control" id="ALAMAT_MEMBER" name="ALAMAT_MEMBER">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
	</div>
</div>

@stop