<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('webslider.partials.header', ['title' => 'Add Web Slider'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
  <div class="row">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
          <div class="row align-items-center">
                <div class="col-8">
              <h3 class="mb-0">Web Slider Management</h3>
              <?php //print_r($slider['slider_image']); ?>
            </div>
                <div class="col-4 text-right"> <a href="<?php echo e(url('/websliderlist')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a> </div>
              </div>
        </div>
            <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Web Slider Informantion</h6>
          <form method="post" action="/websliderstore" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">                
                <?php
                    if ($slider) { ?>
                       <input type="hidden" name="id" value="<?php echo e($slider['id']); ?>">
                    <?php $val =  asset('storage/'.$slider['slider_image']);
                    }else{
                      $val = '';
                    }            
                   $images=[
                    ['name'=>'slider_image','label'=>__('Slider Image'),'value'=>$val,'style'=>'width: 200px; height: 100px;']
                ]               
            ?>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            <div class="col col-12">
                <div class="form-group">
                  <label class="form-control-label" for="ckeditor">Slider Details</label>
                      <textarea class="form-control" id="ckeditor" name="slider_des"><?php echo e($slider['slider_des']?? ''); ?></textarea>
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

<?php $__env->startSection('js'); ?>
    <!-- CKEditor -->
    <script src="<?php echo e(asset('ckeditor')); ?>/ckeditor.js"></script>
    <script>
        "use strict";
        CKEDITOR.replace('ckeditor', {
            removePlugins: 'sourcearea',
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form',
            //allowedContent: 'p h1{text-align}; a[!href]; strong em; p(tip)'
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('web_slider')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/webslider/create.blade.php ENDPATH**/ ?>