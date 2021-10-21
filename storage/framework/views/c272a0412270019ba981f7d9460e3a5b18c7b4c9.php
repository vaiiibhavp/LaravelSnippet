<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('restorants.partials.header', ['title' => __('Add Chef')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Chef Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('admin.restaurants.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4"><?php echo e(__('Chef information')); ?></h6>
                        <div class="pl-lg-4">
                            <form method="post" action="<?php echo e(route('admin.restaurants.store')); ?>" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="name"><?php echo e(__('Chef Name')); ?></label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Chef Name here')); ?> ..." value="" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <!-- </div> -->
                                <hr />
                                <h6 class="heading-small text-muted mb-4"><?php echo e(__('Chef information')); ?></h6>
                                <div class="pl-lg-4">
                                    <!-- <div class="form-group<?php echo e($errors->has('name_owner') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="name_owner"><?php echo e(__('Owner Name')); ?></label>
                                        <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative<?php echo e($errors->has('name_owner') ? ' is-invalid' : ''); ?>"  placeholder="<?php echo e(__('Owner Name here')); ?> ..." value="" required autofocus>
                                        <?php if($errors->has('name_owner')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name_owner')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div> -->
                                    <div class="form-group<?php echo e($errors->has('email_owner') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="email_owner"><?php echo e(__('Chef Email')); ?></label>
                                        <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative<?php echo e($errors->has('email_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Chef Email here')); ?> ..." value="" required autofocus>
                                        <?php if($errors->has('email_owner')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email_owner')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('phone_owner') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="phone_owner"><?php echo e(__('Chef Phone')); ?></label>
                                        <input type="text" maxlength="10"  minlength="10" name="phone_owner" id="phone_owner" class="form-control form-control-alternative<?php echo e($errors->has('phone_owner') ? ' is-invalid' : ''); ?>"  placeholder="<?php echo e(__('Chef Phone here')); ?> ..." onkeypress="return isNumberKey(event)" b value="" required autofocus>
                                        <?php if($errors->has('phone_owner')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('phone_owner')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <script type="text/javascript">
        function isNumberKey(evt)
   {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
         return false;

      return true;
   }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Chef Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/restorants/create.blade.php ENDPATH**/ ?>