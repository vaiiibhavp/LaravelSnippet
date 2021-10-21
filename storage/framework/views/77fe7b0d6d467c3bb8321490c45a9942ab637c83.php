<?php $__env->startSection('content'); ?>
<?php echo $__env->make('drivers.partials.header', ['title' => __('Edit Driver')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt--7">
  <div class="row"> 
    <!--<div class="col-xl-12 order-xl-1">-->
    <div class="col-xl-8">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0"><?php echo e(__('Driver Management')); ?></h3>
            </div>
            <div class="col-4 text-right"> <a href="<?php echo e(route('drivers.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a> </div>
          </div>
        </div>
        <div class="card-body">
          <div class="pl-lg-4">
            <form method="post" action="/driverupdate" autocomplete="off">
              <?php echo csrf_field(); ?>           
          <hr />   
          <h6 class="heading-small text-muted mb-4"><?php echo e(__('Driver information')); ?></h6>
          <div class="row">
              <div class="col col-12">
              <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
              <label class="form-control-label" for="input-name"><?php echo e(__('Driver Name')); ?></label>
              <input type="hidden" name="id" value="<?php echo e(old('name', $driver->id)); ?>"/>
              <input type="text" name="name" id="input-name" class="form-control form-control-alternative" placeholder="<?php echo e(__('Driver Name')); ?>" value="<?php echo e(old('name', $driver->name)); ?>" readonly>
            </div>
              </div>
            
            <div class="col col-md-6 col-12">
              <div class="form-group">
                <label class="form-control-label" for="name_driver">Adhar Card Nos.</label>
                <input type="text" name="aadhar_num" id="adhar_driver" class="form-control form-control-alternative" placeholder="Adhar Number" value="<?php echo e(old('aadhar_num', $driver->aadhar_num)); ?>" required>
              </div>
            </div>
            <div class="col col-md-6 col-12">
              <div class="form-group">
                <label class="form-control-label" for="name_driver">Licence Number</label>
                <input type="text" name="license_num" id="licnumber_driver" class="form-control form-control-alternative" placeholder="Licence Number" value="<?php echo e(old('license_num', $driver->license_num)); ?>" required>
              </div>
            </div>
            <div class="col col-md-6 col-12">
              <div class="form-group">
                <label class="form-control-label" for="name_driver">Vehicle Type</label>
                <input type="text" name="vehicle_type" id="vtype_driver" class="form-control form-control-alternative" placeholder="Vehicle Type" value="<?php echo e(old('vehicle_type', $driver->vehicle_type)); ?>" required>
              </div>
            </div>
            <div class="col col-md-6 col-12">
              <div class="form-group">
                <label class="form-control-label" for="name_driver">Vehicle Number</label>
                <input type="text" name="vehicle_num" id="vehicle_driver" class="form-control form-control-alternative" placeholder="Vehicle Number" value="<?php echo e(old('vehicle_num', $driver->vehicle_num)); ?>" required>
              </div>
            </div>
            <div class="col col-md-6 col-12">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="input-name"><?php echo e(__('Driver Email')); ?></label>
                <input type="text" name="email" id="input-name" class="form-control form-control-alternative" placeholder="<?php echo e(__('Driver Email')); ?>" value="<?php echo e(old('name', $driver->email)); ?>" readonly>
                </div>
            </div>
            <div class="col col-md-6 col-12">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="input-name"><?php echo e(__('Driver Phone')); ?></label>
                <input type="text" name="phone" id="input-name" class="form-control form-control-alternative val" val="mobile min_char-9 max_digits-10" placeholder="<?php echo e(__('Driver Phone')); ?>" value="<?php echo e(old('name', $driver->phone)); ?>" readonly>
                </div>
            </div>

            <div class="col col-12">
                    <?php
                        $images=[
                            ['name'=>'driver_aadhar','label'=>__('Adhar Card'),'value'=>asset('storage/'.$driver->aadhar_image),'style'=>'width: 295px; height: 200px;'],
                            ['name'=>'driver_license','label'=>__('Licence Image'),'value'=>asset('storage/'.$driver->license_image),'style'=>'width: 295px; height: 200px;']
                        ]
                    ?>
                    <div class="row"> 
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col col-ld-4 col-md-6 col-12"> <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </div>
            </div>
<!-- 
            <div class="col col-md-6 col-12">
                <div class="form-group">
                <label class="form-control-label" for="input-name">Action</label>
                  <select class="form-control form-control-alternative select-width">
                        <option disabled selected value> Select Option</option>
                        <option>Pending</option>
                        <option>Approve</option>
                        <option>Reject</option>
                        <option>Suspended</option>
                        <option>Active</option>
                        <option>UnActive</option>
                      </select>
                </div>
            </div> -->

          </div>
            <div class="col col-12">
              <div class="text-center">
                <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Update')); ?></button>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
    </div>
    <br/>
    <div class="col-xl-4 mb-5 mb-xl-0">
      <div class="row">
        <div class="col-xl-12 col-md-6"> <?php $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card card-stats">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__($key)); ?></h5>
                  <span class="h4 font-weight-bold mb-0"><?php echo e(__('Orders').": ".$value['orders']); ?></span> </div>
                <div class="col-auto">
                  <div class="<?php echo e('icon icon-shape text-white rounded-circle shadow '.$value['icon']); ?>"> <i class="ni ni-chart-bar-32"></i> </div>
                </div>
              </div>
              <p class="mb-0 text-sm"> 
                <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                                    <!-- <span class="text-nowrap">Since last month</span>-- -->
                <!-- <span class="h4 mb-0 text-nowrap"><?php echo e(__('Earnings').": "); ?><?php echo money($value['earning'], config('settings.cashier_currency'),config('settings.do_convertion')); ?></span> </p> -->
            </div>
          </div>
          <br/>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
      </div>
    </div>
  </div>
  <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', ['title' => __('Drivers Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/drivers/edit.blade.php ENDPATH**/ ?>