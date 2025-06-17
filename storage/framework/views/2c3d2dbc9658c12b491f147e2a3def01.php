

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Postar Novo Filme</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($erro); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('filmes.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" name="subtitulo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor</label>
            <input type="text" name="diretor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota (0-10)</label>
            <input type="number" name="nota" class="form-control" min="0" max="10" step="0.1" required>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Postar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/filmes/create.blade.php ENDPATH**/ ?>