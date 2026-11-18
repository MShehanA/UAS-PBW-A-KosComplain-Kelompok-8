@extends('layouts.app')
@section('title','Dashboard Penghuni') @section('page-title','Dashboard Penghuni')
@section('content')
<div class="welcome-panel"><div><span class="eyebrow light">RUANG PENGHUNI</span><h2>Halo, {{ auth()->user()->name }}! 👋</h2><p>Sampaikan kendala kos dengan mudah. Kami bantu pantau penanganannya.</p></div><a class="btn btn-light" href="{{ route('resident.complaints.create') }}"><i class="bi bi-plus-lg"></i> Buat Keluhan</a></div>
<div class="row g-3 my-3">
<div class="col-md-4"><div class="stat-card"><span>Total Keluhan</span><strong>{{ $total }}</strong><i class="bi bi-clipboard-data"></i></div></div>
<div class="col-md-4"><div class="stat-card"><span>Sedang Diproses</span><strong>{{ $processing }}</strong><i class="bi bi-hourglass-split"></i></div></div>
<div class="col-md-4"><div class="stat-card"><span>Selesai</span><strong>{{ $done }}</strong><i class="bi bi-check-circle"></i></div></div>
</div>
<div class="section-card"><div class="section-heading"><div><h5>Keluhan Terbaru</h5><p>Pantau perkembangan laporan kamu.</p></div><a href="{{ route('resident.complaints.index') }}">Lihat semua <i class="bi bi-arrow-right"></i></a></div>
@include('partials.complaint-table',['complaints'=>$latest])</div>
@endsection
