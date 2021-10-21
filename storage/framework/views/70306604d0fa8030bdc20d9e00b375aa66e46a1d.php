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
                                <h3 class="mb-0">Chef Gallery</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a data-toggle="modal" data-target="#modal-new-gallery" data-toggle="tooltip" data-placement="top" title="Add Chef Gallery Photos" class="btn btn-sm btn-primary">Add Photos</a>
                                <!-- <?php if(auth()->user()->hasRole('admin') && config('settings.enable_import_csv')): ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-restaurants"><?php echo e(__('Import from CSV')); ?></button>
                                <?php endif; ?> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="pl-3 pr-3">
                        <!-- <div class="row">
                            <div class="col col-xl-3 col-md-4 col-6">
                                <div class="gallery_div">
                                    <div class="gallery_img">
                                    <img src="../../../../default/restaurant_thumbnail.jpg">
                                    </div>
                                </div>
                            </div>

                            <div class="col col-xl-3 col-md-4 col-6">
                                <div class="gallery_div">
                                    <div class="gallery_img">
                                    <img src="../../../../default/restaurant_thumbnail.jpg">
                                    </div>
                                </div>
                            </div>

                            <div class="col col-xl-3 col-md-4 col-6">
                                <div class="gallery_div">
                                    <div class="gallery_img">
                                    <img src="../../../../default/restaurant_thumbnail.jpg">
                                    </div>
                                </div>
                            </div>

                            <div class="col col-xl-3 col-md-4 col-6">
                                <div class="gallery_div">
                                    <div class="gallery_img">
                                    <img src="../../../../default/restaurant_thumbnail.jpg">
                                    </div>
                                </div>
                            </div>

                        </div> -->
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <!-- <th scope="col">ID</th> -->
                                    <th>Photo</th>
                                    <th scope="col">Title</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($images as $image) { ?>
                                    <tr>
                                        <!-- <td>O-001</td> -->
                                        <td><img class="rounded" src="<?php echo e(asset('storage/'.$image['gallery_image'])); ?>" width="70px" height="70px"></td>
                                        <!-- <td>Lorem ipsum dolor sit</td> -->
                                        <td><span class="badge badge-success"><?php echo e($image['status']==0?"Active":"Inactive"); ?></span></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <!-- <a class="dropdown-item" href=""><?php echo e(__('Edit')); ?></a> -->
                                                    
                                                  <!--   <form action="" method="post">
                                                            <a class="dropdown-item" href=""><?php echo e(__('Activate')); ?></a>
                                                            <button type="button" class="dropdown-item"><?php echo e(__('Deactivate')); ?></button>
                                                    </form> -->
                                                     <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete ?.')"  href="<?php echo e(url('/gallerydelete')); ?>/<?php echo e($image['id']); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>                                    
                               <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    </div>

<?php $__env->stopSection(); ?>

<div class="modal fade" id="modal-new-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item">Add Gallery</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
          <form method="post" action="/galleryadd" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                <?php
                $images=[
                    // ['name'=>'resto_logo','label'=>__('Category Image'),'value'=>$restorant->logom,'style'=>'width: 295px; height: 200px;'],
                    ['name'=>'gallery_image','label'=>__('Slider Image'),'value'=>'','style'=>'width: 200px; height: 100px;']
                ]
            ?>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->startSection('js'); ?>
<script>
  $("[data-target='#modal-new-gallery']").click(function() {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    $('#modal-new-gallery').modal('show');
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/gallery/index.blade.php ENDPATH**/ ?>