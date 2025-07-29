

<?php $__env->startSection('content'); ?>
<div class="d-flex align-items-center justify-content-between mb-3">
    <div class="d-flex align-items-center">
        <img src="<?php echo e(asset('images/LOGO_IBIK.png')); ?>" alt="Icon" width="50" height="50" class="me-2">
        <h3 class="mb-0">Daftar Mahasiswa</h3>
    </div>
    <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-primary">Tambah Mahasiswa</a>
</div>


<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($mhs->nama); ?></td>
            <td><?php echo e($mhs->npm); ?></td>
            <td><?php echo e($mhs->fakultas); ?></td>
            <td><?php echo e($mhs->jurusan); ?></td>
            <td>
                <a href="<?php echo e(route('mahasiswa.edit', $mhs->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?php echo e(route('mahasiswa.destroy', $mhs->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Semester 4\Pemrograman Web\ProjectUAS\StudentListApp\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>