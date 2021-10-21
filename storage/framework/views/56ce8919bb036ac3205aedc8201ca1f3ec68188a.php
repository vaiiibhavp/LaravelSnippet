<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Offers')); ?>

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
                                <h3 class="mb-0"><?php echo e(__('Offers')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(url('/offersadd')); ?>" class="btn btn-sm btn-primary">Add Offer</a>
                                
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Offer Code</th>
                                    <!-- <th scope="col">Order Value</th> -->
                                    <th scope="col">Flat Rs. Discount</th>
                                    <th scope="col">Min. Order</th>
                                    <th scope="col">Offer TimeLine</th>
                                    <th scope="col">Offer For Chef</th>
                                    <th scope="col">Offer For Customer</th>
                                    <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                    <th scope="col">Creation Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;foreach($offers as $offer): 
                                    $i++;
                                    $validity = date('d M Y',strtotime($offer->offer_valid_from)).'-'.date('d M Y',strtotime($offer->offer_valid));
                                    $chefs = explode(',', $offer->chef_id);
                                    $custs = explode(',', $offer->customer_id);
                                    ?>
                                    <tr>
                                        <td>O-<?php echo e($i); ?></td>
                                        <td><?php echo e($offer->offer_title); ?></td>
                                        <td><img class="rounded" src="<?php echo e(asset('storage/'.$offer->offer_image)); ?>" width="70px" height="70px"></td>
                                        <td>#<?php echo e($offer->offer_code); ?></td>
                                        <td>₹ <?php echo e($offer->max_discount); ?></td>
                                        <td>₹ <?php echo e($offer->min_order); ?></td>
                                        <td><?php echo e($validity); ?></td>
                                        <td><?php echo e($offer->chef_id =="all"?'all':count($chefs)); ?></td>
                                        <td><?php echo e($offer->customer_id == "all"?'all':count($custs)); ?></td>
                                        <td><?php echo e(date('d M Y',strtotime($offer->created_at))); ?></td>
                                        <td><?php echo e(date('h:i A',strtotime($offer->created_at))); ?></td>
                                        <td>
                                             <?php if($offer->offer_status == 0): ?>
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
                                                    <a class="dropdown-item" href="<?php echo e(url('/offersedit')); ?>/<?php echo e($offer->id); ?>"><?php echo e(__('Edit')); ?></a>
                                                    
                                                <?php if ($offer->offer_status==0) { ?>
                                                       <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/offerstatus')); ?>/<?php echo e($offer->id); ?>/1"><?php echo e(__('Deactivate')); ?></a>
                                                <?php }else{ ?>
                                                    <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/offerstatus')); ?>/<?php echo e($offer->id); ?>/0"><?php echo e(__('Activate')); ?></a>
                                                <?php } ?>
                                                   <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this Offer?.')"  href="<?php echo e(url('/offerdelete')); ?>/<?php echo e($offer->id); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($offers->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/offers/index.blade.php ENDPATH**/ ?>