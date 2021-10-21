<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Diet')); ?>

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
                                <h3 class="mb-0"><?php echo e(__('Diet')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a data-toggle="modal" data-target="#modal-diet" data-toggle="tooltip" data-placement="top" title="Add diet" class="btn btn-sm btn-primary">Add Diet</a>
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
                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; ?>
                                    <tr>
                                        <td>D-<?php echo e($i); ?></td>
                                        <td><?php echo e($diet['title']); ?></td>
                                        <td>
                                            <?php if($diet['status'] == 0): ?>
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
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#modal-diet<?php echo e($diet['id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Food type" ><?php echo e(__('Edit')); ?></a>
                                                    
                                                    <!-- <form action="" method="post"> -->
                                                        <?php if($diet['status'] == 0): ?>
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/dietstatus')); ?>/<?php echo e($diet['id']); ?>/1"><?php echo e(__('Deactivate')); ?></a>
                                                            <?php else:?>
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/dietstatus')); ?>/<?php echo e($diet['id']); ?>/0"><?php echo e(__('Activate')); ?></a>
                                                        <?php endif; ?>
                                                    <!-- </form> -->
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this Diet?.')"  href="<?php echo e(url('/dietdelete')); ?>/<?php echo e($diet['id']); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
<div class="modal fade" id="modal-diet<?php echo e($diet['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item">Edit Diet</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
          <form method="post" action="/dietupdate" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col col-12">
                    <input type="hidden" name="id" value="<?php echo e($diet['id']); ?>">
                        <input type="text" name="title" value="<?php echo e($diet['title']); ?>" placeholder="Diet title" class="form-control" required/>
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
  </div>
</div>                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($diets->links()); ?>

                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>
<?php $__env->stopSection(); ?>

<div class="modal fade" id="modal-diet" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item">Add Diet</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
          <form method="post" action="/dietstore" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col col-12">
                        <input type="text" name="title" placeholder="Diet title" class="form-control" required/>
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
  </div>
</div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/diets/index.blade.php ENDPATH**/ ?>