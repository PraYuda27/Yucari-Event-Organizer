@extends('user.layouts.app')

@section('title', 'Formulir Kontak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
<div class="form-container">
    <div class="form-card animate-fadeIn">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="/form/send" method="POST">
            @csrf
            <h2>Mulai Rencanakan</h2>
            <div class="inputBox">
                <input type="text" name="name" required="required">
                <span>Nama</span>
            </div>
            <div class="inputBox">
                <input type="email" name="email" required="required">
                <span>Email</span>
            </div>
            <div class="inputBox">
                <input type="text" name="phone" required="required">
                <span>Nomor Telepon</span>
            </div>
            <div class="inputBox">
                <input type="text" name="address" required="required">
                <span>Alamat</span>
            </div>
            <input type="submit" value="Kirim">
        </form>
    </div>
</div>
@endsection
