

<?php $__env->startSection('title', 'Tambah Penyewa · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .form-container {
        background: white;
        border-radius: 20px;
        padding: 30px 32px;
        border: 1px solid #f1f5f9;
        max-width: 700px;
        margin: 0 auto;
    }
    .form-container h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-container h2 i {
        color: #b45309;
    }
    .form-container .sub {
        color: #64748b;
        font-size: 0.95rem;
        margin-bottom: 24px;
    }

    .form-group-modern {
        margin-bottom: 18px;
    }
    .form-group-modern label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        color: #334155;
        margin-bottom: 4px;
    }
    .form-group-modern label .required {
        color: #ef4444;
    }
    .form-group-modern input,
    .form-group-modern select {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #fafbfc;
    }
    .form-group-modern input:focus,
    .form-group-modern select:focus {
        outline: none;
        border-color: #b45309;
        box-shadow: 0 0 0 3px rgba(180, 83, 9, 0.08);
        background: white;
    }
    .form-group-modern .helper {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-top: 4px;
    }
    .form-group-modern .error-text {
        color: #ef4444;
        font-size: 0.8rem;
        margin-top: 4px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .form-actions-modern {
        display: flex;
        gap: 12px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }
    .btn-save {
        background: #b45309;
        color: white;
        border: none;
        padding: 10px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #92400e;
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(180, 83, 9, 0.25);
    }
    .btn-cancel-modern {
        background: #f1f5f9;
        color: #475569;
        border: none;
        padding: 10px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-cancel-modern:hover {
        background: #e2e8f0;
    }

    .alert-danger {
        background: #fee2e2;
        color: #b91c1c;
        padding: 12px 18px;
        border-radius: 12px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    @media (max-width: 600px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        .form-container {
            padding: 20px;
        }
    }
</style>

<div class="form-container">
    <h2><i class="fas fa-user-plus"></i> Tambah Penyewa</h2>
    <p class="sub">Isi data penyewa baru dengan lengkap</p>

    <!-- TAMPILKAN ERROR -->
    <?php if($errors->any()): ?>
    <div class="alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <ul style="list-style:none; margin:0; padding:0;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.penyewa.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group-modern">
            <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Contoh: Ahmad Fauzi" />
            <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-text"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-row">
            <div class="form-group-modern">
                <label for="ktp">No. KTP <span class="required">*</span></label>
                <input type="text" id="ktp" name="ktp" required value="<?php echo e(old('ktp')); ?>" placeholder="16 digit" />
                <?php $__errorArgs = ['ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-text"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group-modern">
                <label for="no_hp">No. HP <span class="required">*</span></label>
                <input type="text" id="no_hp" name="no_hp" required value="<?php echo e(old('no_hp')); ?>" placeholder="08123456789" />
                <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-text"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group-modern">
                <label for="kontak_darurat">Kontak Darurat</label>
                <input type="text" id="kontak_darurat" name="kontak_darurat" value="<?php echo e(old('kontak_darurat')); ?>" placeholder="08129876543" />
            </div>
            <div class="form-group-modern">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" value="<?php echo e(old('pekerjaan')); ?>" placeholder="Mahasiswa / Karyawan" />
            </div>
        </div>

        <div class="form-group-modern">
            <label for="kamar_id">Kamar <span class="required">*</span></label>
            <select id="kamar_id" name="kamar_id" required>
                <option value="">Pilih Kamar</option>
                <?php $__currentLoopData = $kamars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($kamar->id); ?>" <?php echo e(old('kamar_id') == $kamar->id ? 'selected' : ''); ?>>
                    <?php echo e($kamar->nama); ?> - Rp <?php echo e(number_format($kamar->harga, 0, ',', '.')); ?> (<?php echo e($kamar->status); ?>)
                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['kamar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-text"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="helper">Hanya kamar yang tersedia yang bisa dipilih</div>
        </div>

        <div class="form-row">
            <div class="form-group-modern">
                <label for="tanggal_mulai_sewa">Tanggal Mulai Sewa <span class="required">*</span></label>
                <input type="date" id="tanggal_mulai_sewa" name="tanggal_mulai_sewa" required value="<?php echo e(old('tanggal_mulai_sewa', date('Y-m-d'))); ?>" />
                <?php $__errorArgs = ['tanggal_mulai_sewa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-text"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group-modern">
                <label for="tanggal_berakhir_sewa">Tanggal Berakhir Sewa</label>
                <input type="date" id="tanggal_berakhir_sewa" name="tanggal_berakhir_sewa" value="<?php echo e(old('tanggal_berakhir_sewa')); ?>" />
                <div class="helper">Kosongkan jika sewa berlangsung terus</div>
            </div>
        </div>

        <div class="form-actions-modern">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?php echo e(route('admin.penyewa.index')); ?>" class="btn-cancel-modern"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/penyewa/create.blade.php ENDPATH**/ ?>