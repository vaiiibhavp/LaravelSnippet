<?php if(config('app.ordering')): ?>
    <h6 class="heading-small text-muted mb-4"><?php echo e(__('Orders')); ?></h6>


    <?php echo $__env->make('partials.fields',['fields'=>[
        ['required'=>true,'ftype'=>'input','type'=>'number','placeholder'=>"Minimum order",'name'=>'Minimum order', 'additionalInfo'=>'Enter Minimum order value', 'id'=>'minimum', 'value'=>$restorant->minimum],
        ['required'=>true,'ftype'=>'select','placeholder'=>"",'name'=>'Average order prepare time in minutes', 'id'=>'custom[time_to_prepare_order_in_minutes]','data'=>[30=>30,60=>60,90=>90,120=>120,150=>150,180=>180,210=>210,240=>240,270=>270,300=>300,330=>330,360=>360],'value'=>$restorant->getConfig('time_to_prepare_order_in_minutes',config('settings.time_to_prepare_order_in_minutes'))]
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
            <?php endif; ?>
            <!-- <label class="form-control-label">Before Time</label> -->
            <!-- <br/> -->
            <!-- <input type="time" class="form-control" value="<?php echo e(date('H:i',strtotime($restorant->before_time))); ?>" name="before_time" /> --><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/restorants/partials/ordering.blade.php ENDPATH**/ ?>