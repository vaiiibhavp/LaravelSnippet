<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"> </div>
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-7 ">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">VB-<?php  echo $varietybundle[0]['id']; ?>-<?php  echo $varietybundle[0]['title']; ?>- <?php  echo date('d M Y h:i A',strtotime($varietybundle[0]['created_at'])); ?></h3>
            </div>
            <div class="col-4 text-right"> <a href="<?php echo e(url('/verietybundlelist')); ?>" class="btn btn-sm btn-primary"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a> </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-3"><?php echo e(__('Restaurant information')); ?></h6>
          <?php $__currentLoopData = $bundledetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundledetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="box-com">
            <h3 class="mb-3"><?php echo e($bundledetail['chefname']); ?></h3>
            <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> Address -</small> <?php echo e($bundledetail['chefaddress']); ?></p>
            <p><small><i class="fa fa-phone" aria-hidden="true"></i> Phone Number -</small> <?php echo e($bundledetail['chefphone']); ?> </p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Category -</small> <?php echo e($bundledetail['foodtype']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Veg & Non-Veg -</small> <?php echo e($bundledetail['userdiet']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Days -</small> <?php echo e($bundledetail['days']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Price -</small> <?php echo e($bundledetail['price']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Comission -</small> <?php echo e($bundledetail['commission']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Delivery Time -</small> <?php echo e($bundledetail['delivery_time']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Bundle Image -</small> 
              <img class="rounded" src="<?php echo e(asset('storage/'.$bundledetail['bundle_image'])); ?>" width="50px" height="50px">
            </p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Food Items -</small> <?php echo e($bundledetail['food_items']); ?></p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php $__currentLoopData = $bundlesequence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Sr Number -</small> <?php echo e($bs['seq_position']); ?></p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i>  Delivery Number -</small> <?php echo e($bs['seq_deilvery']); ?> Delivery</p>
            <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Chef Name -</small> <?php echo e($bs['chefname']); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-3">Total Charge Details</h6>
          <div class="box-com mb-3">
            <p><small><?php echo e(__("Total Days")); ?>:</small> <?php  echo $varietybundle[0]['total_days']; ?></p>
            <p><small><?php echo e(__("Total Amount")); ?>:</small><?php  echo $varietybundle[0]['gross_value']; ?></p>
            <p><small><?php echo e(__("Total Commission")); ?>:</small><?php  echo $varietybundle[0]['total_commission']; ?></p>
            <p><small><?php echo e(__("Discount")); ?>:</small><?php  echo $varietybundle[0]['discount']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-5  mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="card-header">
          <h5 class="h3 mb-0"><?php echo e(__("Status History")); ?></h5>
        </div>
        <div class="card-body">
          <div class="timeline timeline-one-side" id="status-history" data-timeline-content="axis" data-timeline-axis-style="dashed">
            <div class="timeline-block"> <span class="timeline-step badge-success"> <i class="ni ni-bell-55"></i> </span>
              <div class="timeline-content">
                <div class="d-flex justify-content-between pt-1">
                  <div> <span class="text-muted text-sm font-weight-bold">Just created</span> </div>
                  <div class="text-right"> <small class="text-muted"><i class="fas fa-clock mr-1"></i>28 May 2021 02:58 PM</small> </div>
                </div>
                <h6 class="text-sm mt-1 mb-0">Status From : Admin</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Variety_Bundles')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/varietybundle/verietybundelshow.blade.php ENDPATH**/ ?>