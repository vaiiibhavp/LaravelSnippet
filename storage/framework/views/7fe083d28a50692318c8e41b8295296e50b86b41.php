<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Menu')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
  $begin = new DateTime(date('Y-m-d'));
  $end = new DateTime(date('Y-m-d',strtotime('today + 15 days')));
  $interval = DateInterval::createFromDateString('1 day');
  $period = new DatePeriod($begin, $interval, $end);
?>
<?php echo $__env->make('items.partials.modals', ['restorant_id' => $restorant_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4"> 
        <!--<div class="col-lg-6 col-7">
                </div>-->
        <div class="col-lg-12 col-12 text-right"> <?php if(isset($hasMenuPDf)&&$hasMenuPDf): ?> <a target="_blank" href="<?php echo e(route('menupdf.download')); ?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> <?php echo e(__('PDF Menu')); ?></a> <?php endif; ?>
          <?php $restaurantstatus = Auth::user()->restorant->status; ?>
          <?php if($restaurantstatus == 0 ): ?>
          <button class="btn btn-icon btn-1 btn-sm btn-info" type="button" data-toggle="modal" data-target="#modal-items-category"> <span class="btn-inner--icon"><i class="fa fa-plus"></i> Add Occasion</span> </button>
          <?php endif; ?>
          <?php if($canAdd): ?>
          <!-- <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-import-items" onClick=(setRestaurantId(<?php echo e($restorant_id); ?>))> <span class="btn-inner--icon"><i class="fa fa-file-excel"></i> <?php echo e(__('Import from CSV')); ?></span> </button> -->
          <?php endif; ?>
          <?php if(config('settings.enable_miltilanguage_menus')): ?>
          <?php echo $__env->make('items.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?> </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--7">
<div class="row">
  <div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0"> 
        <!-- <div class="row align-items-center"> --> 
        <!-- <div class="col-12"> --> 
        <!-- <div class="row"> --> 
        <!-- <div class="col"> --> 
        <!-- <h3 class="mb-0"><?php echo e(__('Restaurant Menu Management')); ?> <?php if(config('settings.enable_miltilanguage_menus')): ?> (<?php echo e($currentLanguage); ?>) <?php endif; ?></h3> --> 
        <!-- </div> --> 
        <!-- <div class="col-auto">  --> 
        <!--<button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add new category')); ?>">
                    <span class="btn-inner--icon"><i class="fa fa-plus"></i> <?php echo e(__('Add new category')); ?></span>
                </button>
                <?php if($canAdd): ?>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-items" onClick=(setRestaurantId(<?php echo e($restorant_id); ?>))>
                        <span class="btn-inner--icon"><i class="fa fa-file-excel"></i> <?php echo e(__('Import from CSV')); ?></span>
                    </button>
                <?php endif; ?>
                <?php if(config('settings.enable_miltilanguage_menus')): ?>
                    <?php echo $__env->make('items.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>--> 
        <!-- </div> --> 
        <!-- </div> --> 
        <!-- </div> --> 
        <!-- </div> --> 
        <!-- </div> --> 
        <br/>
        <div class="col-12"> <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
        <div class="card-body"> 
          <!-- <?php if(count($categories)==0): ?> --> 
          <!--   <div class="col-lg-3" > <a data-toggle="modal" data-target="#modal-items-category">
                <div class="card"> <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-primary text-uppercase">Select Occasion</h3>
                    </div>
                </div>
                 </a> <br />
            </div> --> 
          <!-- <?php endif; ?> -->
          
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row menu_cust_ul" id="res_menagment" role="tablist">
              <li class="nav-item"> <a class="nav-link mb-sm-3 mb-md-0 active " id="tabs-singleorder-main" data-toggle="tab" href="#singleorder" role="tab" aria-controls="tabs-menagment" aria-selected="true"><i class="fas fa-utensils"></i> Single Order</a> </li>
              <li class="nav-item"> <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-meal-main" data-toggle="tab" href="#mealsubscription" role="tab" aria-controls="tabs-menagment" aria-selected="true"><i class="fas fa-clipboard"></i> Meal subscription</a> </li>
            </ul>
          </div>
          <div class="tab-content" id="tabs">
            <div class="tab-pane fade show active" id="singleorder" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
              <div class="detailfil_div mb-4">
                <div class="swiper-container swiper1">
                  <div class="swiper-wrapper"> 
                    <!-- get next 15 days from today -->
                    <?php  foreach ($period as $dt) { ?>
                    <div class="swiper-slide"> 
                    <!-- <a href="javascript:void(0);"><small> -->
                       <?//=$dt->format("d - M")?>
                      <!-- </small></a> -->
                      <div class="form-check checkbox-filterdiv">
                        <input class="form-check-input btn-check" type="radio" name="currentdate" id="current_date<?=$dt->format("Y-m-d")?>" value="<?=$dt->format("Y-m-d")?>" <?=$dt->format("Y-m-d")==$current_date?'checked':''?>>
                        <label class="form-check-label label-check" for="current_date<?=$dt->format("Y-m-d")?>">
                          <?=$dt->format("d - M")?>
                        </label>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="swiper-button-next-uniq swiper_btn"><i class="fas fa-angle-right"></i></div>
                <div class="swiper-button-prev-uniq swiper_btn"><i class="fas fa-angle-left"></i></div>
              </div>
              <?php foreach ($single_packages as $index => $category): ?>
              <?php if($category->active == 1): ?>
              <div class="alert alert-default">
                <div class="row">
                  <div class="col"> <span class="h1 font-weight-bold mb-0 text-white"><?php echo e($category->meal_title); ?></span> </div>
                </div>
              </div>
              <?php endif; ?>
              <?php if($category->active == 1): ?>
              <div class="row justify-content-center">
                <div class="col-lg-12">
                  <div class="row row-grid"> <?php $__currentLoopData = $category->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3">
                      <a  data-toggle="modal" data-target="#modal-new-item<?php echo e($item->id); ?>" href="javascript:void(0);"  title="Edit Product">
                      <div class="card">
                       <img class="card-img-top"  src="<?php echo e(asset('storage/'.$item->image)); ?>" alt="...">
                        <div class="card-body">
                          <h3 class="card-title text-primary text-uppercase"><?php echo e($item->name); ?></h3>
                          <?php $des = substr($item->description, 0,40);?>
                          <p class="card-text description mt-3"><?php echo e($des); ?></p>
                          <span class="badge badge-primary badge-pill"><?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                          <p class="mt-3 mb-0 text-sm"> <?php if($item->available == 1): ?> <span class="text-success mr-2"><?php echo e(__("AVAILABLE")); ?></span> <?php else: ?> <span class="text-danger mr-2"><?php echo e(__("UNAVAILABLE")); ?></span> <?php endif; ?> </p>
                        </div>
                      </div>
                      </a>
					  <button class="btn" data-toggle="modal" data-target="#modal-duplicate-item<?php echo e($item->id); ?>" href="javascript:void(0);"  title="Create Duplicate">Create Duplicate</button>
                    </div>

 <div class="modal fade" id="modal-new-item<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Edit item')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
            <form role="form" method="post" action="/itemupdate" enctype="multipart/form-data" autocomplete="off">
              <?php echo csrf_field(); ?>
              <div class="row">
              
                  <div class="col-md-12 col-12">
                  <div class="form-group">
                      <input type="date" class="form-control" value="<?php echo e($item->meal_date); ?>" name="meal_date" required>
                    </div>
                  </div>
                   <input type="hidden" name="id" value="<?php echo e($item->id); ?>" >
                    <input type="hidden" name="meal_type" value="single" >
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="diet_id" required>
                      <option disabled selected value> Select Veg & Non-Veg</option>
                       <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($diet['id']); ?>"
                      <?php if($diet['id'] == $item->diet_id){echo "selected";} ?>
                      ><?php echo e($diet['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
              </div>
              
              <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_name" id="item_name" placeholder="<?php echo e(__('Item name')); ?> ..." type="text" value="<?php echo e($item->name); ?>" required>
                <?php if($errors->has('item_name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_name')); ?></strong> </span> <?php endif; ?> </div>
				
			<div class="form-group<?php echo e($errors->has('delivered_by') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="delivered_by" id="delivered_by" placeholder="<?php echo e(__('Delivery By')); ?> ..." type="text" value="<?php echo e($item->delivered_by); ?>">
                <?php if($errors->has('delivered_by')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('delivered_by')); ?></strong> </span> <?php endif; ?> </div>
				
				
              <div class="form-group<?php echo e($errors->has('item_description') ? ' has-danger' : ''); ?>">
                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="<?php echo e(__('Item description')); ?> ..." required><?php echo e($item->description); ?></textarea>
                <?php if($errors->has('item_description')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_description')); ?></strong> </span> <?php endif; ?> </div>
              <div class="form-group<?php echo e($errors->has('item_price') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_price" id="item_price" placeholder="<?php echo e(__('Item Price')); ?> ..." type="number" step="any" value="<?php echo e($item->price); ?>" required>
                <?php if($errors->has('item_price')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_price')); ?></strong> </span> <?php endif; ?> </div>

                <div class="form-group">
                  <label class="form-control-label">Before Time</label>
                <input class="form-control form_time" name="before_time" id="before_time" placeholder="<?php echo e(__('Before Time')); ?> ..." type="text" step="any"  data-val="<?php echo e($item->before_date==''?$item->meal_date:date('Y-m-d',strtotime($item->before_date)).' '. date('H:i',strtotime($item->before_time))); ?>" required>
                <?php if($errors->has('before_time')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('before_time')); ?></strong> </span> <?php endif; ?> </div>

                <div class="form-group<?php echo e($errors->has('available') ? ' has-danger' : ''); ?>">
                <input name="available" id="available"  type="radio"  value="1" <?=$item->available==1?'checked':''?> > Available
                <input name="available" id="available"  type="radio"  value="0" <?=$item->available==0?'checked':''?>> Unavailable
               </div>



              <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="item_image"><?php echo e(__('Item Image')); ?></label>
                <div class="text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> <img src="<?php echo e(asset('storage/'.$item->image)); ?>" width="200px" height="150px" alt="..."/> </div>
                    <div> <span class="btn btn-outline-secondary btn-file"> <span class="fileinput-new"><?php echo e(__('Select image')); ?></span> <span class="fileinput-exists"><?php echo e(__('Change')); ?></span>
                      <input type="file" name="item_image" accept="image/x-png,image/gif,image/jpeg">
                      </span> <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput"><?php echo e(__('Remove')); ?></a> </div>
                  </div>
                </div>
              </div>
              <input name="category_id" value="<?php echo e($category->id); ?>" type="hidden" required>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4"><?php echo e(__('Save')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!--create single duplicate-->
<div class="modal fade" id="modal-duplicate-item<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Duplicate item')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
            <form role="form" method="post" action="<?php echo e(route('items.store')); ?>" enctype="multipart/form-data" autocomplete="off">
            <!--<form role="form" method="post" action="/itemupdate" enctype="multipart/form-data" autocomplete="off">-->
              <?php echo csrf_field(); ?>
              <div class="row">
				<div class="col-md-12 col-12">
					<div class="form-group">
						<select class="form-control form-control-alternative select-width" name="occassion_id">
							<option disabled selected value> Select Occasion Type</option>
							<?php $__currentLoopData = $mealtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mealtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($mealtype['id']); ?>"  <?php echo ($category->id == $mealtype['id']) ? 'Selected' : ''; ?>><?php echo e($mealtype['title']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					
					<input name="category_id" value="<?php echo e($category->id); ?>" type="hidden" required>
					<input name="og_item_id" value="<?php echo e($item->id); ?>" type="hidden" required>
                </div>
              
                  <div class="col-md-12 col-12">
					
					<div class="form-group">
                      <input type="text" class="form-control multidate" value="<?php echo e($item->meal_date); ?>" name="meal_date" placeholder="Pick the multiple dates" required>
                    </div>

                  </div>
                   <input type="hidden" name="id" value="<?php echo e($item->id); ?>" >
                    <input type="hidden" name="meal_type" value="single" >
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="diet_id" required>
                      <option disabled selected value> Select Veg & Non-Veg</option>
                       <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($diet['id']); ?>"
                      <?php if($diet['id'] == $item->diet_id){echo "selected";} ?>
                      ><?php echo e($diet['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
              </div>
              
              <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_name" id="item_name" placeholder="<?php echo e(__('Item name')); ?> ..." type="text" value="<?php echo e($item->name); ?>" required>
                <?php if($errors->has('item_name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_name')); ?></strong> </span> <?php endif; ?> </div>
				
			<div class="form-group<?php echo e($errors->has('delivered_by') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="delivered_by" id="delivered_by" placeholder="<?php echo e(__('Delivered By i.e 8 - 9 PM')); ?> ..." type="text" value="<?php echo e($item->delivered_by); ?>">
                <?php if($errors->has('delivered_by')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('delivered_by')); ?></strong> </span> <?php endif; ?> </div>
				
				
              <div class="form-group<?php echo e($errors->has('item_description') ? ' has-danger' : ''); ?>">
                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="<?php echo e(__('Item description')); ?> ..." required><?php echo e($item->description); ?></textarea>
                <?php if($errors->has('item_description')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_description')); ?></strong> </span> <?php endif; ?> </div>
              <div class="form-group<?php echo e($errors->has('item_price') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_price" id="item_price" placeholder="<?php echo e(__('Item Price')); ?> ..." type="number" step="any" value="<?php echo e($item->price); ?>" required>
                <?php if($errors->has('item_price')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_price')); ?></strong> </span> <?php endif; ?> </div>

                <div class="form-group">
                  <label class="form-control-label">Before Time</label>
                <input class="form-control form_time" name="before_time" id="before_time" placeholder="<?php echo e(__('Before Time')); ?> ..." type="text" step="any"  data-val="<?php echo e($item->before_date==''?$item->meal_date:date('Y-m-d',strtotime($item->before_date)).' '. date('H:i',strtotime($item->before_time))); ?>" required>
                <?php if($errors->has('before_time')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('before_time')); ?></strong> </span> <?php endif; ?> </div>

                <div class="form-group<?php echo e($errors->has('available') ? ' has-danger' : ''); ?>">
                <input name="available" id="available"  type="radio"  value="1" <?=$item->available==1?'checked':''?> > Available
                <input name="available" id="available"  type="radio"  value="0" <?=$item->available==0?'checked':''?>> Unavailable
               </div>



              <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="item_image"><?php echo e(__('Item Image')); ?></label>
                <div class="text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> <img src="<?php echo e(asset('storage/'.$item->image)); ?>" width="200px" height="150px" alt="..."/> </div>
                    <div> <span class="btn btn-outline-secondary btn-file"> <span class="fileinput-new"><?php echo e(__('Select image')); ?></span> <span class="fileinput-exists"><?php echo e(__('Change')); ?></span>
                      <input type="file" name="item_image" accept="image/x-png,image/gif,image/jpeg">
                      </span> <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput"><?php echo e(__('Remove')); ?></a> </div>
                  </div>
                </div>
              </div>

              <input name="duplicate_item" value="1" type="hidden" required>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4"><?php echo e(__('Save Duplicate')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <script>
                          function setSelectedCategoryId(id){
                              $('#category_id').val(id);
                               $('#scategory_id').val(id);
                          }
                          function setRestaurantId(id){
                              $('#res_id').val(id);
                          }
                      </script>
                       <?php if($restaurantstatus == 0 ): ?>
                    <div class="col-lg-3" > <a   data-toggle="modal" data-target="#modal-new-item" href="javascript:void(0);" onclick=(setSelectedCategoryId(<?php echo e($category->id); ?>))>
                      <div class="card"> <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                        <div class="card-body">
                          <h3 class="card-title text-primary text-uppercase"><?php echo e(__('Add item')); ?></h3>
                        </div>
                      </div>
                      </a> <br />
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <!-- ======== Meal Subscription Tab ====== -->
            <div class="tab-pane fade show" id="mealsubscription" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
              <?php foreach ($meal_packages as $index => $mcategory): ?>
              <?php if($mcategory->active == 1): ?>
              <div class="alert alert-default">
                <div class="row">
                  <div class="col"> <span class="h1 font-weight-bold mb-0 text-white"><?php echo e($mcategory->meal_title); ?></span> </div>
                </div>
              </div>
              <?php endif; ?>
              <?php if($mcategory->active == 1): ?>
              <div class="row justify-content-center">
                <div class="col-lg-12">
                  <div class="row row-grid"> <?php $__currentLoopData = $mcategory->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3">
                      <a  data-toggle="modal" data-target="#modal-meal-item<?php echo e($item->id); ?>" href="javascript:void(0);"  title="Edit Product">
                      <div class="card"> <img class="card-img-top" src="<?php echo e(asset('storage/'.$item->image)); ?>" alt="...">
                        <div class="card-body">
                          <h3 class="card-title text-primary text-uppercase"><?php echo e($item->name); ?></h3>
                            <?php $des = substr($item->description, 0,40);?>
                          <p class="card-text description mt-3"><?php echo e($des); ?></p>
                          <span class="badge badge-primary badge-pill"><?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                          <p class="mt-3 mb-0 text-sm"> <?php if($item->available == 1): ?> <span class="text-success mr-2"><?php echo e(__("AVAILABLE")); ?></span> <?php else: ?> <span class="text-danger mr-2"><?php echo e(__("UNAVAILABLE")); ?></span> <?php endif; ?> </p>
                        </div>
                      </div>
                    </a>
                    </div>

<!-- add meal item -->
<div class="modal fade" id="modal-meal-item<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Edit item')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
            <form role="form" method="post" action="/itemupdatemeal" enctype="multipart/form-data" autocomplete="off">
              <?php echo csrf_field(); ?>
              <div class="row">
                 <input type="hidden" name="id" value="<?php echo e($item->id); ?>" >
                  <input type="hidden" name="meal_type" value="meal" >
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="diet_id" required>
                      <option disabled selected value> Select Veg & Non-Veg</option>
                       <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($diet['id']); ?>"  <?php if($diet['id'] == $item->diet_id){echo "selected";} ?> ><?php echo e($diet['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="frequency">
                      <option disabled selected value> Select Frequency</option>
                      <?php $__currentLoopData = $frequencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frequency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($frequency['id']); ?>" <?php if($frequency['id'] == $item->frequency){echo "selected";} ?> ><?php echo e($frequency['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 col-12">
                    <?php 
                    $delivs = array();
                    // if($item->meal_date != '0000-00-00'){
                      if ($item->deliveries != null || $item->deliveries != '') {
                        $delivs =  json_decode($item->deliveries);
                        // print_r($delivs);
                      }   
                    // }                 
                    ?>
                    <div class="form-group">
                      <select class="selectpicker delselect2 form-control" title="Please Select" multiple="multiple" id="del_select" name="deliveries[]">
                      <?php $__currentLoopData = $recharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recharge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($recharge['id']); ?>"  
                      <?php
                       //if(in_array($recharge['id'], $delivs)){ echo "selected"; }
                       ?>
                      ><?php echo e($recharge['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
              </div>
              
              <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_name" id="item_name" placeholder="<?php echo e(__('Item name')); ?> ..." type="text" value="<?php echo e($item->name); ?>" required>
                <?php if($errors->has('item_name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_name')); ?></strong> </span> <?php endif; ?> </div>

              <div class="form-group<?php echo e($errors->has('item_description') ? ' has-danger' : ''); ?>">
                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="<?php echo e(__('Item description')); ?> ..." required>
                  <?php echo e($item->description); ?>

                </textarea>
                <?php if($errors->has('item_description')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_description')); ?></strong> </span> <?php endif; ?> </div>

              <div class="form-group<?php echo e($errors->has('item_price') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_price" id="item_price" value="<?php echo e($item->price); ?>" placeholder="<?php echo e(__('Item Price')); ?> ..." type="number" step="any" required>
                <?php if($errors->has('item_price')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_price')); ?></strong> </span> <?php endif; ?> </div>

                <div class="form-group">
                  <label class="form-control-label">Before Time</label>
                <input class="form-control" name="before_time" id="before_time" placeholder="<?php echo e(__('Before Time')); ?> ..." type="time" step="any"  data-val="<?php echo e($item->before_date==''?$item->meal_date:date('Y-m-d',strtotime($item->before_date)).' '. date('H:i',strtotime($item->before_time))); ?>"  required>
                <?php if($errors->has('before_time')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('before_time')); ?></strong> </span> <?php endif; ?> </div>

              <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="item_image"><?php echo e(__('Item Image')); ?></label>
                <div class="text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> <img src="<?php echo e(asset('storage/'.$item->image)); ?>" width="200px" height="150px" alt="..."/> </div>
                    <div> <span class="btn btn-outline-secondary btn-file"> <span class="fileinput-new"><?php echo e(__('Select image')); ?></span> <span class="fileinput-exists"><?php echo e(__('Change')); ?></span>
                      <input type="file" name="item_image" accept="image/x-png,image/gif,image/jpeg">
                      </span> <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput"><?php echo e(__('Remove')); ?></a> </div>
                  </div>
                </div>
              </div>
              <input name="category_id" value="<?php echo e($item->package_id); ?>" type="hidden" required>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4"><?php echo e(__('Save')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php if($restaurantstatus == 0 ): ?>
                    <div class="col-lg-3" > <a   data-toggle="modal" data-target="#modal-meal-item" href="javascript:void(0);" onclick=(setSelectedCategoryId(<?php echo e($mcategory->id); ?>))>
                      <div class="card"> <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                        <div class="card-body">
                          <h3 class="card-title text-primary text-uppercase"><?php echo e(__('Add item')); ?></h3>
                        </div>
                      </div>
                      </a> <br />
                    </div>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?> 
<script>
let cdate = '<?=$current_date?>';
  $('.multidate').datepicker({
    // "setDate": new Date(),
    multidate: true,
    format: 'dd-mm-yyyy',
    startDate: new Date(),
    todayBtn: true,
    todayHighlight: true,
  }).datepicker("setDate", new Date(cdate));



  $("[data-target='#modal-edit-category']").click(function() {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');


    //$('#cat_id').val(id);
    $('#cat_name').val(name);
    $("#form-edit-category").attr("action", "/categories/"+id);
});

var swiper1 = new Swiper('.swiper1', {
	  slidesPerView: 9,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next-uniq',
        prevEl: '.swiper-button-prev-uniq',
      },
	  breakpoints: {
        1024: {
          slidesPerView: 8,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 6,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
        320: {
          slidesPerView: 4,
          spaceBetween: 10,
        }
      }
    });

$('input[type=radio][name=currentdate]').change(function(){
      var cdate = $(this).val();
      window.location = 'http://fdadmin.prometteur.in/public/items/'+cdate;
  });
//$('#del_select').multiSelect()

/*$(document).ready(function () {
  $('#before_time').datetimepicker();
})*/

$(document).ready(function() {
  
  $('.form_time').datetimepicker({
  format: 'yyyy-mm-dd hh:ii',
  startView:1,
  minView:0,
  maxView:1,
  autoclose: true,
  minuteStep:10,
  todayHighlight:true,
  });

  setTimeout(
  function() 
  {
    $('.form_time').each(function(){
      $(this).val($(this).data('val'));
    })
  }, 2000);
  
  });


</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Restaurant Menu Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/items/index.blade.php ENDPATH**/ ?>