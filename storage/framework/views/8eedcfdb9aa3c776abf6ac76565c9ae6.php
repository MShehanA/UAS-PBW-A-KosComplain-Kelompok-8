<!doctype html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $__env->yieldContent('title','KosComplain'); ?> · KosComplain</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"></head>
<body>
<?php if(auth()->check()): ?>
<div class="app-shell">
<aside class="sidebar">
 <a class="brand" href="<?php echo e(route(auth()->user()->role==='admin'?'admin.dashboard':'resident.dashboard')); ?>"><span class="brand-icon"><i class="bi bi-house-heart-fill"></i></span><span>Kos<span class="brand-accent">Complain</span><small>Sistem Pengaduan Kos</small></span></a>
 <div class="side-label">MENU UTAMA</div>
 <?php if(auth()->user()->role==='admin'): ?>
 <a class="side-link <?php echo e(request()->routeIs('admin.dashboard')?'active':''); ?>" href="<?php echo e(route('admin.dashboard')); ?>"><i class="bi bi-grid"></i> Dashboard</a>
 <a class="side-link <?php echo e(request()->routeIs('admin.complaints.*')?'active':''); ?>" href="<?php echo e(route('admin.complaints.index')); ?>"><i class="bi bi-clipboard2-check"></i> Kelola Keluhan</a>
 <?php else: ?>
 <a class="side-link <?php echo e(request()->routeIs('resident.dashboard')?'active':''); ?>" href="<?php echo e(route('resident.dashboard')); ?>"><i class="bi bi-grid"></i> Dashboard</a>
 <a class="side-link <?php echo e(request()->routeIs('resident.complaints.create')?'active':''); ?>" href="<?php echo e(route('resident.complaints.create')); ?>"><i class="bi bi-plus-circle"></i> Buat Keluhan</a>
 <a class="side-link <?php echo e(request()->routeIs('resident.complaints.index','resident.complaints.show')?'active':''); ?>" href="<?php echo e(route('resident.complaints.index')); ?>"><i class="bi bi-clock-history"></i> Riwayat Keluhan</a>
 <?php endif; ?>
 <div class="side-label mt-4">AKUN</div>
 <a class="side-link <?php echo e(request()->routeIs('*.profile.*')?'active':''); ?>" href="<?php echo e(route(auth()->user()->role==='admin'?'admin.profile.edit':'resident.profile.edit')); ?>"><i class="bi bi-person"></i> Profil Saya</a>
 <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-auto"><?php echo csrf_field(); ?><button class="side-link side-logout w-100 border-0"><i class="bi bi-box-arrow-left"></i> Keluar</button></form>
 <div class="sidebar-foot">© <?php echo e(date('Y')); ?> KosComplain</div>
</aside>
<main class="main-area"><header class="topbar"><div><span class="eyebrow">SISTEM INFORMASI PENGADUAN</span><h6 class="mb-0"><?php echo $__env->yieldContent('page-title','Dashboard'); ?></h6></div><div class="user-chip"><span class="avatar"><?php echo e(strtoupper(substr(auth()->user()->name,0,1))); ?></span><span><b><?php echo e(auth()->user()->name); ?></b><small><?php echo e(ucfirst(auth()->user()->role)); ?></small></span></div></header>
<div class="page-content">
<?php else: ?>
<main class="auth-page">
<?php endif; ?>
<?php if(session('success')): ?><div class="alert alert-success alert-dismissible fade show"><?php echo e(session('success')); ?><button class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<?php if($errors->any()): ?><div class="alert alert-danger"><strong>Periksa kembali data kamu.</strong><ul class="mb-0 mt-1"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>
</div>
<?php if(auth()->check()): ?></main></div><?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body></html>
<?php /**PATH C:\xampp\htdocs\KosComplain_FIXED\KosComplain\resources\views/layouts/app.blade.php ENDPATH**/ ?>