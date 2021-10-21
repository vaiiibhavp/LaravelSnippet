<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Variety_Bundles')); ?>

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
                                <h3 class="mb-0"><?php echo e(__('Variety_Bundles')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(url('/verietybundleadd')); ?>" class="btn btn-sm btn-primary">Add Variety Bundle</a>
                                   
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div> -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Total Food Type</th>
                                    <th scope="col">Total Days</th>
                                    <th scope="col">Gross sales Value</th>
                                    <th scope="col">Commission</th>
                                    <!-- <th scope="col">Packaging Options</th> -->
                                    <th scope="col">Discount</th><!-- 
                                    <th scope="col">Chef - 1</th>
                                    <th scope="col">Chef - 2</th>
                                    <th scope="col">Chef - 3</th>
                                    <th scope="col">Chef - 4</th>
                                    <th scope="col">Chef - 5</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php $__currentLoopData = $varietybundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varietybundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>VB-<?php echo e(++$i); ?></td>
                                        <td><?php echo e($varietybundle['title']); ?></td>
                                        <td><?php echo e($varietybundle['total_food_types']); ?></td>
                                        <td><?php echo e($varietybundle['total_days']); ?></td>
                                        <td><?php echo e($varietybundle['gross_value']); ?></td>
                                        <td><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($varietybundle['total_commission']); ?></td>
                                        <!-- <td><?php echo e($varietybundle['packaging']); ?></td> -->
                                        <td><?php echo e($varietybundle['discount']); ?></td>
                                        <td>
                                            <?php if($varietybundle['status'] == 0): ?>
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
                                                    <a class="dropdown-item" href="<?php echo e(url('/verietybundleedit')); ?>/<?php echo e($varietybundle['id']); ?>"><?php echo e(__('Edit')); ?></a>
                                                    <a class="dropdown-item" href="<?php echo e(url('/verietybundelshow')); ?>/<?php echo e($varietybundle['id']); ?>">View</a>

                                                    <?php if($varietybundle['status'] == 0): ?>
                                                    <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/verietybundelstatus')); ?>/<?php echo e($varietybundle['id']); ?>/1"><?php echo e(__('Deactivate')); ?></a>
                                                    <?php else:?>
                                                    <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/verietybundelstatus')); ?>/<?php echo e($varietybundle['id']); ?>/0"><?php echo e(__('Activate')); ?></a>
                                                    <?php endif; ?>
                                                    
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete ?')"  href="<?php echo e(url('/verietybundeldelete')); ?>/<?php echo e($varietybundle['id']); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($varietybundles->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/varietybundle/index.blade.php ENDPATH**/ ?>