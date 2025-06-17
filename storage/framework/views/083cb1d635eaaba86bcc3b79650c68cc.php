

<?php $__env->startSection('title', 'Detalhes do Filme'); ?>

<?php $__env->startSection('content'); ?>
<?php use Illuminate\Support\Facades\Storage; ?>

<div class="container">
    <?php if(isset($filme)): ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2 class="mb-3"><?php echo e($filme->titulo); ?></h2>
                <p class="mb-1"><strong>Diretor:</strong> <?php echo e($filme->diretor); ?></p>
                <p class="mb-1"><strong>Nota:</strong> <?php echo e($filme->nota); ?>/10</p>
                <p class="mb-3"><strong>Comentário:</strong> <?php echo e($filme->subtitulo); ?></p>

                <?php if($filme->imagem && Storage::exists($filme->imagem)): ?>
                    <img src="<?php echo e(Storage::url($filme->imagem)); ?>" alt="Capa" class="img-fluid rounded mb-3" style="max-width: 400px;">
                <?php else: ?>
                    <p class="text-muted">Imagem não disponível.</p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-3">Comentários</h4>

                <?php $__empty_1 = true; $__currentLoopData = $filme->comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border-start border-3 ps-3 mb-3">
                        <p class="mb-1"><strong><?php echo e($comentario->user->name ?? $comentario->autor); ?>:</strong></p>
                        <p class="mb-1"><?php echo e($comentario->conteudo); ?></p>
                        <small class="text-muted"><?php echo e($comentario->created_at->format('d/m/Y H:i')); ?></small>

                        
                        <?php $__currentLoopData = $comentario->respostas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resposta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ms-4 mt-3 border-start border-secondary ps-3">
                                <p class="mb-1"><strong><?php echo e($resposta->user->name ?? $resposta->autor); ?>:</strong></p>
                                <p class="mb-1"><?php echo e($resposta->conteudo); ?></p>
                                <small class="text-muted"><?php echo e($resposta->created_at->format('d/m/Y H:i')); ?></small>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('comentarios.store')); ?>" method="POST" class="mt-2 ms-3">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="filme_id" value="<?php echo e($filme->id); ?>">
                                <input type="hidden" name="comentario_pai_id" value="<?php echo e($comentario->id); ?>">

                                <div class="input-group">
                                    <textarea name="conteudo" class="form-control" placeholder="Responder..." rows="2" required></textarea>
                                    <button type="submit" class="btn btn-outline-primary">Responder</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted">Nenhum comentário ainda.</p>
                <?php endif; ?>

                
                <?php if(auth()->guard()->check()): ?>
                    <hr>
                    <h5>Adicionar Comentário</h5>
                    <form action="<?php echo e(route('comentarios.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="filme_id" value="<?php echo e($filme->id); ?>">

                        <div class="mb-3">
                            <textarea class="form-control" name="conteudo" placeholder="Escreva seu comentário..." rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-info mt-3">
                        <a href="<?php echo e(route('login')); ?>">Faça login</a> para comentar.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Filme não encontrado!</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\LaraFlix\resources\views/filmes/show.blade.php ENDPATH**/ ?>