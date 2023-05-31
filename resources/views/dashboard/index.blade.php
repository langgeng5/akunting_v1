@extends('main_layout')

@section('subtitle', 'DASHBOARD')

@section('page_header', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif

            <div class="card">
                <div class="card-body text-center py-1">
                    <h1>
                        <b>
                            SISTEM INFORMASI AKUNTANSI BERBASIS WEB PADA CV YULIANA KONVEKSI
                        </b>
                    </h1>
                </div>
            </div>
        </div>
    </div>

@endsection
