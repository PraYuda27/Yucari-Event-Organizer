@extends('user.layouts.app')

@section('title', 'Contact')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
<section id="contact">
    <div class="container">
        <h2>Masukan Anda Sangat Kami Harapkan</h2>
        <div class="contact-info">
            <div>
                <h3>Kantor</h3>
                <p>Jl. Maleer Indah II, Maleer, Batununggal, Kota Bandung, Jawa Barat 40274</p>
            </div>
            <div>
                <h3>Telepon</h3>
                <p>Telepon Gratis: (+81) 22 888 1111</p>
                <p>Telepon: (+81) 22 888 2222</p>
            </div>
            <div>
                <h3>Email</h3>
                <p>E-Mail: <a href="mailto:nikah@support.com">nikah@support.com</a></p>
            </div>
        </div>
        <div id="map">
            <!-- Embed your map here -->
        </div>
        <div class="contact-form">
            <h3>Umpan Balik</h3>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/contact/send" method="POST">
                @csrf
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="subjek" placeholder="Subjek" required>
                <textarea name="pesan" placeholder="Pesan" required></textarea>
                <button type="submit">Tinggalkan Pesan</button>
            </form>
        </div>
    </div>
</section>
@endsection
