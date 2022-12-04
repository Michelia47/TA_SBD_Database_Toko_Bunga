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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Pemesanan</h5>

		<form method="post" action="{{ route('pemesanan.update', $data->ID_PESAN) }}">
			@csrf
            <div class="mb-3">
                <label for="ID_PESAN" class="form-label">ID Pesan</label>
                <input type="text" class="form-control" id="ID_PESAN" name="ID_PESAN" value="{{ $data->ID_PESAN }}">
            </div>
			<div class="mb-3">
                <label for="TANGGAL_PESAN" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" id="TANGGAL_PESAN" name="TANGGAL_PESAN" value="{{ $data->TANGGAL_PESAN }}">
            </div>
            <div class="mb-3">
                <label for="ID_MEMBER" class="form-label">ID Member</label>
                <input type="text" class="form-control" id="ID_MEMBER" name="ID_MEMBER" value="{{ $data->ID_MEMBER }}">
            </div>
            <div class="mb-3">
                <label for="ID_BUNGA" class="form-label">ID Bunga</label>
                <input type="text" class="form-control" id="ID_BUNGA" name="ID_BUNGA" value="{{ $data->ID_BUNGA }}">
            </div>
            <div class="mb-3">
                <label for="ID_ADMIN" class="form-label">ID Admin</label>
                <input type="text" class="form-control" id="ID_ADMIN" name="ID_ADMIN" value="{{ $data->ID_ADMIN }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop