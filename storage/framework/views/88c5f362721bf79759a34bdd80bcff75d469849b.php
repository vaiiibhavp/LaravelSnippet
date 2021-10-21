<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body"> 
      <!-- Card stats -->
      <div class="row">
         <?php if(auth()->user()->hasRole('admin')): ?>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">               
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Order Completed</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last30daysOrders?:0); ?></span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last7daysOrders?:0); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo e($todaysOrders?:0); ?></span></p>
                </div>                
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow"> <i class="fas fa-shopping-basket"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Gross Sales Value</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo money($last30daysOrdersValue, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo money($last7daysOrdersValue, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo money($todaysOrdersValue, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> <i class="fas fa-chart-line"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('admin')): ?>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Delivery Fees Collected</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo money($last30daysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo money($last7daysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo money($todaysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>   
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow"> <i class="fas fa-truck"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Packaging Charges</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">₹800</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">₹300</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">₹150</span></p>   
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-purple text-white rounded-circle shadow"> <i class="fas fa-box-open"></i> </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Commission collected</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo money($last30dayscommission, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo money($last7dayscommission, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo money($todayscommission, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span></p>   
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-blue text-white rounded-circle shadow"> <i class="fas fa-percentage"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        <?php endif; ?>


        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body"> <?php if(auth()->user()->hasRole('admin')): ?>
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2"><?php echo e(__('Number of restaurants')); ?></h5>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last7daysRestorant); ?> <?php echo e(__('restaurants')); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo e($todaysRestorant); ?> <?php echo e(__('restaurants')); ?></span></p>
                  <p class="dashboard-span"><small>Total Register -</small><span class="h2 font-weight-bold mb-0"><?php echo e($countItems); ?> <?php echo e(__('restaurants')); ?></span></p>    
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow"> <i class="fas fa-utensils"></i> </div>
                </div> -->
              </div>
              <?php endif; ?>
              <?php if(auth()->user()->hasRole('owner')): ?>
              <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-2">Chef Income</h5>
                    <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">₹<?php echo e($last30daysOrdersValue); ?></span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">₹<?php echo e($last7daysOrdersValue); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">₹<?php echo e($todaysOrdersValue); ?></span></p>
                  </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow"> <i class="fas fa-folder"></i> </div>
                </div> -->
              </div>
              <?php endif; ?> </div>
          </div>
        </div>
        
        <!-- <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Views')); ?></h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo e($allViews); ?> <?php echo e(__('views')); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --> 
        <?php if(auth()->user()->hasRole('admin')): ?>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Number of Customers</h5>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last7daysusers); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo e($todaysusers); ?></span></p>
                  <p class="dashboard-span"><small>Total Register -</small><span class="h2 font-weight-bold mb-0"><?php echo e($totalusers); ?></span></p>     
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-indigo text-white rounded-circle shadow"> <i class="fas fa-user"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?> 
        
        <?php if(auth()->user()->hasRole('owner')): ?>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">New Customers</h5>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last7daysclients); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo e($todaysclients); ?></span></p>
                  <p class="dashboard-span"><small>Total Register -</small><span class="h2 font-weight-bold mb-0">
                  <?php echo e($uniqueUsersOrders); ?></span></p>    
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Repeat  Customers</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last30daysRepeat); ?></span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0"><?php echo e($last7daysRepeat); ?></span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0"><?php echo e($todaysRepeat); ?></span></p>     
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        
        </div>
      <br/>
      <?php if(auth()->user()->hasRole('admin')): ?>
      <?php if(config('app.isft')): ?> 
      <!-- <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Delivery Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"> <?php echo money($last30daysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Static Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money($last30daysStaticFee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Dynamic Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money($last30daysDynamicFee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Total Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money(( $last30daysTotalFee != null ? $last30daysTotalFee:0), config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> --> 
      <?php endif; ?>
      <?php endif; ?> </div>
  </div>
</div>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/layouts/headers/cards/general.blade.php ENDPATH**/ ?>