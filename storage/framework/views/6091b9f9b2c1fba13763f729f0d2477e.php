

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Diretores</h1>
    <a href="<?php echo e(route('diretores.create')); ?>" class="btn btn-primary mb-3">Novo Diretor</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $diretores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diretor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($diretor->id); ?></td>
                    <td><?php echo e($diretor->nome); ?></td>
                    <td>
                        <a href="<?php echo e(route('diretores.edit', $diretor->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                        <form action="<?php echo e(route('diretores.destroy', $diretor->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/diretores/index.blade.php ENDPATH**/ ?>