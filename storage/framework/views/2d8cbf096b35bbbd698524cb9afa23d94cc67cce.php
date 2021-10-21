<?php $__env->startSection('admin_title'); ?>
    Reviews and Ratings
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
                                <h3 class="mb-0">Reviews and Ratings</h3>
                            </div>
                            <!-- <div class="col-4 text-right">
                               
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-restaurants"><?php echo e(__('Import from CSV')); ?></button>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div> -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush review-table">
                            <thead class="thead-light">
                                <tr>
                                    <?php if(auth()->user()->hasRole('admin')): ?>
                                    <th scope="col">Chef</th>
                                    <?php endif; ?>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                    <th scope="col">Creation Time</th>
                                    <th scope="col">Status</th>
                                    <?php if(auth()->user()->hasRole('admin')): ?>
                                    <th scope="col" class="text-right">Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $__currentLoopData = $review_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if(auth()->user()->hasRole('admin')): ?>
                                        <td><?php echo e($review['restro_name']); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e($review['user_name']); ?></td>
                                        <td><?php echo e($review['rating']); ?></td>
                                        <td class="td-rating"><span><?php echo e($review['comment']); ?></span></td>
                                        <td><?php echo e(date('d M Y',strtotime($review['created_at']))); ?></td>
                                        <td><?php echo e(date('h:i A',strtotime($review['created_at']))); ?></td>
                                        <td>
                                            <?php if($review['status'] == 1): ?>
                                            <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                            <?php else:?>
                                            <span class="badge badge-warning"><?php echo e(__('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(auth()->user()->hasRole('admin')): ?>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <!-- <form action="" method="post"> -->
                                                        <?php if($review['status'] == 1): ?>
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/reviewstatus')); ?>/<?php echo e($review['id']); ?>/0"><?php echo e(__('Deactivate')); ?></a>
                                                        <?php else:?>
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/reviewstatus')); ?>/<?php echo e($review['id']); ?>/1"><?php echo e(__('Activate')); ?></a>
                                                    <?php endif; ?>
                                                    <!-- </form> -->
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this Review?.')"  href="<?php echo e(url('/reviewdelete')); ?>/<?php echo e($review['id']); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <?php endif; ?>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/chefreview/index.blade.php ENDPATH**/ ?>