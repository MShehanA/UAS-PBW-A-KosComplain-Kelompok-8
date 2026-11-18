@extends('layouts.app')
@section('title','Buat Keluhan') @section('page-title','Buat Keluhan')
@section('content')
<div class="section-card form-card"><div class="section-heading"><div><h5>Formulir Pengaduan</h5><p>Ceritakan kendala yang kamu alami di lingkungan kos.</p></div></div>
<form method="POST" action="{{ route('resident.complaints.store') }}" enctype="multipart/form-data">@csrf
<div class="row g-3"><div class="col-md-8"><label class="form-label">Judul keluhan *</label><input class="form-control" name="title" value="{{ old('title') }}" placeholder="Contoh: Air kamar mandi tidak mengalir" required></div>
<div class="col-md-4"><label class="form-label">Nomor kamar *</label><input class="form-control" name="room_number" value="{{ old('room_number') }}" placeholder="Contoh: A-03" required></div>
<div class="col-md-6"><label class="form-label">Kategori *</label><select class="form-select" name="category" required><option value="">Pilih kategori</option>@foreach(['Fasilitas Kamar','Air dan Sanitasi','Listrik','Internet/Wi-Fi','Kebersihan','Keamanan','Lainnya'] as $cat)<option @selected(old('category')===$cat)>{{ $cat }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Foto bukti (opsional)</label><input class="form-control" type="file" name="image" accept="image/png,image/jpeg,image/webp"><small class="muted">JPG, PNG, WEBP · Maksimal 2 MB</small></div>
<div class="col-12"><label class="form-label">Deskripsi masalah *</label><textarea class="form-control" rows="5" name="description" placeholder="Jelaskan masalah, kapan terjadi, dan informasi lain yang diperlukan..." required>{{ old('description') }}</textarea></div></div>
<div class="d-flex gap-2 justify-content-end mt-4"><a href="{{ route('resident.dashboard') }}" class="btn btn-light">Batal</a><button class="btn btn-primary"><i class="bi bi-send me-1"></i> Kirim Keluhan</button></div></form></div>
@endsection
