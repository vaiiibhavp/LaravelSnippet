<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card shadow">
  <div class="card-header border-0">
    <form method="GET">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0"><?php echo e(__('Orders')); ?></h3>
        </div>
        <div class="col-4 text-right">
          <button id="show-hide-filters" class="btn btn-icon btn-1 btn-sm btn-outline-secondary" type="button"> <span class="btn-inner--icon"><i id="button-filters" class="ni ni-bold-down"></i></span> </button>
        </div>
      </div>
      <br/>
      <div class="tab-content orders-filters">
        <div class="row">
          <div class="col-12 mb-3">
            <div class="filterbtn-div rightchart"> <a class="btn btn-light" href="?fromDate=<?=date('Y-m-d', strtotime(' -30 days'))?>&toDate=<?=date('Y-m-d')?>" >Last 30 Days</a> <a class="btn btn-light" href="?fromDate=<?=date('Y-m-d', strtotime(' -7 days'))?>&toDate=<?=date('Y-m-d')?>" >Last 7 Days</a> <a class="btn btn-light" href="?fromDate=<?=date('Y-m-d')?>&toDate=<?=date('Y-m-d')?>" >Today's</a> </div>
          </div>
          <div class="col-md-6">
            <div class="input-daterange datepicker row align-items-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label"><?php echo e(__('Date From')); ?></label>
                  <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span> </div>
                    <input name="fromDate" class="form-control" placeholder="<?php echo e(__('Date from')); ?>" type="text" <?php if(isset($_GET['fromDate'])){echo 'value="'.$_GET['fromDate'].'"';} ?> >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label"><?php echo e(__('Date to')); ?></label>
                  <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span> </div>
                    <input name="toDate" class="form-control" placeholder="<?php echo e(__('Date to')); ?>" type="text"  <?php if(isset($_GET['toDate'])){echo 'value="'.$_GET['toDate'].'"';} ?>>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="restorant">Filter by Area</label>
              <select class="form-control select2" name="order_area">
                <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                
                                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                <option <?php if(isset($_GET['order_area'])&&$_GET['order_area'].""==$area->id.""){echo "selected";} ?>   value="<?php echo e($area->id); ?>"><?php echo e($area->area_name); ?></option>
                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="restorant"><?php echo e(__('Filter by Restaurant')); ?></label>
              <select class="form-control select2" name="restorant_id">
                <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                
                                        <?php $__currentLoopData = $restorants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restorant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                <option <?php if(isset($_GET['restorant_id'])&&$_GET['restorant_id'].""==$restorant->id.""){echo "selected";} ?> value="<?php echo e($restorant->id); ?>"><?php echo e($restorant->name); ?></option>
                
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
              </select>
            </div>
          </div>
          <?php endif; ?>
          <?php if(config('app.isft')): ?>
          <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="client"><?php echo e(__('Filter by Client')); ?></label>
              <select class="form-control select2" id="blabla" name="client_id">
                <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                <option  <?php if(isset($_GET['client_id'])&&$_GET['client_id'].""==$client->id.""){echo "selected";} ?>  value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
              </select>
            </div>
          </div>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="driver"><?php echo e(__('Filter by Driver')); ?></label>
              <select class="form-control select2" name="driver_id">
                <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                
                                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                <option <?php if(isset($_GET['driver_id'])&&$_GET['driver_id'].""==$driver->id.""){echo "selected";} ?>   value="<?php echo e($driver->id); ?>"><?php echo e($driver->name); ?></option>
                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
              </select>
            </div>
          </div>
          <?php endif; ?>    
          <?php else: ?>
          <?php endif; ?> 
          <!--<div class="col-md-3">--> 
          <!--    <div class="form-group">--> 
          <!--        <label class="form-control-label" for="driver">Order Type</label>--> 
          <!--        <select class="form-control select2" name="order_type">--> 
          <!--            <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>--> 
          <!--                <option value="SINGLE">Single Order</option>--> 
          <!--                <option value="MEAL">Meal Order</option>--> 
          <!--                <option value="VARIETY BUNDLE">Vaiety Bundle Order</option>--> 
          <!--        </select>--> 
          <!--    </div>--> 
          <!--</div>--> 
          
        </div>
        <div class="col-md-12 offset-md-12">
          <div class="row"> 
            <!-- <?php if($parameters): ?>
                                    <div class="col-md-4">
                                        <a href="<?php echo e(Request::url()); ?>" class="btn btn-md btn-block"><?php echo e(__('Clear Filters')); ?></a>
                                    </div>
                                    <div class="col-md-4">
                                    <a href="<?php echo e(Request::fullUrl()."&report=true"); ?>" class="btn btn-md btn-success btn-block"><?php echo e(__('Download report')); ?></a>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-8"></div>
                                <?php endif; ?> --> 
            <!-- <div class="col-md-4"> --> 
            <!-- <a href="" class="btn btn-md btn-block"><?php echo e(__('Clear Filters')); ?></a> --> 
            <!-- </div> -->
            <div class="nav-wrapper ">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="res_menagment" role="tablist">
                <li class="nav-item"> <a class="nav-link mb-sm-3 mb-md-0 active" onclick="showhideorders('single')" id="tabs-menagment-main" data-toggle="tab" role="tab" aria-controls="tabs-menagment" aria-selected="true"><i class="ni ni-badge mr-2"></i><?php echo e(__('SINGLE')); ?></a> </li>
                <li class="nav-item"> <a class="nav-link mb-sm-3 mb-md-0 " onclick="showhideorders('meal')" id="tabs-menagment-main" data-toggle="tab" role="tab" aria-controls="tabs-menagment" aria-selected="true"><i class="ni ni-square-pin mr-2"></i><?php echo e(__('MEAL')); ?></a> </li>
                <li class="nav-item"> <a class="nav-link mb-sm-3 mb-md-0 " onclick="showhideorders('variety')" id="tabs-menagment-main" data-toggle="tab" role="tab" aria-controls="tabs-menagment" aria-selected="true"><i class="ni ni-square-pin mr-2"></i><?php echo e(__('VARIETY BUNDLE')); ?></a> </li>
                <li class="nav-item"> 
                  <!-- <?php echo e(Request::fullUrl().'&report=true'); ?> --> 
                  <a href="/orders?order_report=true" class="btn btn-md btn-success btn-block"><?php echo e(__('Orders report')); ?></a> </li>
                <li class="nav-item"> <a href="/orders?sales_report=true" class="btn btn-md btn-success btn-block"><?php echo e(__(' Sales report')); ?></a> </li>
                <li class="nav-item">
                  <button type="submit" class="btn btn-primary btn-md btn-block"><?php echo e(__('Filter')); ?></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-12"> <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
  <?php if(count($orders)): ?> 
  <?php if(isset($financialReport)): ?>
  <?php echo $__env->make('finances.financialdisplay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif(config('app.isqrsaas')): ?>
  <?php echo $__env->make('orders.partials.orderdisplay_local', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php else: ?>
  <div id="singleorders" class="tab-div active">
    <div class="table-responsive">
      <table class="table align-items-center data-table">
        <?php echo $__env->make('orders.partials.orderdisplay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </table>
    </div>
    <div class="card-footer py-4"> <?php if(count($orders)): ?>
      <!-- <nav class="d-flex justify-content-end" aria-label="..."> <?php echo e($orders->appends(Request::all())->links()); ?> </nav> -->
      <?php else: ?>
      <h4><?php echo e(__('You don`t have any orders')); ?> ...</h4>
      <?php endif; ?> </div>
  </div>
  <div id="mealorders" class="tab-div">
    <div class="table-responsive">
      <table class="table align-items-center data-table">
        <?php echo $__env->make('orders.partials.mealorderdisplay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </table>
    </div>
    <div class="card-footer py-4"> <?php if(count($mealorders)): ?>
      <!-- <nav class="d-flex justify-content-end" aria-label="..."> <?php echo e($mealorders->appends(Request::all())->links()); ?> </nav> -->
      <?php else: ?>
      <h4><?php echo e(__('You don`t have any mealorders')); ?> ...</h4>
      <?php endif; ?> </div>
  </div>
  <div id="varietyorders" class="tab-div">
    <div class="table-responsive">
      <table class="table align-items-center data-table">
        <?php echo $__env->make('orders.partials.varietyorderdisplay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </table>
    </div>
    <div class="card-footer py-4"> <?php if(count($varietyorders)): ?>
      <!-- <nav class="d-flex justify-content-end" aria-label="..."> <?php echo e($varietyorders->appends(Request::all())->links()); ?> </nav> -->
      <?php else: ?>
      <h4><?php echo e(__('You don`t have any varietyorders')); ?> ...</h4>
      <?php endif; ?> </div>
  </div>
  <?php endif; ?>       
  
  <?php endif; ?> </div>
<script type="text/javascript">

showhideorders('single');
    function showhideorders(ordertype) {
        if(ordertype == 'meal'){
            $('#singleorders').removeClass('active');
            $('#varietyorders').removeClass('active');
            $('#mealorders').addClass('active');
        }
        if(ordertype == 'single'){
            $('#singleorders').addClass('active');
            $('#mealorders').removeClass('active');
            $('#varietyorders').removeClass('active');
        }
        if(ordertype == 'variety'){
            $('#singleorders').removeClass('active');
            $('#mealorders').removeClass('active');
            $('#varietyorders').addClass('active');
        }
    }
	
	$(document).ready(function () {
		$('.data-table').DataTable( {
		  // ====== responsive: true =======
		  language: {
		  paginate: {
		  next: '<i class="glyphicon glyphicon-chevron-right"></i>',
		  previous: '<i class="glyphicon glyphicon-chevron-left"></i>'  
		  }
		  },
		  "order": [[ 0, "desc" ]]
		  
		  });
	});
</script><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/orders/partials/ordercard.blade.php ENDPATH**/ ?>