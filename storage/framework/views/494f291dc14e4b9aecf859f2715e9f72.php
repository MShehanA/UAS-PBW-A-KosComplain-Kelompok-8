<?php $__env->startSection('title','Dashboard Penghuni'); ?> <?php $__env->startSection('page-title','Dashboard Penghuni'); ?>
<?php $__env->startSection('content'); ?>
<div class="welcome-panel"><div><span class="eyebrow light">RUANG PENGHUNI</span><h2>Halo, <?php echo e(auth()->user()->name); ?>! 👋</h2><p>Sampaikan kendala kos dengan mudah. Kami bantu pantau penanganannya.</p></div><a class="btn btn-light" href="<?php echo e(route('resident.complaints.create')); ?>"><i class="bi bi-plus-lg"></i> Buat Keluhan</a></div>
<div class="row g-3 my-3">
<div class="col-md-4"><div class="stat-card"><span>Total Keluhan</span><strong><?php echo e($total); ?></strong><i class="bi bi-clipboard-data"></i></div></div>
<div class="col-md-4"><div class="stat-card"><span>Sedang Diproses</span><strong><?php echo e($processing); ?></strong><i class="bi bi-hourglass-split"></i></div></div>
<div class="col-md-4"><div class="stat-card"><span>Selesai</span><strong><?php echo e($done); ?></strong><i class="bi bi-check-circle"></i></div></div>
</div>
<div class="section-card"><div class="section-heading"><div><h5>Keluhan Terbaru</h5><p>Pantau perkembangan laporan kamu.</p></div><a href="<?php echo e(route('resident.complaints.index')); ?>">Lihat semua <i class="bi bi-arrow-right"></i></a></div>
<?php echo $__env->make('partials.complaint-table',['complaints'=>$latest], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\KosComplain_FIXED\KosComplain\resources\views/resident/dashboard.blade.php ENDPATH**/ ?>