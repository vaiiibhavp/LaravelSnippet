<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="<?php echo e('background-image: url('.config('global.restorant_details_cover_image').'); background-size: cover; background-position: center top;'); ?>">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 <?php echo e($class ?? ''); ?>">
                <h1 class="display-2 text-white"><?php echo e($title); ?></h1>
                <?php if(isset($description) && $description): ?>
                    <p class="text-white mt-0 mb-5"><?php echo e($description); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/users/partials/header.blade.php ENDPATH**/ ?>