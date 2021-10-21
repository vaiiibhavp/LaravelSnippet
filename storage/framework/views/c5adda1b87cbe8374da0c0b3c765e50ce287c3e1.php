<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('category.partials.header', ['title' => 'Add Category'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
  <div class="row">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
          <div class="row align-items-center">
                <div class="col-8">
              <h3 class="mb-0">Category Management</h3>
            </div>
                <div class="col-4 text-right"> <a href="<?php echo e(url('/categorylist')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a> </div>
              </div>
        </div>
            <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Category Informantion</h6>
          <form method="post" action="addcategory" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                <?php
                $images=[
                    // ['name'=>'resto_logo','label'=>__('Category Image'),'value'=>$restorant->logom,'style'=>'width: 295px; height: 200px;'],
                    ['name'=>'category_image','label'=>__('Category Image'),'value'=>'','style'=>'width: 200px; height: 100px;']
                ]
            ?>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            <div class="col-lg-3 col-md-4">
              <div class="form-group">
                    <label class="form-control-label" for="name">Category Title</label>
                    <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter Title ..." value="" required autofocus>
              </div>
            </div>

            <div class="col col-12">
            <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                  </div>
            </div>
              
          </div>  
        </form>
        </div>
          </div>
    </div>
      </div>
</div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('food_category')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/category/create.blade.php ENDPATH**/ ?>