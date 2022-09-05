@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('sukses'))
                <div class="alert alert-success">{{ session('sukses') }}</div>
                @elseif (session('gagal'))
                <div class="alert alert-warning">{{ session('gagal') }}</div>
                @elseif (session('error'))
                <div class="alert alert-warning">{{ session('error') }}</div>
                @endif
                <div class="card-header">{{ __('Checkin Tiket') }}</div>
                <div class="card-body">
                    <form action="/checkindetail" method="GET">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Masukkan Nomor Tiket</label>
                            <input type="text" class="form-control" name="no_tiket">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection