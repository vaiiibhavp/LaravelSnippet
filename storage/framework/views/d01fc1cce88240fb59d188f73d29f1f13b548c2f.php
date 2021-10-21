<ul class="navbar-nav">
    <?php if(config('app.ordering')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">
                <i class="ni ni-tv-2 text-primary"></i> <?php echo e(__('Dashboard')); ?>

            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/live">
                <i class="ni ni-basket text-success"></i> <?php echo e(__('Live Orders')); ?><div class="blob red"></div>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">
                <i class="ni ni-basket text-orangse"></i> <?php echo e(__('Orders')); ?>

            </a>
        </li>
    <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.restaurants.edit',  auth()->user()->restorant->id)); ?>">
            <i class="ni ni-shop text-info"></i> <?php echo e(__('Restaurant')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('items.index')); ?>">
            <i class="ni ni-collection text-pink"></i> <?php echo e(__('Menu')); ?>

        </a>
    </li>
        
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/packagingoptions')); ?>">
            <i class="fa fa-picture-o text-success"></i> Packaging Options
        </a>
    </li> -->

    <?php if(config('app.isqrsaas') && (!config('settings.qrsaas_disable_odering') || config('settings.enable_guest_log'))): ?>
        <?php if(!config('settings.is_whatsapp_ordering_mode')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.restaurant.tables.index')); ?>">
                    <i class="ni ni-ungroup text-red"></i> <?php echo e(__('Tables')); ?>

                </a>
            </li>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(config('app.isqrsaas')&&!config('settings.is_whatsapp_ordering_mode')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('qr')); ?>">
                <i class="ni ni-mobile-button text-red"></i> <?php echo e(__('QR Builder')); ?>

            </a>
        </li>
        <?php if(config('settings.enable_guest_log')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurant.visits.index')); ?>">
                <i class="ni ni-calendar-grid-58 text-blue"></i> <?php echo e(__('Customers log')); ?>

            </a>
        </li>
        <?php endif; ?>
    <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/gallerylist')); ?>">
            <i class="far fa-images text-purple"></i> Gallery
        </a>
    </li>

    <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/chefreviewlist')); ?>">
            <i class="ni ni-diamond text-info"></i> <?php echo e(__('Reviews')); ?>

            </a>
        </li>

    <!-- <?php if(config('settings.enable_pricing')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('plans.current')); ?>">
                <i class="ni ni-credit-card text-orange"></i> <?php echo e(__('Plan')); ?>

            </a>
        </li>
    <?php endif; ?>

        <?php if(config('app.ordering')&&config('settings.enable_finances_owner')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('finances.owner')); ?>">
                    <i class="ni ni-money-coins text-blue"></i> <?php echo e(__('Finances')); ?>

                </a>
            </li>
        <?php endif; ?> -->

        <!--
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurant.coupons.index')); ?>">
                <i class="ni ni-tag text-pink"></i> <?php echo e(__('Coupons')); ?>

            </a>
        </li>
    -->


    <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('share.menu')); ?>">
                <i class="ni ni-send text-green"></i> <?php echo e(__('Share')); ?>

            </a>
    </li> -->

</ul>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/layouts/navbars/menus/owner.blade.php ENDPATH**/ ?>