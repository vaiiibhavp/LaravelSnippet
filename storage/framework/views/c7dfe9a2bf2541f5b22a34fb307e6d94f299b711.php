<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('food_category')); ?>

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
                                <h3 class="mb-0"><?php echo e(__('food_category')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(url('/categoryadd')); ?>" class="btn btn-sm btn-primary">Add Category</a>
                                <!-- <?php if(auth()->user()->hasRole('admin') && config('settings.enable_import_csv')): ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-restaurants"><?php echo e(__('Import from CSV')); ?></button>
                                <?php endif; ?> -->
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
                                    <th scope="col">Photo</th>
                                    <th scope="col">Category Tittle</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- get image path -->
                                    <tr>
                                        <td>C-<?php echo e($category->id); ?></td>
                                        <td><img class="rounded" src="<?php echo e(asset('storage/'.$category->category_image)); ?>" width="50px" height="50px"></td>
                                        <td><?php echo e($category->name); ?></td>
                                        <td><span class="badge badge-success"><?php echo e(__('Active')); ?></span></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="<?php echo e(url('/categoryadd')); ?>"><?php echo e(__('Edit')); ?></a>
                                                    
                                                    <form action="" method="post">
                                                            <a class="dropdown-item" href=""><?php echo e(__('Activate')); ?></a>
                                                            <button type="button" class="dropdown-item"><?php echo e(__('Deactivate')); ?></button>

                                                    </form>
                                                    <form action="destroycategory" method="post" accept-charset="utf-8">
                                                         <!-- <input name="_method" type="hidden" value="DELETE"> -->
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" value="<?php echo e($category->id); ?>" name="category_id">
                                                          <button type="submit" class="dropdown-item"><?php echo e(__('Delete')); ?></button>
                                                    </form>
                                                   <!-- <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this Chef from Database? This will aslo delete all data related to it. This is irreversible step.')"  href="<?php echo e(url('/destroycategory/'.$category->id)); ?>"><?php echo e(__('Delete')); ?></a> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                          <!--   <tfoot>
                                <tr>
                                    <td colspan="100"></td>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                   <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($categories->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/category/index.blade.php ENDPATH**/ ?>