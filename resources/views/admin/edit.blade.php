@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }}</div>
                <div class="card-body">
                    <form action="{{ url('tikets/'.$tikets->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="{{$tikets->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="{{$tikets->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" value="{{$tikets->alamat}}">
                        </div>
                        <div class="form-group">
                            <class="form-group">
                                <label for="roles">Pilih Tiket Konser</label>
                                <div class="col">
                                    <select class="form-control" name="artis">
                                        <option {{ ($tikets->artis) == 'afgan' ? 'selected' : ''}} value="afgan">Afgan</option>
                                        <option {{ ($tikets->artis) == 'rizky' ? 'selected' : ''}} value="rizky">Rizky Febian</option>
                                        <option {{ ($tikets->artis) == 'dewa19' ? 'selected' : ''}} value="dewa19">Dewa 19</option>
                                        <option {{ ($tikets->artis) == 'pamungkas' ? 'selected' : ''}} value="pamungkas">Pamungkas</option>
                                        <option {{ ($tikets->artis) == 'raisa' ? 'selected' : ''}} value="raisa">Raisa</option>
                                    </select>
                                </div>
                                </class>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection