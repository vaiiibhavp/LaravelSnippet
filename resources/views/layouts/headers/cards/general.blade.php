<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body"> 
      <!-- Card stats -->
      <div class="row">
         @if(auth()->user()->hasRole('admin'))
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">               
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Order Completed</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">{{ $last30daysOrders?:0 }}</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">{{$last7daysOrders?:0}}</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">{{$todaysOrders?:0}}</span></p>
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
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">@money( $last30daysOrdersValue, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">@money ($last7daysOrdersValue, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">@money ($todaysOrdersValue, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> <i class="fas fa-chart-line"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        @endif
        @if(auth()->user()->hasRole('admin'))
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Delivery Fees Collected</h5>
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">@money($last30daysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">@money($last7daysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">@money($todaysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>   
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
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">@money($last30dayscommission, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">@money($last7dayscommission, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">@money($todayscommission, config('settings.cashier_currency'),config('settings.do_convertion'))</span></p>   
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-blue text-white rounded-circle shadow"> <i class="fas fa-percentage"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        @endif


        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body"> @if(auth()->user()->hasRole('admin'))
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">{{ __('Number of restaurants') }}</h5>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">{{ $last7daysRestorant }} {{ __('restaurants') }}</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">{{ $todaysRestorant }} {{ __('restaurants') }}</span></p>
                  <p class="dashboard-span"><small>Total Register -</small><span class="h2 font-weight-bold mb-0">{{ $countItems}} {{ __('restaurants') }}</span></p>    
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow"> <i class="fas fa-utensils"></i> </div>
                </div> -->
              </div>
              @endif
              @if(auth()->user()->hasRole('owner'))
              <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-2">Chef Income</h5>
                    <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">₹{{$last30daysOrdersValue}}</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">₹{{$last7daysOrdersValue}}</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">₹{{$todaysOrdersValue}}</span></p>
                  </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow"> <i class="fas fa-folder"></i> </div>
                </div> -->
              </div>
              @endif </div>
          </div>
        </div>
        
        <!-- <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Views') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $allViews }} {{ __('views') }}</span>
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
        @if(auth()->user()->hasRole('admin'))
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">Number of Customers</h5>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">{{$last7daysusers}}</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">{{$todaysusers}}</span></p>
                  <p class="dashboard-span"><small>Total Register -</small><span class="h2 font-weight-bold mb-0">{{$totalusers}}</span></p>     
                </div>
                <!-- <div class="col-auto">
                  <div class="icon icon-shape bg-indigo text-white rounded-circle shadow"> <i class="fas fa-user"></i> </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        @endif 
        
        @if(auth()->user()->hasRole('owner'))
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-2">New Customers</h5>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">{{$last7daysclients}}</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">{{$todaysclients}}</span></p>
                  <p class="dashboard-span"><small>Total Register -</small><span class="h2 font-weight-bold mb-0">
                  {{$uniqueUsersOrders}}</span></p>    
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
                  <p class="dashboard-span"><small>Last 30 Days -</small><span class="h2 font-weight-bold mb-0">{{$last30daysRepeat}}</span></p>
                  <p class="dashboard-span"><small>Last 7 Days -</small><span class="h2 font-weight-bold mb-0">{{$last7daysRepeat}}</span></p>
                  <p class="dashboard-span"><small>Today's -</small><span class="h2 font-weight-bold mb-0">{{$todaysRepeat}}</span></p>     
                </div>
                
              </div>
            </div>
          </div>
        </div>
        @endif
        
        </div>
      <br/>
      @if(auth()->user()->hasRole('admin'))
      @if(config('app.isft')) 
      <!-- <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Delivery Fee') }} ( 30 {{ __('days') }} )</h5>
                                        <span class="h2 font-weight-bold mb-0"> @money($last30daysDeliveryFee, config('settings.cashier_currency'),config('settings.do_convertion'))</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Static Fee') }} ( 30 {{ __('days') }} )</h5>
                                        <span class="h2 font-weight-bold mb-0">@money($last30daysStaticFee, config('settings.cashier_currency'),config('settings.do_convertion'))</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Dynamic Fee') }} ( 30 {{ __('days') }} )</h5>
                                        <span class="h2 font-weight-bold mb-0">@money($last30daysDynamicFee, config('settings.cashier_currency'),config('settings.do_convertion'))</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Total Fee') }} ( 30 {{ __('days') }} )</h5>
                                        <span class="h2 font-weight-bold mb-0">@money(( $last30daysTotalFee != null ? $last30daysTotalFee:0), config('settings.cashier_currency'),config('settings.do_convertion'))</span>
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
      @endif
      @endif </div>
  </div>
</div>
