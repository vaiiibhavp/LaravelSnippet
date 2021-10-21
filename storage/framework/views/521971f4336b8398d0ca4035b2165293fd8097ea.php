<ul class="navbar-nav">
    <?php if(config('app.ordering')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">
                <i class="ni ni-tv-2 text-primary"></i> <?php echo e(__('Dashboard')); ?>

            </a>
        </li>
        <?php if(config('app.isft')): ?>

        <!--  <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/todayitems')); ?>">
                <i class="ni ni-basket text-orange"></i>
                 <?php echo e(__('Active Items')); ?>

            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">
                <i class="ni ni-basket text-orange"></i> <?php echo e(__('Orders')); ?>

            </a>
        </li>
        <?php endif; ?>
    <?php endif; ?>

        <?php if(config('app.isft')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/live">
                <i class="ni ni-basket text-success"></i> <?php echo e(__('Live Orders')); ?><div class="blob red"></div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('drivers.index')); ?>">
                <i class="ni ni-delivery-fast text-pink"></i> <?php echo e(__('Drivers')); ?>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('clients.index')); ?>">
                <i class="ni ni-single-02 text-blue"></i> <?php echo e(__('Clients')); ?>

            </a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurants.index')); ?>">
                <i class="ni ni-shop text-info"></i>  <?php echo e(__('Restaurants')); ?>

            </a>
        </li>
        
        <?php if(config('settings.multi_city')): ?>
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('cities.index')); ?>">
                <i class="ni ni-building text-orange"></i> <?php echo e(__('Cities')); ?>

            </a>
        </li> -->
        <?php endif; ?>
       <!--  <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/categorylist')); ?>">
                <i class="fa fa-check-circle-o text-pink"></i> Category
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/verietybundlelist')); ?>">
            <i class="fa fa-cutlery" aria-hidden="true"></i> Variety Bundles
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/offerslist')); ?>">
            <i class="fa fa-tags text-orange" aria-hidden="true"></i> Offers
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('pages.index')); ?>">
                <i class="ni ni-ungroup text-info"></i> <?php echo e(__('Pages')); ?>

            </a>
        </li> -->
        <!-- <?php if(config('app.isft')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('reviews.index')); ?>">
                <i class="ni ni-diamond text-info"></i> <?php echo e(__('Reviews')); ?>

            </a>
        </li>
        <?php endif; ?> -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/chefreviewlist')); ?>">
            <i class="ni ni-diamond text-info"></i> <?php echo e(__('Reviews')); ?>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/websliderlist')); ?>">
                <i class="fa fa-picture-o text-success"></i> Web Slider
            </a>
        </li>        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/foodtypes')); ?>">
                <i class="fa fa-picture-o text-success"></i> Categories
            </a>
        </li>       
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/diets')); ?>">
                <i class="fa fa-picture-o text-success"></i> Diets
            </a>
        </li>     
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/packagingoptions')); ?>">
                <i class="fa fa-picture-o text-success"></i> Packaging Options
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/areas')); ?>">
                <i class="fa fa-picture-o text-success"></i> Areas
            </a>
        </li>
        <?php if(config('settings.enable_pricing')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('plans.index')); ?>">
                <i class="ni ni-credit-card text-orange"></i> <?php echo e(__('Pricing plans')); ?>

            </a>
        </li>
        <?php endif; ?>
        <!-- <?php if(config('app.ordering')&&config('settings.enable_finances_admin')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('finances.admin')); ?>">
                <i class="ni ni-money-coins text-blue"></i> <?php echo e(__('Finances')); ?>

            </a>
        </li>
        <?php endif; ?> -->
        
        <!-- <?php if(config('settings.app_dev')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurant.banners.index')); ?>">
                <i class="ni ni-album-2 text-green"></i> <?php echo e(__('Banners')); ?>

            </a>
         </li>
         <?php endif; ?>
        <?php if(config('app.isqrsaas')): ?>
            <?php if(config('settings.is_whatsapp_ordering_mode')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.landing')); ?>">
                    <i class="ni ni-html5 text-green"></i> <?php echo e(__('Landing Page')); ?>

                </a>
            </li>
            <?php endif; ?>
        <li class="nav-item">
            <?php
                $theLocaleToOpen=strtolower(config('settings.app_locale'));
                if( strtolower(session('applocale_change')).""!=""){
                    $theLocaleToOpen=strtolower(session('applocale_change'));
                }
                
            ?>
            <a class="nav-link" target="_blank" href="<?php echo e(url('/admin/languages')."/".$theLocaleToOpen."/translations".(config('app.isqrsaas')?"?group=qrlanding":"")); ?>">
                <i class="ni ni-world text-orange"></i><?php echo e(__('Translations')); ?>

            </a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" target="_blank" href="<?php echo e(url('/admin/languages')."/".strtolower(config('settings.app_locale'))."/translations"); ?>">
                <i class="ni ni-world text-orange"></i> <?php echo e(__('Translations')); ?>

            </a>
            
        </li>
        <?php endif; ?> 
        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('settings.index')); ?>">
                <i class="ni ni-settings text-black"></i> <?php echo e(__('Site Settings ')); ?>

            </a>
        </li> -->

        <?php if(!config('settings.hideApps')): ?>
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('apps.index')); ?>">
                    <i class="ni ni-spaceship text-red"></i> <?php echo e(__('Apps')); ?>

                </a>
            </li> -->
        <?php endif; ?>

        
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('settings.cloudupdate')); ?>">
                <i class="ni ni-cloud-download-95 text-blue"></i> <?php echo e(__('Updates')); ?>

            </a>
        </li> -->
</ul>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/layouts/navbars/menus/admin.blade.php ENDPATH**/ ?>