<div class="card-body">
  <h6 class="heading-small text-muted mb-3"><?php echo e(__('Restaurant information')); ?></h6>
  <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="box-com">
    <h3 class="mb-3"><?php echo e($order->restorant->name); ?></h3>
    <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> Address -</small><?php echo e($order->restorant->address); ?></p>
    <p><small><i class="fa fa-phone" aria-hidden="true"></i> Phone Number -</small><?php echo e($order->restorant->phone); ?></p>
    <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Email -</small><?php echo e($order->restorant->user->name.", ".$order->restorant->user->email); ?></p>
  </div>
  <hr class="my-4" />
  <?php if(config('app.isft')): ?>
  <h6 class="heading-small text-muted mb-3"><?php echo e(__('Client Information')); ?></h6>
  <div class="box-com">
    <h3><?php echo e($order->client->name); ?></h3>
    <p><small><i class="fa fa-envelope" aria-hidden="true"></i> Email -</small><?php echo e($order->client->email); ?></p>
    <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> Address -</small><?php echo e($order->address?$order->address->address:""); ?></p>
    <?php if(!empty($order->address->apartment)): ?>
    <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(__("Apartment number")); ?>:</small> <?php echo e($order->address->apartment); ?></p>
    <?php endif; ?>
    <?php if(!empty($order->address->entry)): ?>
    <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(__("Entry number")); ?>:</small> <?php echo e($order->address->entry); ?></p>
    <?php endif; ?>
    <?php if(!empty($order->address->floor)): ?>
    <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(__("Floor")); ?>:</small> <?php echo e($order->address->floor); ?></p>
    <?php endif; ?>
    <?php if(!empty($order->address->intercom)): ?>
    <p><small><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(__("Intercom")); ?>:</small> <?php echo e($order->address->intercom); ?></p>
    <?php endif; ?>
    <?php if(!empty($order->client->phone)): ?> <br/>
    <p><small><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e(__('Contact')); ?>:</small> <?php echo e($order->client->phone); ?></p>
    <?php endif; ?> </div>
  <hr class="my-4" />
  <?php else: ?>
  <?php endif; ?>
 
  <?php if($order->order_type == 'SINGLE'): ?>
  <h6 class="heading-small text-muted mb-3">Single Order</h6>
  <div class="box-com mb-3">
    <?php
$currency = config('settings.cashier_currency');
$convert = config('settings.do_convertion');
?>
    <p class="mb-3"><small>Order Items</small></p>
    <ul id="order-items">
      <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
$theItemPrice = ($item->pivot->variant_price ? $item->pivot->variant_price : $item->price);
?>
      <li>
        <h4><?php echo e($item->pivot->qty." X ".$item->name); ?> -  <?php echo money($theItemPrice, $currency,$convert); ?>  =  ( <?php echo money($item->pivot->qty*$theItemPrice, $currency,true); ?> )
          <?php if(auth()->check() && auth()->user()->hasRole('admin|driver|owner')): ?>
          <?php if($item->pivot->vatvalue>0): ?>) <span class="small">-- <?php echo e(__('VAT ').$item->pivot->vat."%: "); ?> ( <?php echo money($item->pivot->vatvalue, $currency,$convert); ?> )</span> <?php endif; ?>
          <?php endif; ?> </h4>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <?php endif; ?>
 
  <?php if($order->order_type == 'MEAL'): ?>
  <h6 class="heading-small text-muted mb-3">Meal Subscription Order</h6>
  <div class="box-com mb-3">
     <?php 
     // echo'<pre>';print_r($itemsdata);echo'</pre>';
        $jmealdata = json_decode($mealdata[0]->meal_data); ?>
      <div class="row">           
            <!-- <div class="col-lg-4 col-md-6 col-12"> -->
                <!-- <p class="mb-1"><small>Frequency</small></p> -->
                <!-- <h4>Daily</h4> -->
            <!-- </div> -->
            <div class="col-lg-4 col-md-6 col-12">
                <p class="mb-1"><small>Recharge / Top up</small></p>
                <h4><?php echo $jmealdata->recharges?> Deliveries</h4>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <p class="mb-1"><small>Start Date</small></p>
                <h4>
                <?php 
                // $firstdate =  json_decode($jmealdata->dates); 
                // foreach($firstdate as $key => $unused) {
                      echo date('d M Y',strtotime($itemsdata['0']->meal_date));
                      // break;
                  // }
                // echo $firstKey = array_key_first($firstdate) ; 
                ?>                  
                </h4>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-12">
                <p class="mb-1"><small>Occasion</small></p>
                <h4>Lunch</h4>
            </div> -->
      </div>
      <div class="row">
          <div class="col col-12">
          <p class="mb-1"><small>Meal Description</small></p>
          <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Driver</th>
                          <th scope="col">Status</th>
                          <!-- <th>Remark</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if (count($itemsdata) > 0) {
                        foreach ($itemsdata as $key => $meald) { 
						
						$status_class = 'text-success';
						if($meald->status == 'Re-Scheduled')
						{
							$status_class = 'text-warning';
							
						}
						else if($meald->status == 'CHEF_REJECTED')
						{
							$status_class = 'text-danger';
						}
						?>
                        <tr>
                          <td><?=date('d M Y', strtotime($meald->meal_date))?></td>
                          <td><?php echo e($meald->driver_name); ?></td>
                          <td class="<?php echo e($status_class); ?>"><?php echo e(str_replace('_',' ',$meald->status == 'Open'?'PENDING':$meald->status)); ?></td>
                          <!-- <td>Lorem ipsum, dolor sit</td> -->
                        </tr>
                        <?php } ?>
                        <?php } ?>
                                              
                      </tbody>
                    </table>
                  </div>
          </div>

      </div>
      
  </div>
  <?php endif; ?>
 <?php if($order->order_type == 'VARIETY BUNDLE'): ?>
  <?php  
  if (count($varietydata)>0) {
    $jvdata = json_decode($varietydata[0]->variety_bundlesData); 
  } ?>
  <h6 class="heading-small text-muted mb-3">Variety Bundles</h6>
  <div class="box-com mb-3">
     <?php  
  if (count($varietydata)>0) { ?>
      <div class="row">
            <!-- <div class="col-12">
                <p class="mb-1"><small>Order Items</small></p>
                <h4>1 x Wild Wild West - ₹8.99 = ( ₹8.99 ) ) </h4>
            </div> -->
            <div class="col-lg-4 col-md-6 col-12">
                <p class="mb-1"><small>Start Date</small></p>
                <h4><?php echo date('d M Y',strtotime($jvdata->variety_bundles_start_date)) ?></h4>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <p class="mb-1"><small>Total Days</small></p>
                <h4><?php echo $jvdata->total_days?></h4>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <p class="mb-1"><small>Total Chef</small></p>
                <h4><?php echo $jvdata->total_days?></h4>
            </div>
      </div>
<?php  } ?>
      <div class="row">
          <div class="col col-12">
          <p class="mb-1"><small>Variety Bundles Description</small></p>
          <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Date</th>
                          <th>Order Items</th>
                          <th scope="col">Driver</th>
                          <th scope="col">Chef</th>
                          <th scope="col">Status</th>                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php foreach ($itemsdata as $key => $varietyd) { ?>
                        <tr>
                          <td><?php echo date('d M Y',strtotime($varietyd->variety_date)) ?></td>
                          <td><?php echo e($varietyd->food_items); ?></td>
                          <td><?php echo e($varietyd->driver_name); ?></td>
                          <td><?php echo e($varietyd->restorant_name); ?></td>
                          <td class="text-success"><?php echo e(str_replace('_',' ',$varietyd->status == 'Open'?'PENDING':$varietyd->status)); ?></td>
                        </tr> 
                        <?php } ?>                   
                      </tbody>
                    </table>
                  </div>
          </div>

      </div>
      
  </div>
  <?php endif; ?>
    <h6 class="heading-small text-muted mb-3">Other Order Details</h6>
    <div class="box-com mb-3">
    <?php if(!empty($order->comment)): ?>
    <h4><?php echo e(__('Comment')); ?>: <?php echo e($order->comment); ?></h4>
    <?php endif; ?>
    <?php if(strlen($order->phone)>2): ?>
    <p><small><?php echo e(__('Phone')); ?>:</small> <?php echo e($order->phone); ?></>
      <?php endif; ?>    

    <h4>Offers: <span> <?php echo e($order->applied_coupan); ?></span></h4>
    <br />
    <?php if(!empty($order->time_to_prepare)): ?> <br/>
    <p>
      </h4>
      <br/>
      <?php endif; ?>    
    <h4><?php echo e(__("Sub Total")); ?>: <?php echo e($order->subtotal); ?></h4>
    <!-- <h4>Charges : <i class="fa fa-inr" aria-hidden="true"></i>0.00</h4> -->
    <?php if(config('app.isft')): ?>
    <h4><?php echo e(__("Delivery")); ?>: <?php echo e($order->delivery_price); ?></h4>
    <?php endif; ?>
    <h4>Total Discount : <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($order->total_discount); ?></h4>
    <hr />
    <h3><?php echo e(__("TOTAL")); ?>: <?php echo e($order->order_price); ?></h3>
  </div>
  <div class="box-com mb-3">
    <p><small><?php echo e(__("Payment method")); ?>:</small> <?php echo e(__(strtoupper($order->payment_method))); ?></p>
    <p><small><?php echo e(__("Payment status")); ?>:</small> <?php echo e(__(ucfirst($order->payment_status))); ?></p>
    <?php if($order->payment_status=="unpaid"&&strlen($order->payment_link)>5): ?>
    <button onclick="location.href='<?php echo e($order->payment_link); ?>'" class="btn btn-success"><?php echo e(__('Pay now')); ?></button>
    <?php endif; ?> </div>
  <div class="box-com"> <?php if(config('app.isft') || config('app.iswp')): ?>
    <?php else: ?>
    <?php endif; ?>    
   </div>
</div>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/orders/partials/orderinfo.blade.php ENDPATH**/ ?>