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
    <th class="table-web" scope="col">Order Type</th>
    <!-- <th class="table-web" scope="col"><?php echo e(__('Method')); ?></th> -->
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
    <th class="table-web" scope="col"><?php echo e(__('Client')); ?></th>
    <?php endif; ?>
    <!-- <?php if(auth()->user()->hasRole('admin')): ?>
    <th class="table-web" scope="col"><?php echo e(__('Address')); ?></th>
    <?php endif; ?> -->
    <?php if(auth()->user()->hasRole('owner')): ?>
    <th class="table-web" scope="col"><?php echo e(__('Items')); ?></th>
    <?php endif; ?>
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

<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
  <td><a class="btn badge badge-success badge-pill" href="<?php echo e(route('orders.show',$order->id )); ?>">#<?php echo e($order->id); ?></a></td>
  <!-- <td> <?php echo $__env->make('orders.partials.laststatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </td> -->
  <td>
    <?php if ($order->delivery_status == 'CHEF_PENDING') {
      echo "PENDING";
    }else{
      echo str_replace('_',' ',$order->delivery_status);
    } ?>
  </td>
  <?php echo $__env->make('orders.partials.actions.table',['order' => $order ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
  <th scope="row"> <div class="media align-items-center"> <!--<a class="avatar-custom mr-3"> <img class="rounded" alt="..." src=<?php echo e($order->restorant->icon); ?>> </a>-->
      <div class="media-body"> <span class="mb-0 text-sm"><?php echo e($order->restorant->name); ?></span> </div>
    </div>
  </th>
  <?php endif; ?>
  <td class="table-web"><?php echo e($order->order_area !=0? $order->area->area_name:''); ?></td>
  <!-- <td class="table-web"> <?php echo e($order->created_at->format(config('settings.datetime_display_format'))); ?></td> -->
  <td class="table-web"> <?php echo e($order->order_date?:''); ?> </td>
  <td class="table-web"> <?php echo e(date('d M Y',strtotime($order->created_at))); ?> </td>
  <!-- <td class="table-web"> <?php echo e($order->time_formated); ?> </td> -->
  <td class="table-web">  <?php echo e($order->order_type); ?> </td>
  <!-- <td class="table-web"><span class="badge badge-primary badge-pill"><?php echo e($order->getExpeditionType()); ?></span></td> -->
  
  <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
  <td class="table-web"> <?php echo e($order->client->name); ?> </td>
  <?php endif; ?>
  <!-- <?php if(auth()->user()->hasRole('admin')): ?>
  <td class="table-web"> <?php echo e($order->address?$order->address->address:""); ?> </td>
  <?php endif; ?> -->
  <?php if(auth()->user()->hasRole('owner')): ?>
  <td class="table-web"> <?php echo e(count($order->items)); ?> </td>
  <?php endif; ?>
  <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
  <td class="table-web"> <?php echo e(!empty($order->driver->name) ? $order->driver->name : ""); ?> </td>
  <?php endif; ?>
  <td class="table-web"><?php echo e(!empty($order->applied_coupan) ? $order->applied_coupan : ""); ?></td>
  <td class="table-web"> <?php echo money($order->order_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?> </td>
  <?php if(auth()->user()->hasRole('admin')): ?>
  <td class="table-web"><?php echo money($order->comission, config('settings.cashier_currency'),config('settings.do_convertion')); ?></td>
  <td class="table-web"> <?php echo money($order->delivery_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?> </td>
  <?php endif; ?>
   </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/orders/partials/orderdisplay.blade.php ENDPATH**/ ?>