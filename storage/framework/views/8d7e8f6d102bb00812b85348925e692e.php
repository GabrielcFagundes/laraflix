

<?php $__env->startSection('title', 'Editar Filme'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">Editar Filme</h1>

    <form action="<?php echo e(route('filmes.update', $filme->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo e(old('titulo', $filme->titulo)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?php echo e(old('subtitulo', $filme->subtitulo)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor</label>
            <input type="text" class="form-control" id="diretor" name="diretor" value="<?php echo e(old('diretor', $filme->diretor)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota (0 a 10)</label>
            <input type="number" class="form-control" id="nota" name="nota" min="0" max="10" step="0.1" value="<?php echo e(old('nota', $filme->nota)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem (opcional)</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
            <?php if($filme->imagem): ?>
                <p class="mt-2">Imagem atual:</p>
                <img src="<?php echo e(asset('storage/' . $filme->imagem)); ?>" width="150" alt="Imagem atual do filme">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/filmes/edit.blade.php ENDPATH**/ ?>