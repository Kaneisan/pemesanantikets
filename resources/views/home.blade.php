@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-header">{{ __('Data Pesanan') }}</div>
                <div class="card-body">
                    <td>
                        <!-- <form action="/cektiket" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Masukkan Nomor Tiket</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="no_tiket">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form> -->
                        <table class="table table-bordered cell-border" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Tiket</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Tiket</th>
                                    <th style="text-align: center;">Aksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tikets as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->no_tiket}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->email}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td>{{$p->artis}}</td>
                                    <td><a href="{{ url('tikets/'.$p->id.'/edit')}}" type="button" class="btn bg-warning">Edit</button></td>
                                    <td>
                                        <form action="{{ url('tikets/'.$p->id)}}" method="POST"> @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-danger">Delete</a>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom-js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
@endsection