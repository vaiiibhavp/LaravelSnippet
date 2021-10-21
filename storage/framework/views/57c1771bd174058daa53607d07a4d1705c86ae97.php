<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Packaging option')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"> </div>
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0"><?php echo e(__('Packaging option')); ?></h3>
            </div>
            <div class="col-4 text-right"> <a data-toggle="modal" data-target="#modal-food-type" class="btn btn-sm btn-primary"><span data-toggle="tooltip" data-placement="top" title="Add Packaging option">Add Packaging option</span></a> </div>
          </div>
        </div>
        <?php //print_r($packagingoptions); die(); ?>
        
        <!-- <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div> -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Sr. No</th>
                <th scope="col">Title</th>
                <?php if(auth()->user()->hasRole('admin')): ?>
                <th scope="col">Chef</th>
                <?php endif; ?>
                <th scope="col">Status</th>
                <th scope="col" class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($packagingoptions) > 0 ): ?>
              <?php foreach($packagingoptions as $po): ?>
              <tr>
                <td>O-<?php echo e($po['id']); ?></td>
                <td><?php echo e($po['title']); ?></td>
                <?php if(auth()->user()->hasRole('admin')): ?>
                <td><?php echo e($po['chef_name']); ?></td>
                <?php endif; ?>
                <td><?php if($po['status'] == 0): ?>
                  <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                  <?php else:?>
                  <span class="badge badge-warning"><?php echo e(__('Inactive')); ?></span>
                  <?php endif; ?></td>
                <td class="text-right"><div class="dropdown"> <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <a class="dropdown-item"  data-toggle="modal" data-target="#modal-food-type<?php echo e($po['id']); ?>" ><span data-toggle="tooltip" data-placement="top" title="Edit Packaging"><?php echo e(__('Edit')); ?></span></a>
                      <?php if($po['status'] == 0): ?>
                      <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/packagingstatus')); ?>/<?php echo e($po['id']); ?>/1"><?php echo e(__('Deactivate')); ?></a>
                      <?php else:?>
                      <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/packagingstatus')); ?>/<?php echo e($po['id']); ?>/0"><?php echo e(__('Activate')); ?></a>
                      <?php endif; ?>
                      <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this packaging option?.')"  href="<?php echo e(url('/packagingoptionsdel')); ?>/<?php echo e($po['id']); ?>"><?php echo e(__('Delete')); ?></a> </div>
                  </div></td>
              </tr>
            <div class="modal fade" id="modal-food-type<?php echo e($po['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="modal-title-new-item">Edit Packaging option</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                      <div class="card-body px-lg-3 py-lg-3">
                        <form method="post" action="/packagingoptionsupdate" autocomplete="off" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="id" value="<?php echo $po['id']; ?>">
                          <div class="row">
                            <div class="col col-12">
                              <div class="form-group"> <?php if(auth()->user()->hasRole('owner')): ?>
                                <input type="hidden" name="chef_id" placeholder="restaurant id" value="<?php echo e(auth()->user()->id); ?>" class="form-control" required/>
                                <?php else: ?> </div>
                              <div class="form-group">
                                <select name="chef_id" required class="form-control form-control-alternative select-width">
                                    
                            <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                  <option value="<?php echo e($chef['id']); ?>"
                            <?php if($chef['id'] == $po['chef_id']){echo "selected"; } ?>
                            ><?php echo e($chef['name']); ?></option>
                                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                </select>
                              </div>
                              <?php endif; ?> </div>
                            <div class="col col-12">
                              <input type="text" name="title" placeholder="Package" value="<?=$po['title']?>" class="form-control" required/>
                            </div>
                            <div class="col col-12">
                              <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save Changes')); ?></button>
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
            <?php endforeach; ?>
            <?php endif; ?>
              </tbody>
            
          </table>
        </div>
        <div class="card-footer py-4">
          <nav class="d-flex justify-content-end" aria-label="..."> <?php echo e($packagingoptions->links()); ?> </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> --> 
</div>
<?php $__env->stopSection(); ?>
<div class="modal fade" id="modal-food-type" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item">Add Packaging option</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
            <form method="post" action="/packagingoptionstore" autocomplete="off" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col col-12">
                  <div class="form-group"> <?php if(auth()->user()->hasRole('owner')): ?>
                    <input type="hidden" name="chef_id" placeholder="restaurant id" value="<?php echo e(auth()->user()->id); ?>" class="form-control" required/>
                    <?php else: ?> </div>
                  <div class="form-group">
                    <select name="chef_id" required class="form-control form-control-alternative select-width">
                      
                            <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                      <option value="<?php echo e($chef['id']); ?>"><?php echo e($chef['name']); ?></option>
                      
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </select>
                  </div>
                  <?php endif; ?> </div>
                <div class="col col-12">
                  <input type="text" name="title" placeholder="Package name" class="form-control" required/>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/packagingoptions/index.blade.php ENDPATH**/ ?>