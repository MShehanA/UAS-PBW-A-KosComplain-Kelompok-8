@extends('layouts.app')
@section('title','Masuk')
@section('content')
<div class="auth-card"><div class="auth-brand"><span class="brand-icon"><i class="bi bi-house-heart-fill"></i></span><h3>Kos<span class="brand-accent">Complain</span></h3><p>Keluhan tercatat, penanganan lebih terarah.</p></div>
<h4>Selamat datang kembali</h4><p class="muted mb-4">Masuk untuk melanjutkan ke akun kamu.</p>
<form method="POST" action="{{ route('login.store') }}">@csrf
<div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus></div>
<div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" placeholder="Masukkan password" required></div>
<div class="form-check mb-4"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember">Ingat saya</label></div>
<button class="btn btn-primary w-100 py-2">Masuk <i class="bi bi-arrow-right ms-1"></i></button></form>
<p class="text-center mt-4 mb-0 muted">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p></div>
@endsection
