@extends('layout.master')

	@section('judul')
    Tambah Mahasiswa
    @endsection

    
@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(function(){
        $('#example1').DataTable();
    });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

	@section('content')
    <form method="post" action="/21312027/{{ $uas->npm }}">
        @csrf

<div class="form-group">
            <label>NPM</label>
            <input type="string" name="npm" value="{{ $uas -> npm}}" class="form-control">
</div>
@error('npm')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Nama</label>
            <input type="string" name="nama" value="{{ $uas -> nama}}" class="form-control">
</div>
@error('nama')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat">{{$uas -> alamat}}</textarea>
</div>
@error('alamat')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection