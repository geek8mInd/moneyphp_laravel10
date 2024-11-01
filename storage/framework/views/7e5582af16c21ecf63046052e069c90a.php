

  

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1><?php echo e(ucfirst(Route::current()->uri)); ?></h1>
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

            <?php
                Session::forget('success');
            ?>
        </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('aggregation.compute')); ?>" method="POST">      
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label" for="operation">Operation:</label>
                <select name="operation" id="operation" class="form-control <?php $__errorArgs = ['operation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Operation">
                    <option value="">-- Please select operation --</option>
                    <option value="lowest" <?php echo e(old('operation') == 'lowest' ? "selected" : ""); ?>>Lowest (Min)</option>
                    <option value="highest" <?php echo e(old('operation') == 'highest' ? "selected" : ""); ?>>Highest (Max)</option>
                    <option value="average" <?php echo e(old('operation') == 'average' ? "selected" : ""); ?>>Average (Avg)</option>
                    <option value="total" <?php echo e(old('operation') == 'total' ? "selected" : ""); ?>>Total (Sum)</option>
                </select>
                <?php $__errorArgs = ['operation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label class="form-label" for="entities">Entities/Set (separated by comma):</label>
                <input 
                    type="text" 
                    name="entities" 
                    id="entities"
                    class="form-control <?php $__errorArgs = ['entities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    placeholder="Entities (Set)"
                    value=<?php echo e(old('entities')); ?>>
                <?php $__errorArgs = ['entities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php endif; ?>
            </div>
     
            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rhea/projects/money_app_laravel10_moneyphp/resources/views/aggregation/index.blade.php ENDPATH**/ ?>