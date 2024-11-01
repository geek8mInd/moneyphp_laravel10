

  

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

        <form action="<?php echo e(route('discount.compute')); ?>" method="POST">      
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label" for="currency">Currency:</label>
                <select name="currency" id="currency" class="form-control <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Currency" <?php if(true): echo 'readonly'; endif; ?>>
                    <option>-- Please select currency --</option>
                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($currency->currency_iso_code); ?>" <?php echo e($oldcurrency == $currency->currency_iso_code ? "selected" : ""); ?>>
                            <?php echo e($currency->currency_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['currency'];
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
                <label class="form-label" for="discount_rate">Discount Rate:</label>
                <input 
                    type="text" 
                    name="discount_rate" 
                    id="discount_rate"
                    class="form-control <?php $__errorArgs = ['discount_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    placeholder="Discount Rate (%)"
                    value=<?php echo e($discountrate); ?>

                    <?php if(true): echo 'readonly'; endif; ?>>
                <?php $__errorArgs = ['discount_rate'];
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
                <label class="form-label" for="amount">Amount:</label>
                <input 
                    type="text" 
                    name="amount" 
                    id="amount"
                    class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    placeholder="Amount"
                    value=<?php echo e($amount); ?>

                    <?php if(true): echo 'readonly'; endif; ?>>
                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-3 bg-info">
                <label class="form-label" for="result">Result:</label>
                <input 
                    type="text" 
                    name="result" 
                    id="result"
                    class="form-control" 
                    placeholder="Result"
                    value=<?php echo e($result); ?> <?php if(true): echo 'readonly'; endif; ?>>
            </div>            

            <div class="mb-3">
                <a class="btn btn-primary" href="<?php echo e(route('discount.index')); ?>"> Back</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rhea/projects/money_app_laravel10_moneyphp/resources/views/discount/compute.blade.php ENDPATH**/ ?>