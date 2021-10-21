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
                            <h3 class="mb-0"><?php echo e(__('Clients')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="?report=true" class="btn btn-sm btn-primary"><?php echo e(__('Export')); ?></a>
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
                                    
                                    <th scope="col"><?php echo e(__('ID')); ?></th>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <!-- <th scope="col"><?php echo e(__('Owner')); ?></th> -->
                                    <th scope="col">Email</th>
                                    <!-- <th scope="col"><?php echo e(__('Creation Date')); ?></th> -->
                                    <!-- <th scope="col">Creation Time</th> -->
                                    <?php if(config('settings.enable_birth_date_on_register')): ?>
                                        <th scope="col"><?php echo e(__('Birth Date')); ?></th>
                                    <?php endif; ?>
                                    <!-- <th>Address 1</th>
                                    <th>Address 2</th>
                                    <th>Address 3</th>
                                    <th>Address 4</th>
                                    <th>Address 5</th> -->            
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php //$i=1;?>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td><a class="btn badge badge-success badge-pill" href="#">#<?php echo e($client->id); ?></a></td>
                                        <td><a href="<?php echo e(route('clients.edit', $client)); ?>"><?php echo e($client->name); ?></a></td>
                                        <!-- <td><?php echo e($client->name); ?></td> -->
                                        <td>
                                            <a href="mailto:<?php echo e($client->email); ?>"><?php echo e($client->email); ?></a>
                                        </td>
                                        <!-- <td><?php echo e($client->created_at); ?></td> -->

                                        <?php if(config('settings.enable_birth_date_on_register')): ?>
                                        <td scope="col"><?php echo e($client->birth_date); ?></td>
                                    <?php endif; ?>
                                        <!-- <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td> -->
                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($clients->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Clients')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/clients/index.blade.php ENDPATH**/ ?>