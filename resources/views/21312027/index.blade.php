@extends('layout.master')

	@section('judul')
    Daftar Mahasiswa
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
    <a class="btn btn-secondary mb-3" href="/21312027/create">Data Mahasiswa</a>
    <table class="table" id="example1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">NPM</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
</tr>
</thead>
<tbody>
    @forelse ($uas as $key => $item)
    <tr>
        <td>{{$item->npm}}</td>
        <td>{{$item->nama}}</td>
        <td>{{$item->alamat}}</td>
        <td>
        <form action="/21312027/{{ $item->npm }}" method="POST">
            <a href="/21312027/{{$item->npm}}/edit" class="btn btn-warning btn-sm">Edit</a>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
</form>
</td>
</tr>
@empty
<h2>Data tidak ada</h2>
@endforelse
</tbody>
</table>
@endsection