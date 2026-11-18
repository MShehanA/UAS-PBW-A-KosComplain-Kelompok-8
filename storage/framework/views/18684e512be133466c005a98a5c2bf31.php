<?php $__env->startSection('title','Daftar'); ?>
<?php $__env->startSection('content'); ?>
<div class="auth-card"><div class="auth-brand"><span class="brand-icon"><i class="bi bi-house-heart-fill"></i></span><h3>Kos<span class="brand-accent">Complain</span></h3><p>Buat akun penghuni kos kamu.</p></div>
<h4>Registrasi penghuni</h4><p class="muted mb-4">Isi data berikut untuk membuat akun.</p>
<form method="POST" action="<?php echo e(route('register.store')); ?>"><?php echo csrf_field(); ?>
<div class="mb-3"><label class="form-label">Nama lengkap</label><input class="form-control" name="name" value="<?php echo e(old('name')); ?>" required></div>
<div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>" required></div>
<div class="mb-3"><label class="form-label">Nomor telepon</label><input class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" required></div>
<div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" required minlength="8"></div>
<div class="mb-4"><label class="form-label">Konfirmasi password</label><input class="form-control" type="password" name="password_confirmation" required></div>
<button class="btn btn-primary w-100 py-2">Buat akun</button></form>
<p class="text-center mt-4 mb-0 muted">Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk</a></p></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\KosComplain_FIXED\KosComplain\resources\views/auth/register.blade.php ENDPATH**/ ?>