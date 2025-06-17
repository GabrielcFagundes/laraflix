<?php $__env->startSection('title', 'Bem-vindo ao CineDebate'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center mt-5">
        <h1 class="mb-4">🎬 Bem-vindo ao CineJogosDebate!</h1>
        <p class="mb-4">Explore, avalie e comente sobre seus filmes, jogos e séries favoritos.</p>

        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary me-2">Login</a>
        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-primary">Registrar</a>

        <hr class="my-5">

        <a href="<?php echo e(route('filmes.index')); ?>" class="btn btn-success">Ver Filmes</a>
        <a href="<?php echo e(route('filmes.index')); ?>" class="btn btn-success">Ver Jogos</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/welcome.blade.php ENDPATH**/ ?>