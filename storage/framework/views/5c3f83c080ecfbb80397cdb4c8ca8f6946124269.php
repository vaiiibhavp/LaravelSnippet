<!-- DRIVER LIST PAGE -->


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
                                <h3 class="mb-0"><?php echo e(__('Drivers')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('drivers.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add driver')); ?></a>
                                <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-restaurants"><?php echo e(__('Import from CSV')); ?></button> -->
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
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Email')); ?></th>
                                    <th scope="col"><?php echo e(__('Creation')); ?></th>
                                    <!-- <th scope="col">Creation Time</th> -->
                                    <!-- <th scope="col">Approved Date</th> -->
                                    <!-- <th scope="col">Approved Time</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php //print_r($users); ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('drivers.edit', $driver)); ?>"><?php echo e($driver->name); ?></a></td>
                                        <td>
                                            <a href="mailto:<?php echo e($driver->email); ?>"><?php echo e($driver->email); ?></a>
                                        </td>
                                       
                                        <td><?php echo e($driver->created_at->format(config('settings.datetime_display_format'))); ?></td>
                                        <!-- <td>27 May 2021</td> -->
                                        <!-- <td>11:44 AM</td> -->
                                        <!-- <td>27 May 2021</td> -->
                                        <!-- <td>11:44 AM</td> -->

                                        <td>
                                           <?php if($driver->active == 1): ?>
                                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                           <?php else: ?>
                                                <span class="badge badge-warning"><?php echo e(__('Not active')); ?></span>
                                           <?php endif; ?>
                                        </td>
                                        <!-- <td><span class="badge badge-warning">Pending</span></td> -->
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="<?php echo e(route('drivers.destroy', $driver)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <!-- <a class="dropdown-item" href="#">Approve</a> -->
                                                        <!-- <a class="dropdown-item" href="#">Reject</a> -->
                                                        <!-- <a class="dropdown-item" href="#">Suspend</a> -->
                                                        <?php echo method_field('delete'); ?>
                                                        <?php if($driver->active == 0): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('driver.activate', $driver)); ?>"><?php echo e(__('Activate')); ?></a>
                                                        <?php else: ?>
                                                         <a class="dropdown-item" href="<?php echo e(route('driver.deactivate', $driver)); ?>"><?php echo e(__('Dectivate')); ?></a>
                                                        <?php endif; ?>
                                                    </form>
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this driver?.')"  href="<?php echo e(url('/driverdelete')); ?>/<?php echo e($driver->id); ?>"><?php echo e(__('Delete')); ?></a> 
                                                    <a class="dropdown-item" href="<?php echo e(route('drivers.edit', $driver)); ?>"><?php echo e(__('Edit')); ?></a>
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
                            <?php echo e($users->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Drivers')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/drivers/index.blade.php ENDPATH**/ ?>