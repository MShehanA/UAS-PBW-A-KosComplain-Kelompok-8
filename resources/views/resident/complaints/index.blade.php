@extends('layouts.app')
@section('title','Riwayat Keluhan') @section('page-title','Riwayat Keluhan')
@section('content')
<div class="section-card"><div class="section-heading"><div><h5>Riwayat Keluhan</h5><p>Seluruh laporan yang pernah kamu kirim.</p></div><a class="btn btn-primary btn-sm" href="{{ route('resident.complaints.create') }}"><i class="bi bi-plus-lg"></i> Buat Keluhan</a></div>
<form class="filter-row mb-3"><input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari judul keluhan..."><select class="form-select" name="status"><option value="">Semua status</option>@foreach(['Menunggu','Diproses','Selesai','Ditolak'] as $s)<option @selected(request('status')===$s)>{{ $s }}</option>@endforeach</select><button class="btn btn-outline-primary">Filter</button></form>
@include('partials.complaint-table',['complaints'=>$complaints])<div class="mt-3">{{ $complaints->links() }}</div></div>
@endsection
