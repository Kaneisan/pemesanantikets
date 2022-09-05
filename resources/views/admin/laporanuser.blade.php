@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Laporan User') }}</div>
                <div class="card-body">
                    <td>
                        <table class="table table-bordered cell-border" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tikets as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>
                                        @if($p->status_tiket=='belum_terpakai')
                                        <span class="text-danger"><b>Belum Checkin</b></span>
                                        @else
                                        <span class="text-success"><b>Sudah Checkin</b></span>
                                        @endif
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