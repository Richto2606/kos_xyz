<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Kos XYZ · Yogyakarta'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { background:#f8fafc; color:#0f172a; line-height:1.5; }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\layouts\app.blade.php ENDPATH**/ ?>