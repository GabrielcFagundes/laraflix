

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Diretor</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('diretores.update', $diretor->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo e($diretor->nome); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="<?php echo e(route('diretores.index')); ?>" class="btn btn-secondary">Voltar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/diretores/edit.blade.php ENDPATH**/ ?>