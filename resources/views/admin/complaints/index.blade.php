@extends('layouts.app')
@section('title','Kelola Keluhan') @section('page-title','Kelola Keluhan')
@section('content')
<div class="section-card"><div class="section-heading"><div><h5>Semua Pengaduan</h5><p>Lihat, cari, dan tindak lanjuti laporan penghuni.</p></div></div>
<form class="filter-row mb-3"><input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari judul atau nama penghuni..."><select class="form-select" name="category"><option value="">Semua kategori</option>@foreach(['Fasilitas Kamar','Air dan Sanitasi','Listrik','Internet/Wi-Fi','Kebersihan','Keamanan','Lainnya'] as $cat)<option @selected(request('category')===$cat)>{{ $cat }}</option>@endforeach</select><select class="form-select" name="status"><option value="">Semua status</option>@foreach(['Menunggu','Diproses','Selesai','Ditolak'] as $s)<option @selected(request('status')===$s)>{{ $s }}</option>@endforeach</select><button class="btn btn-outline-primary">Filter</button></form>
@include('partials.complaint-table',['complaints'=>$complaints])<div class="mt-3">{{ $complaints->links() }}</div></div>
@endsection
