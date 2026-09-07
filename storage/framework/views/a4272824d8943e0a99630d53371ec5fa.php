<?php $__env->startSection('title', 'Blog · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .blog-hero {
        background: linear-gradient(135deg, #b45309, #f59e0b);
        padding: 60px 40px;
        border-radius: 32px;
        margin: 28px 0 36px;
        color: white;
        text-align: center;
    }
    .blog-hero h1 {
        font-size: 2.5rem;
        font-weight: 800;
    }
    .blog-hero p {
        opacity: 0.85;
        margin-top: 8px;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 28px;
        margin: 20px 0 40px;
    }

    .blog-card {
        background: var(--bg-card);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--text-primary);
    }
    .blog-card:hover {
        transform: translateY(-6px);
        border-color: #fed7aa;
        box-shadow: 0 12px 40px rgba(0,0,0,0.06);
    }
    .blog-card .image {
        height: 200px;
        background: var(--bg-primary);
        overflow: hidden;
    }
    .blog-card .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .blog-card:hover .image img {
        transform: scale(1.05);
    }
    .blog-card .content {
        padding: 20px 24px 24px;
    }
    .blog-card .content .kategori {
        display: inline-block;
        padding: 2px 12px;
        border-radius: 40px;
        font-size: 0.7rem;
        font-weight: 600;
        background: #fef3c7;
        color: #92400e;
        margin-bottom: 8px;
    }
    .blog-card .content .judul {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .blog-card .content .deskripsi {
        font-size: 0.9rem;
        color: var(--text-muted);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .blog-card .content .meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 14px;
        padding-top: 14px;
        border-top: 1px solid var(--border-color);
        font-size: 0.8rem;
        color: var(--text-muted);
    }
    .blog-card .content .meta .penulis {
        font-weight: 500;
        color: var(--text-secondary);
    }

    .pagination-container {
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }

    .empty-blog {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: var(--bg-card);
        border-radius: 20px;
        border: 2px dashed var(--border-color);
    }
    .empty-blog i {
        font-size: 3rem;
        color: var(--text-muted);
        display: block;
        margin-bottom: 16px;
    }
    .empty-blog h3 {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: 6px;
    }
    .empty-blog p {
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    @media (max-width: 600px) {
        .blog-hero {
            padding: 40px 20px;
        }
        .blog-hero h1 {
            font-size: 1.8rem;
        }
        .blog-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <!-- HERO -->
    <div class="blog-hero">
        <h1><i class="fas fa-newspaper"></i> Blog Kos XYZ</h1>
        <p>Tips, informasi wisata, dan kegiatan menarik di Kos XYZ</p>
    </div>

    <!-- GRID ARTIKEL -->
    <div class="blog-grid">
        <?php $__empty_1 = true; $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e(route('public.artikel.detail', $artikel->slug)); ?>" class="blog-card">
            <div class="image">
                <img src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>">
            </div>
            <div class="content">
                <span class="kategori"><?php echo e($artikel->kategori); ?></span>
                <div class="judul"><?php echo e($artikel->judul); ?></div>
                <div class="deskripsi"><?php echo e($artikel->deskripsi_singkat ?? strip_tags(substr($artikel->isi, 0, 150)) . '...'); ?></div>
                <div class="meta">
                    <span class="penulis"><i class="fas fa-user"></i> <?php echo e($artikel->penulis); ?></span>
                    <span><i class="far fa-calendar-alt"></i> <?php echo e($artikel->tanggal_publikasi->format('d M Y')); ?></span>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-blog">
            <i class="fas fa-newspaper"></i>
            <h3>Belum ada artikel</h3>
            <p>Artikel akan segera hadir di sini</p>
        </div>
        <?php endif; ?>
    </div>

    <!-- PAGINATION -->
    <div class="pagination-container">
        <?php echo e($artikels->links()); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\public\blog.blade.php ENDPATH**/ ?>