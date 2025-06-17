

<?php $__env->startSection('content'); ?>
<?php use Illuminate\Support\Facades\Storage; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>🎬 Filmes</h1>
        <a href="<?php echo e(route('filmes.index')); ?>" class="btn btn-outline-dark">🎮 Jogos</a>
    </div>

    <?php $__currentLoopData = $filmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($filme->titulo); ?></h5>
                <p class="card-text"><?php echo e($filme->subtitulo); ?></p>

                <p class="card-text"><strong>Nota:</strong> <?php echo e($filme->nota); ?>/10</p>
                <p class="card-text"><strong>Diretor:</strong> <?php echo e($filme->diretor); ?></p>
                <p class="card-text">
                    <small class="text-muted">Postado por: <?php echo e($filme->user->name ?? 'Anônimo'); ?></small>
                </p>

                <?php if($filme->imagem && Storage::exists($filme->imagem)): ?>
                    <img src="<?php echo e(Storage::url($filme->imagem)); ?>" class="img-fluid mt-2 rounded" alt="Capa do filme" style="max-height: 300px;">
                <?php else: ?>
                    <p class="text-muted mt-2">Imagem não disponível.</p>
                <?php endif; ?>

                <a href="<?php echo e(route('filmes.show', $filme->id)); ?>" class="btn btn-outline-secondary mt-3">
                    Ver detalhes e comentar
                </a>

                <?php if(auth()->guard()->check()): ?>
                    <?php if($filme->user_id === auth()->id()): ?>
                        <div class="mt-3">
                            <a href="<?php echo e(route('filmes.edit', $filme->id)); ?>" class="btn btn-primary btn-sm">Editar</a>

                            <form action="<?php echo e(route('filmes.destroy', $filme->id)); ?>" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/filmes/index.blade.php ENDPATH**/ ?>