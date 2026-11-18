@extends('layouts.app')
@section('title','Profil Saya') @section('page-title','Profil Saya')
@section('content')
<div class="section-card form-card"><h5>Informasi Akun</h5><p class="muted mb-4">Perbarui informasi profil dan password akun kamu.</p>
<form method="POST" action="{{ route(auth()->user()->role==='admin'?'admin.profile.update':'resident.profile.update') }}">@csrf @method('PUT')
<div class="mb-3"><label class="form-label">Nama lengkap</label><input class="form-control" name="name" value="{{ old('name',auth()->user()->name) }}" required></div>
<div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="{{ old('email',auth()->user()->email) }}" required></div>
<div class="mb-4"><label class="form-label">Nomor telepon</label><input class="form-control" name="phone" value="{{ old('phone',auth()->user()->phone) }}" required></div>
<hr><h6>Ganti Password</h6><p class="muted small">Kosongkan jika tidak ingin mengubah password.</p>
<div class="row"><div class="col-md-6 mb-3"><label class="form-label">Password baru</label><input class="form-control" type="password" name="password"></div><div class="col-md-6 mb-3"><label class="form-label">Konfirmasi password baru</label><input class="form-control" type="password" name="password_confirmation"></div></div>
<button class="btn btn-primary">Simpan Perubahan</button></form></div>
@endsection
