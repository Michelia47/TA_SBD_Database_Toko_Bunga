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

        <h5 class="card-title fw-bolder mb-3">Tambah Data Bunga</h5>

		<form method="post" action="{{ route('bunga.store') }}">
			@csrf
            <div class="mb-3">
                <label for="ID_BUNGA" class="form-label">ID Bunga</label>
                <input type="text" class="form-control" id="ID_BUNGA" name="ID_BUNGA">
            </div>
			<div class="mb-3">
                <label for="NAMA_BUNGA" class="form-label">Nama Bunga</label>
                <input type="text" class="form-control" id="NAMA_BUNGA" name="NAMA_BUNGA">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
	</div>
</div>

@stop