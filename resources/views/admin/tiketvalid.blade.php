@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Tiket') }}</div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title">Nomor Ticket : {{ Session::get('tikets')->no_tiket }}</h3>
                        <h5>Nama&nbsp;:&nbsp;{{ Session::get('tikets')->nama }}</h5>
                        <h5>Email&nbsp;&nbsp;:&nbsp;{{ Session::get('tikets')->email }}</h5>
                        <p></p>
                        <footer class="blockquote-footer"><cite title="Source Title">Jaga baik baik tiket ini, hilang ditanggung pembeli</cite></footer>
                    </blockquote>
                </div>
                <div class="card-footer p-3 mb-2 bg-success text-white" style="text-align: center; color:red; font-size:20px">
                    TIKET VALID
                </div>
                </section>
            </div>
        </div>
    </div>
</div>
</div>
@endsection