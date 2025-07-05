<?php $user = Auth::user(); ?>






<?php $__env->startSection("title", "Views"); ?>
<?php $__env->startSection("content"); ?>








    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('error')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <h3 class="card-header text-center">Create Post</h3>
                        <div class="card-body">
                            <form action="<?php echo e(route('views.show')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="titolo" placeholder="Inserisci il titolo">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"
                                        placeholder="Contenuto" name="contenuto"></textarea>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                                </div>
                                <div class="mt-3">
                                    <p>Torna alla pagina <a href="<?php echo e(route('home')); ?>">home</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <h3 class="mb-2 mt-4">Post Recenti</h3>

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h4><?php echo e($post->titolo); ?></h4>
                        <div
                            style="min-height:100px !important; height: auto; display: flex; flex-direction: column; justify-content: center;">
                            <pre style=" display: inline-block;"><?php echo e($post->contenuto); ?></pre>
                        </div>
                        <p><strong>Autore:</strong> <?php echo e($post->user->name ?? 'Sconosciuto'); ?></p>
                        <small><em>Creato il <?php echo e($post->created_at->format('d/m/Y H:i')); ?></em></small>
                        <br>
                        <div class="mt-3"></div>
                        <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <div class="">
                                <button type="submit" class="btn btn-danger btn-block">Elimina Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\mydemoapp\resources\views/views.blade.php ENDPATH**/ ?>