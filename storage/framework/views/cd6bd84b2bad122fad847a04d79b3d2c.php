<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'CineDebate'); ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('filmes.index')); ?>">
                🎬 <strong>Cinejogos</strong>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo e(route('filmes.index')); ?>">🎬 Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo e(route('filmes.index')); ?>">🎮 Jogos</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo e(route('dashboard')); ?>">📊 Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-link nav-link text-white">🔓 Sair</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo e(route('login')); ?>">🔐 Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo e(route('register')); ?>">📝 Registrar</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/layouts/app.blade.php ENDPATH**/ ?>