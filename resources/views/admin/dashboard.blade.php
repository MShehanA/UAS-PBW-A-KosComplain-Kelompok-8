@extends('layouts.app')
@section('title','Dashboard Admin') @section('page-title','Dashboard Admin')
@section('content')
<div class="welcome-panel admin-welcome"><div><span class="eyebrow light">PANEL PENGELOLA</span><h2>Selamat datang, {{ auth()->user()->name }}</h2><p>Kelola laporan penghuni dan pantau penyelesaian keluhan kos.</p></div><a class="btn btn-light" href="{{ route('admin.complaints.index') }}">Kelola Laporan <i class="bi bi-arrow-right"></i></a></div>
<div class="row g-3 my-3">
@foreach([['Total Keluhan',$total,'bi-clipboard-data'],['Menunggu',$waiting,'bi-inbox'],['Diproses',$processing,'bi-hourglass-split'],['Selesai',$done,'bi-check-circle']] as $stat)
<div class="col-6 col-xl-3"><div class="stat-card"><span>{{ $stat[0] }}</span><strong>{{ $stat[1] }}</strong><i class="bi {{ $stat[2] }}"></i></div></div>@endforeach
</div>
<div class="section-card"><div class="section-heading"><div><h5>Laporan Terbaru</h5><p>Keluhan yang baru masuk ke sistem.</p></div><a href="{{ route('admin.complaints.index') }}">Lihat semua <i class="bi bi-arrow-right"></i></a></div>
@include('partials.complaint-table',['complaints'=>$latest])</div>
@endsection
