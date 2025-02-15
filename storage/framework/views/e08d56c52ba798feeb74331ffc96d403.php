<section id="wsus__brand_sleder" class="brand_slider_2">
    <div class="container">
        <div class="brand_border">
            <div class="row brand_slider">
                              
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-2">
                    <div class="wsus__brand_logo">
                        <img src="<?php echo e(asset($brand->logo)); ?>" alt="<?php echo e($brand->name); ?>" class="img-fluid w-100">
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col-xl-2">
                   
                </div>
                
                
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH D:\project\ecommerce\resources\views/frontend/home/section/brand-slider.blade.php ENDPATH**/ ?>