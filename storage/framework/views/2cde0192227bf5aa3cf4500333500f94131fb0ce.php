<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Category')); ?>

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
                                <h3 class="mb-0"><?php echo e(__('Categories')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a data-toggle="modal" data-target="#modal-food-type" data-toggle="tooltip" data-placement="top" title="Add Category" class="btn btn-sm btn-primary">Add Category</a>
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
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php $__currentLoopData = $foodtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>O-<?php echo e(++$i); ?></td>
                                         <td><img class="rounded" src="<?php echo e(asset('storage/'.$foodtype['image'])); ?>" width="50px" height="50px"></td>
                                        <td><?php echo e($foodtype['title']); ?></td>
                                        <td>
                                            <?php if($foodtype['status'] == 0): ?>
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
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#modal-food-type<?php echo e($foodtype['id']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Food type" ><?php echo e(__('Edit')); ?></a>
                                                    
                                                    <!-- <form action="" method="post"> -->
                                                        <?php if($foodtype['status'] == 0): ?>
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to deactivate ?')"  href="<?php echo e(url('/foodtypestatus')); ?>/<?php echo e($foodtype['id']); ?>/1"><?php echo e(__('Deactivate')); ?></a>
                                                            <?php else:?>
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to activate ?')"  href="<?php echo e(url('/foodtypestatus')); ?>/<?php echo e($foodtype['id']); ?>/0"><?php echo e(__('Activate')); ?></a>
                                                        <?php endif; ?>
                                                    <!-- </form> -->
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this Category?.')"  href="<?php echo e(url('/foodtypestoredelete')); ?>/<?php echo e($foodtype['id']); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


<div class="modal fade" id="modal-food-type<?php echo e($foodtype['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item">Edit Food Category</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
          <form method="post" action="/foodtypeupdate" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo $foodtype['id']; ?>">
                <div class="row">
                    <?php
                $images=[
                    ['name'=>'category_images','label'=>__('Category Image'),'value'=>asset('storage/'.$foodtype['image']),'style'=>'width: 200px; height: 100px;','editclass' => 'val val_image','val'=>'nomand']
                    ];
                    if($foodtype['image'] == '')
                    {
                        $images[0]['val'] = '';
                       
                    }
                ?>
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12 col-md-12">
                    <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="col col-12">
                        <input type="text" name="title" placeholder="Category name" value="<?php echo e($foodtype['title']); ?>" class="form-control" required/>
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

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($foodtypes->links()); ?>

                        </nav>
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
        <h3 class="modal-title" id="modal-title-new-item">Add Category</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
          <form method="post" action="/foodtypestore" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <?php
                $images=[
                    ['name'=>'category_images','label'=>__('Category Image'),'value'=>'','style'=>'width: 200px; height: 100px;','editclass'=>'val val_image','val'=>'']
                    ]
                ?>
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12 col-md-12">
                    <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="col col-12">
                        <input type="text" name="title" placeholder="Category name" class="form-control" required/>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/foodtypes/index.blade.php ENDPATH**/ ?>