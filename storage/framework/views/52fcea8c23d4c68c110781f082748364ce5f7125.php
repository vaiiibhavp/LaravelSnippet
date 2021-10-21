<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('web_slider')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('web_slider')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(url('/webslideradd')); ?>" class="btn btn-sm btn-primary">Add Slider</a>
                                <!-- <?php if(auth()->user()->hasRole('admin') && config('settings.enable_import_csv')): ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-restaurants"><?php echo e(__('Import from CSV')); ?></button>
                                <?php endif; ?> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Slider Photo</th>
                                    <th scope="col">Slider Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                <?php foreach($sliders as $slider):
                                 $i++; 
                                 ?>
                                    <tr>
                                        <td>S-<?php echo e($i); ?></td>
                                        <td><img class="rounded" src="<?php echo e(asset('storage/'.$slider['slider_image'])); ?>" width="50px" height="50px"></td>
                                        <td><?php echo $slider['slider_des']; ?></td>
                                        <td>
                                            <?php if($slider['status'] == 0): ?>
                                            <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                            <?php else:?>
                                            <span class="badge badge-warning"><?php echo e(__('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                             <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="<?php echo e(url('/webslideradd')); ?>/<?php echo e($slider['id']); ?>" ><?php echo e(__('Edit')); ?></a>
                                                        <?php if($slider['status'] == 0): ?>
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/websliderstatus')); ?>/<?php echo e($slider['id']); ?>/1"><?php echo e(__('Deactivate')); ?></a>
                                                            <?php else:?>
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/websliderstatus')); ?>/<?php echo e($slider['id']); ?>/0"><?php echo e(__('Activate')); ?></a>
                                                        <?php endif; ?>
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete ?.')"  href="<?php echo e(url('/websliderdelete')); ?>/<?php echo e($slider['id']); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/webslider/index.blade.php ENDPATH**/ ?>