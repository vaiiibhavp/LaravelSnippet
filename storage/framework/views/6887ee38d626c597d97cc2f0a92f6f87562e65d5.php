<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('drivers.partials.header', ['title' => __('Add Driver')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
  <div class="row">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
                <div class="col-8">
              <h3 class="mb-0"><?php echo e(__('Drivers Management')); ?></h3>
            </div>
                <div class="col-4 text-right"> <a href="<?php echo e(route('drivers.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a> </div>
              </div>
        </div>
            <div class="card-body">
          <h6 class="heading-small text-muted mb-4"><?php echo e(__('Driver information')); ?></h6>
          <form method="post" action="<?php echo e(route('drivers.store')); ?>" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
              <div class="col col-lg-3 col-md-6 col-12">
                    <div class="form-group<?php echo e($errors->has('name_driver') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="name_driver"><?php echo e(__('Driver Name')); ?></label>
                  <input type="text" name="name_driver" id="name_driver" class="form-control form-control-alternative<?php echo e($errors->has('name_driver') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Driver Name')); ?>" value="" required>
                  <?php if($errors->has('name_driver')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('name_driver')); ?></strong> </span> <?php endif; ?> </div>
                  </div>

                  <div class="col col-lg-3 col-md-6 col-12">
                  <div class="form-group<?php echo e($errors->has('aadhar_driver') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="aadhar_driver">Adhar Card No</label>
                  <input type="text" name="aadhar_driver" id="aadhar_driver" class="form-control form-control-alternative<?php echo e($errors->has('aadhar_driver') ? ' is-invalid' : ''); ?>" placeholder="Adhar Card No" value="" required>
                  <?php if($errors->has('aadhar_driver')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('aadhar_driver')); ?></strong> </span> <?php endif; ?> </div>
                  </div>

                  <div class="col col-lg-3 col-md-6 col-12">
                  <div class="form-group<?php echo e($errors->has('license_num') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="license_num">License number</label>
                  <input type="text" name="license_num" id="license_num" class="form-control form-control-alternative<?php echo e($errors->has('license_num') ? ' is-invalid' : ''); ?>" placeholder="License Number" value="" required>
                  <?php if($errors->has('license_num')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('license_num')); ?></strong> </span> <?php endif; ?> </div>
                  </div>

                  <div class="col col-lg-3 col-md-6 col-12">
                  <div class="form-group<?php echo e($errors->has('vehicle_type') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="vehicle_type">Vehicle Type</label>
                  <input type="text" name="vehicle_type" id="vehicle_type" class="form-control form-control-alternative<?php echo e($errors->has('vehicle_type') ? ' is-invalid' : ''); ?>" placeholder="Vehicle Type" value="" required>
                  <?php if($errors->has('vehicle_type')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('vehicle_type')); ?></strong> </span> <?php endif; ?> </div>
                  </div>

                  <div class="col col-lg-3 col-md-6 col-12">
                  <div class="form-group<?php echo e($errors->has('vehicle_num') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="vehicle_num">Vehicle Number</label>
                  <input type="text" name="vehicle_num" id="vehicle_num" class="form-control form-control-alternative<?php echo e($errors->has('vehicle_num') ? ' is-invalid' : ''); ?>" placeholder="Vehicle Number" value="" required>
                  <?php if($errors->has('vehicle_num')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('vehicle_num')); ?></strong> </span> <?php endif; ?> </div>
                  </div>      

                  <div class="col col-lg-3 col-md-6 col-12">
                  <div class="form-group<?php echo e($errors->has('email_driver') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="email_driver"><?php echo e(__('Driver Email')); ?></label>
                  <input type="email" name="email_driver" id="email_driver" class="form-control form-control-alternative<?php echo e($errors->has('email_driver') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Driver Email')); ?>" value="" required>
                  <?php if($errors->has('email_driver')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('email_driver')); ?></strong> </span> <?php endif; ?> </div>
                  </div>
                  
                  <div class="col col-lg-3 col-md-6 col-12">
                  <div class="form-group<?php echo e($errors->has('phone_driver') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="phone_driver"><?php echo e(__('Driver Phone')); ?></label>
                  <input type="text" name="phone_driver" id="phone_driver" class="form-control form-control-alternative<?php echo e($errors->has('phone_driver') ? ' is-invalid' : ''); ?> val" val="mobile min_char-9 max_digits-10" placeholder="<?php echo e(__('Driver Phone')); ?>" value="" required>
                  <?php if($errors->has('phone_driver')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('phone_driver')); ?></strong> </span> <?php endif; ?> </div>
                  </div>

              <div class="col col-12">
                    <?php
                $images=[
                    ['name'=>'driver_aadhar','label'=>__('Adhar Card'),'value'=>'','style'=>'width: 295px; height: 200px;'],
                    ['name'=>'driver_license','label'=>__('Licence Image'),'value'=>'','style'=>'width: 295px; height: 200px;']
                ]
            ?>
                    <div class="row"> <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col col-ld-4 col-md-6 col-12"> <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
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
  <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', ['title' => __('Drivers Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/drivers/create.blade.php ENDPATH**/ ?>