<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('offers.partials.header', ['title' => 'Edit Offers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
  <div class="row">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
                <div class="col-8">
              <h3 class="mb-0">Offers Management</h3>
            </div>
                <div class="col-4 text-right"> <a href="<?php echo e(url('/offerslist')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a> </div>
              </div>
        </div>
            <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Offer Informantion</h6>
          <div class="pl-lg-4">
          <form method="post" action="/offersupdate" autocomplete="off" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
              <div class="row mb-4">
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Title</label>
                  <input type="text" name="offer_title" id="name" class="form-control form-control-alternative" value="<?php echo e($offer->offer_title); ?>" placeholder="Enter Offer Title ..."  required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Offer Code</label>
                  <input type="text" name="offer_code" id="name" class="form-control form-control-alternative" placeholder="Enter code ..." value="<?php echo e($offer->offer_code); ?>" required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Min. Order </label>
                  <input type="text" name="min_order" id="name" class="form-control form-control-alternative val" val="num" placeholder="Enter min order ..." value="<?php echo e($offer->min_order); ?>"  required autofocus>
                   </div>
              </div>
               <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="discount_per">Discount %</label>
                  <input type="number" name="discount_per" id="discount_per" class="form-control form-control-alternative val min_discount" val="num min_char-0 max_digit-2" placeholder="Enter discount percentage ..." value="<?php echo e($offer->discount_per); ?>"  autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Flat Discount (Rs.) </label>
                  <input type="number" name="max_discount" id="name" class="form-control form-control-alternative val max_discount" val="num min_char-0 max_digit-2 " placeholder="Enter max disccount ..." value="<?php echo e($offer->max_discount); ?>"  required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Offer Start Date</label>
                  <input type="date" name="offer_valid_from" id="name" class="form-control form-control-alternative" placeholder="" value="<?php echo e($offer->offer_valid_from); ?>" required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label" for="name">Offer End Date</label>
                    <input type="date" name="offer_valid" id="name" class="form-control form-control-alternative"  value="<?php echo e($offer->offer_valid); ?>"  required autofocus>
                   </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="name">Offer For Chef</label>
                  <select class="selectpicker delselect2 form-control" title="Please Select" multiple="multiple" name="chef_id[]">
                  <option disabled  value> Select</option>
                  <?php foreach ($chefs as $chef): ?>
                  <option value="<?php echo e($chef['id']); ?>" 
                  <?php if ($chef['id'] == $offer->chef_id ) {
                    echo "selected";
                  } ?> 
                  ><?php echo e($chef['name']); ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>                                  
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label class="form-control-label" for="name">Check for all Chefs</label>
                  <br/>
                  <input type="checkbox" name="all_chefs" value="1"
                  <?php if ($offer->chef_id == "all") {
                    echo "checked";
                  } ?> 
                  >
                </div>                                  
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="name">Offer For Customer</label>
                  <select class="selectpicker delselect2 form-control" title="Please Select" multiple="multiple" name="customer_id[]">
                  <option disabled  value> Select</option>
                  <?php foreach ($customers as $customer): ?>
                  <option value="<?php echo e($customer['id']); ?>"
                  <?php if ($customer['id'] == $offer->customer_id ) {
                    echo "selected";
                  } ?> 
                  ><?php echo e($customer['name']); ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>  

               <div class="col-md-2">
                <div class="form-group">
                  <label class="form-control-label" for="name">Check for all Customers</label>
                  <br/>
                  <input type="checkbox" name="all_customers" value="1" 
                  <?php if ($offer->customer_id == "all") {
                    echo "checked";
                  } ?> 
                  >
                </div>                                  
              </div>

              <?php
                $images=[
                    ['name'=>'offer_image','label'=>__('Offer Image'),'value'=>asset('storage/'.$offer->offer_image),'style'=>'width: 200px; height: 100px;']
                ]
                ?>
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4">
                    <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
              <div class="col-12">
                <div class="form-group">
                  <label class="form-control-label">Offer Description</label>
                  <textarea  class="form-control form-control-alternative" rows="4" cols="50" name="offer_description"><?php echo e($offer->offer_description); ?></textarea>
                  <input type="hidden" name="id" value="<?php echo e($offer->id); ?>" >
                </div>           
              </div>
               
                <div class="pl-lg-4">
                <div class="text-center">
              <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
            </div>
            </div>
            </div>
              </form>
        </div>
          </div>
    </div>
      </div>
</div>

</div>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('js'); ?> 
<script type="text/javascript">
  $('.min_discount').keyup(function(){
    $('.max_discount').val('');
  });

  $('.max_discount').blur(function(){
    max_dis = $('.max_discount').val();
    min_dis = $('.min_discount').val();

    if(max_dis < min_dis)
    {
      $('.max_discount').val('');
      alert('Max discount should be greater than min discount')
    }
  });



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Offers')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/offers/edit.blade.php ENDPATH**/ ?>