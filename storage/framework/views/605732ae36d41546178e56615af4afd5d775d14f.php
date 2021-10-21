<br />
<h6 class="heading-small text-muted mb-4"><?php echo e(__('WhatsApp number')); ?></h6>
<!-- Whatsapp phone -->
<?php echo $__env->make('partials.fields',['fields'=>[
    ['required'=>false,'ftype'=>'input','name'=>'Whatsapp phone', 'editclass'=>'val', 'val'=>'nomand mobile min_char-9 max_digit-10', 'placeholder'=>'Whatsapp phone to receive orders on', 'id'=>'whatsapp_phone', 'value'=>$restorant->whatsapp_phone],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  <?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/restorants/partials/waphone.blade.php ENDPATH**/ ?>