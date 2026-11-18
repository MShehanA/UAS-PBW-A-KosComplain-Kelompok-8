@extends('layouts.app')
@section('title','Daftar')
@section('content')
<div class="auth-card"><div class="auth-brand"><span class="brand-icon"><i class="bi bi-house-heart-fill"></i></span><h3>Kos<span class="brand-accent">Complain</span></h3><p>Buat akun penghuni kos kamu.</p></div>
<h4>Registrasi penghuni</h4><p class="muted mb-4">Isi data berikut untuk membuat akun.</p>
<form method="POST" action="{{ route('register.store') }}">@csrf
<div class="mb-3"><label class="form-label">Nama lengkap</label><input class="form-control" name="name" value="{{ old('name') }}" required></div>
<div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required></div>
<div class="mb-3"><label class="form-label">Nomor telepon</label><input class="form-control" name="phone" value="{{ old('phone') }}" required></div>
<div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" required minlength="8"></div>
<div class="mb-4"><label class="form-label">Konfirmasi password</label><input class="form-control" type="password" name="password_confirmation" required></div>
<button class="btn btn-primary w-100 py-2">Buat akun</button></form>
<p class="text-center mt-4 mb-0 muted">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p></div>
@endsection
