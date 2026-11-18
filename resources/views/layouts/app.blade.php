<!doctype html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','KosComplain') · KosComplain</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet"></head>
<body>
@if(auth()->check())
<div class="app-shell">
<aside class="sidebar">
 <a class="brand" href="{{ route(auth()->user()->role==='admin'?'admin.dashboard':'resident.dashboard') }}"><span class="brand-icon"><i class="bi bi-house-heart-fill"></i></span><span>Kos<span class="brand-accent">Complain</span><small>Sistem Pengaduan Kos</small></span></a>
 <div class="side-label">MENU UTAMA</div>
 @if(auth()->user()->role==='admin')
 <a class="side-link {{ request()->routeIs('admin.dashboard')?'active':'' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i> Dashboard</a>
 <a class="side-link {{ request()->routeIs('admin.complaints.*')?'active':'' }}" href="{{ route('admin.complaints.index') }}"><i class="bi bi-clipboard2-check"></i> Kelola Keluhan</a>
 @else
 <a class="side-link {{ request()->routeIs('resident.dashboard')?'active':'' }}" href="{{ route('resident.dashboard') }}"><i class="bi bi-grid"></i> Dashboard</a>
 <a class="side-link {{ request()->routeIs('resident.complaints.create')?'active':'' }}" href="{{ route('resident.complaints.create') }}"><i class="bi bi-plus-circle"></i> Buat Keluhan</a>
 <a class="side-link {{ request()->routeIs('resident.complaints.index','resident.complaints.show')?'active':'' }}" href="{{ route('resident.complaints.index') }}"><i class="bi bi-clock-history"></i> Riwayat Keluhan</a>
 @endif
 <div class="side-label mt-4">AKUN</div>
 <a class="side-link {{ request()->routeIs('*.profile.*')?'active':'' }}" href="{{ route(auth()->user()->role==='admin'?'admin.profile.edit':'resident.profile.edit') }}"><i class="bi bi-person"></i> Profil Saya</a>
 <form method="POST" action="{{ route('logout') }}" class="mt-auto">@csrf<button class="side-link side-logout w-100 border-0"><i class="bi bi-box-arrow-left"></i> Keluar</button></form>
 <div class="sidebar-foot">© {{ date('Y') }} KosComplain</div>
</aside>
<main class="main-area"><header class="topbar"><div><span class="eyebrow">SISTEM INFORMASI PENGADUAN</span><h6 class="mb-0">@yield('page-title','Dashboard')</h6></div><div class="user-chip"><span class="avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span><span><b>{{ auth()->user()->name }}</b><small>{{ ucfirst(auth()->user()->role) }}</small></span></div></header>
<div class="page-content">
@else
<main class="auth-page">
@endif
@if(session('success'))<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if($errors->any())<div class="alert alert-danger"><strong>Periksa kembali data kamu.</strong><ul class="mb-0 mt-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@yield('content')
</div>
@if(auth()->check())</main></div>@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><script src="{{ asset('js/app.js') }}"></script>
</body></html>
