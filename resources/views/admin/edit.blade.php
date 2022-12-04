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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Admin</h5>

		<form method="post" action="{{ route('admin.update', $data->ID_ADMIN) }}">
			@csrf
            <div class="mb-3">
                <label for="ID_ADMIN" class="form-label">ID Admin</label>
                <input type="text" class="form-control" id="ID_ADMIN" name="ID_ADMIN" value="{{ $data->ID_ADMIN }}">
            </div>
			<div class="mb-3">
                <label for="NAMA_ADMIN" class="form-label">Nama Admin</label>
                <input type="text" class="form-control" id="NAMA_ADMIN" name="NAMA_ADMIN" value="{{ $data->NAMA_ADMIN }}">
            </div>
            <div class="mb-3">
                <label for="NO_TELEPON" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="NO_TELEPON" name="NO_TELEPON" value="{{ $data->NO_TELEPON }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop