
<?php $__env->startSection("title", "Register"); ?>
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
                        <h3 class="card-header text-center">Register</h3>
                        <div class="card-body">
                            <form action="<?php echo e(route('register.post')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Your Full Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="fullname" placeholder="Your Full Name">
                                    <?php if($errors->has('fullname')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('fullname')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" placeholder="Email">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                                        id="exampleInputPassword1">
                                </div>
                                <?php if($errors->has('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                <?php endif; ?>
                                <div class="d-grid mx-auto mt-2">
                                    <button type="submit" class="btn btn-dark btn-block">Register</button>
                                </div>
                                <div class="mt-4">
                                    <p>You have an account? <a href="/login">Log in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\mydemoapp\resources\views/auth/register.blade.php ENDPATH**/ ?>