<?php $order_type = ''; ?>
<?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver')): ?>
    <?php if(auth()->user()->hasRole('admin')): ?>
        <script>
        function setSelectedOrderId(id,ordertype){
            $("#form-assing-driver").attr("action", "updatestatus/assigned_to_driver/"+id);
             $("#ot").val(ordertype);
        }
        </script>
    <td>           
    <?php if ($order->order_type == "SINGLE") { 
        $order_type  = "SINGLE";
        ?>
    <?php if ($order->delivery_status == "CHEF_PENDING") { ?>
        <a href="/change_order_status/CHEF_ACCEPTED/<?php echo e($order->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
        <a href="/change_order_status/CHEF_REJECTED/<?php echo e($order->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
    <?php }elseif(($order->delivery_status == "CHEF_ACCEPTED" ||  $order->delivery_status == "DRIVER_REJECTED" ) && ($order->delivery_status != "DRIVER_ACCEPTED"  )) { ?>
      <?php if(strtotime(date('Y-m-d',strtotime($order->created_at))) <= strtotime(date('Y-m-d')) ){ ?>
        <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId(<?=$order->id?>,'S'))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
      <?php } ?>
     <?php }else{ ?>
        <small><?php echo e(__('No actions for you right now!')); ?></small>
     <?php } ?> 
 <?php }elseif($order->orderdetails->order_type == 'MEAL'){
 $order_type = 'MEAL';
  ?>
    <?php 
	if ($order->status == "Open") { ?>
        <a href="/change_meal_order_status/CHEF_ACCEPTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
        <a href="/change_meal_order_status/CHEF_REJECTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
    <?php }elseif ($order->status == "Re-Scheduled") { ?>
        <a href="/change_meal_order_status/Re-Scheduled/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
        <a href="/change_meal_order_status/Re-Scheduled_Rejected/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
    <?php }elseif(($order->status == "CHEF_ACCEPTED" ||  $order->delivery_status == "DRIVER_REJECTED" ) && ($order->status != "DRIVER_ACCEPTED" || $order->status != "DELIVERED"  )) { ?>
      <?php if(strtotime(date('Y-m-d',strtotime($order->meal_date))) <= strtotime(date('Y-m-d')) ){ ?>
        <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId(<?=$order->id?>,'M'))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
      <?php } ?>
     <?php }else{ ?>
        <small><?php echo e(__('No actions for you right now!')); ?></small>
     <?php } ?> 
 <?php }else{
        $order_type = 'VARIETY BUNDLE'; 
          if ($order->status == "Open") { ?>
            <a href="/change_variety_order_status/CHEF_ACCEPTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
            <a href="/change_variety_order_status/CHEF_REJECTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
        <?php }elseif(($order->status == "CHEF_ACCEPTED" ||  $order->delivery_status == "DRIVER_REJECTED" ) && ($order->status != "DRIVER_ACCEPTED" || $order->status != "DELIVERED"  )) { ?>
          <?php if(strtotime(date('Y-m-d',strtotime($order->variety_date))) <= strtotime(date('Y-m-d')) ){ ?>
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId(<?=$order->id?>,'V'))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
          <?php } ?>
         <?php }else{ ?>
            <small><?php echo e(__('No actions for you right now!')); ?></small>
         <?php } ?>
    <?php }  ?>
    </td>
    <?php endif; ?>
	

    <?php if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver')): ?>
    <td>
        <!-- <?php echo $__env->make('orders.partials.actions.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    <?php 
    if ($order->order_type == "SINGLE") { 
        $order_type  = "SINGLE";
    ?>
    <?php if ($order->delivery_status == "CHEF_PENDING") { ?>
        <a href="/change_order_status/CHEF_ACCEPTED/<?php echo e($order->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
        <a href="/change_order_status/CHEF_REJECTED/<?php echo e($order->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
    <?php }elseif($order->delivery_status == "DRIVER_ACCEPTED"){ ?>
         <a href="/change_order_status/PREPARED/<?php echo e($order->id); ?>" class="btn btn-primary btn-sm order-action"><?php echo e(__('Mark Prepared')); ?></a>
    <?php }else{ ?>
        <small><?php echo e(__('No actions for you right now!')); ?></small>
    <?php } ?>
    <?php }elseif($order->orderdetails->order_type == 'MEAL'){
     $order_type = 'MEAL';
      ?>
      <!-- =========================== -->
     <?php  if ($order->status == "Open") { ?>
         <a href="/change_meal_order_status/CHEF_ACCEPTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
        <a href="/change_meal_order_status/CHEF_REJECTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
    <?php }elseif($order->status == "DRIVER_ACCEPTED"){ ?>
         <a href="/change_meal_order_status/PREPARED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-primary btn-sm order-action"><?php echo e(__('Mark Prepared')); ?></a>
    <?php }else{ ?>
        <small><?php echo e(__('No actions for you right now!')); ?></small>
    <?php } ?>
      <!-- ========================== -->
    <?php }else{
        $order_type = 'VARIETY BUNDLE';
    ?>
          <!-- =========================== -->
     <?php  if ($order->status == "Open") { ?>
        <a href="/change_variety_order_status/CHEF_ACCEPTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
        <a href="/change_variety_order_status/CHEF_REJECTED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
    <?php }elseif($order->status == "DRIVER_ACCEPTED"){ ?>
         <a href="/change_variety_order_status/PREPARED/<?php echo e($order->id); ?>/<?php echo e($order->orderdetails->id); ?>" class="btn btn-primary btn-sm order-action"><?php echo e(__('Mark Prepared')); ?></a>
    <?php }else{ ?>
        <small><?php echo e(__('No actions for you right now!')); ?></small>
    <?php } ?>
      <!-- ========================== -->
    <?php }  ?> 
    </td>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/orders/partials/actions/table.blade.php ENDPATH**/ ?>