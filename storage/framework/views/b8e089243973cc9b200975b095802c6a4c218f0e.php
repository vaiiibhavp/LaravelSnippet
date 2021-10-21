<thead class="thead-light">
  <tr>
    <th scope="col"><?php echo e(__('ID')); ?></th>
    <th scope="col"><?php echo e(__('Last status')); ?></th>
    <?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver')): ?>
    <th scope="col"><?php echo e(__('Actions')); ?></th>
    <?php endif; ?>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
    <th scope="col"><?php echo e(__('Restaurant')); ?></th>
    <?php endif; ?>
    <th class="table-web" scope="col">Area</th>
    <th class="table-web" scope="col">Created </th>
    <!-- <th class="table-web" scope="col">Created Time</th> -->
    <th class="table-web" scope="col">Delivery Date</th>
    <!-- <th class="table-web" scope="col"><?php echo e(__('Time Slot')); ?></th> -->
    <!-- <th class="table-web" scope="col"><?php echo e(__('Method')); ?></th> -->
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
    <th class="table-web" scope="col"><?php echo e(__('Client')); ?></th>
    <?php endif; ?>
    <!-- <?php if(auth()->user()->hasRole('admin')): ?>
    <th class="table-web" scope="col"><?php echo e(__('Address')); ?></th>
    <?php endif; ?> -->
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
    <th class="table-web" scope="col"><?php echo e(__('Driver')); ?></th>
    <?php endif; ?>
    <th class="table-web" scope="col">Offer</th>
    <th class="table-web" scope="col">Gross sales value</th>
    <?php if(auth()->user()->hasRole('admin')): ?>
    <th class="table-web" scope="col">Commission</th>
    <th class="table-web" scope="col"><?php echo e(__('Delivery')); ?></th>
    <?php endif; ?>
    </tr>
</thead>
<tbody>
<?php if(auth()->user()->hasRole('admin')): ?>

<?php $__currentLoopData = $reschedule_mealorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reschedule_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if ($reschedule_order->status == 'Open') { ?>
<?php if(!empty($reschedule_order->orderdetails)): ?>
<tr>
  <td><a class="btn badge badge-success badge-pill" href="<?php echo e(route('orders.show',$reschedule_order->orderdetails->id )); ?>">#<?php echo e($reschedule_order->orderdetails->id); ?></a></td>
  <td>
    <?php if ($reschedule_order->status == 'Open') {
      echo "RE-SCHEDULE PENDING";
	  $reschedule_order->status = 'Re-Scheduled';
    }else{
      echo str_replace('_',' ',$reschedule_order->status);
    } ?>
  </td>
  <?php echo $__env->make('orders.partials.actions.table',['order' => $reschedule_order ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <th scope="row"> <div class="media align-items-center"> 
      <div class="media-body"> <span class="mb-0 text-sm"><?php echo e($reschedule_order->restorant->name?:''); ?></span> </div>
    </div>
  </th>
   <td class="table-web"><?php echo e($reschedule_order->orderdetails->order_area !=0? $reschedule_order->orderdetails->area->area_name:''); ?></td>
  <td class="table-web"> <?php echo e($reschedule_order->created_at->format(config('settings.datetime_display_format'))); ?></td>
  <td class="table-web"> <?php echo e(date('d M Y',strtotime($reschedule_order->meal_date))); ?></td>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
  <td class="table-web"> <?php echo e($reschedule_order->orderdetails->client->name); ?> </td>
  <?php endif; ?>
  <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
  <td class="table-web"> <?php echo e(!empty($reschedule_order->driver->name) ? $reschedule_order->driver->name : ""); ?> </td>
  <?php endif; ?>
  <td class="table-web"><?php echo e(!empty($reschedule_order->orderdetails->applied_coupan) ? $reschedule_order->applied_coupan : ""); ?></td>
  <td class="table-web"> <?php echo money($reschedule_order->orderdetails->order_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?> </td>
  <?php if(auth()->user()->hasRole('admin')): ?>
  <td class="table-web"><?php echo money($reschedule_order->orderdetails->comission, config('settings.cashier_currency'),config('settings.do_convertion')); ?></td>
  <td class="table-web"> <?php echo money($reschedule_order->orderdetails->delivery_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?> </td>
  <?php endif; ?>
</tr>
<?php endif; ?>
<?php } ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php // echo'<pre>';print_r($mealorders);echo'</pre>'; ?>
<?php $__currentLoopData = $mealorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if(!empty($order->orderdetails)): ?>
<tr>
  <td>
  <input type="hidden" value="<?php echo date('Y-m-d'); ?>">
  <a class="btn badge badge-success badge-pill" href="<?php echo e(route('orders.show',$order->orderdetails->id )); ?>">#<?php echo e($order->orderdetails->id); ?></a></td>
  <td>
    <?php if ($order->status == 'Open') {
      echo "PENDING";
    }else{
      echo str_replace('_',' ',$order->status);
    } ?>
  </td>
  <?php echo $__env->make('orders.partials.actions.table',['order' => $order ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <th scope="row"> <div class="media align-items-center"> 
      <div class="media-body"> <span class="mb-0 text-sm"><?php echo e($order->restorant->name?:''); ?></span> </div>
    </div>
  </th>
   <td class="table-web"><?php echo e($order->orderdetails->order_area !=0? $order->orderdetails->area->area_name:''); ?></td>
  <td class="table-web"> <?php echo e($order->created_at->format(config('settings.datetime_display_format'))); ?></td>
  <td class="table-web"> <?php echo e(date('d M Y',strtotime($order->meal_date))); ?></td>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
  <td class="table-web"> <?php echo e($order->orderdetails->client->name); ?> </td>
  <?php endif; ?>
  <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
  <td class="table-web"> <?php echo e(!empty($order->driver->name) ? $order->driver->name : ""); ?> </td>
  <?php endif; ?>
  <td class="table-web"><?php echo e(!empty($order->orderdetails->applied_coupan) ? $order->applied_coupan : ""); ?></td>
  <td class="table-web"> <?php echo money($order->orderdetails->order_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?> </td>
  <?php if(auth()->user()->hasRole('admin')): ?>
  <td class="table-web"><?php echo money($order->orderdetails->comission, config('settings.cashier_currency'),config('settings.do_convertion')); ?></td>
  <td class="table-web"> <?php echo money($order->orderdetails->delivery_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?> </td>
  <?php endif; ?>
</tr>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/orders/partials/mealorderdisplay.blade.php ENDPATH**/ ?>