<!-- ADD Category -->

<div class="modal fade" id="modal-items-category" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-notification">Select Occasion</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="post" action="<?php echo e(route('items.addoccassion')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" value="<?php echo e($restorant_id); ?>"  name="restaurant_id" />
                  <div class="form-group">
                    <select class="form-control form-control-alternative select-width" name="order_type">
                    <option disabled selected value> Menu Order Type</option>
                    <option value="single">Single Order</option>
                    <option value="meal">Meal Subscription</option>
                    </select>
                    </div>
                  <div class="form-group">
                    <select class="form-control form-control-alternative select-width" name="occassion_id">
                    <option disabled selected value> Select Occasion Type</option>
                    <?php $__currentLoopData = $mealtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mealtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($mealtype['id']); ?>"><?php echo e($mealtype['title']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
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

<!-- EDIT Category -->
<div class="modal fade" id="modal-edit-category" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-notification">Edit Occasion</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" id="form-edit-category" method="post" action="">
              <?php echo csrf_field(); ?>
              <?php echo method_field('put'); ?>
              <input name="cat_id" id="cat_id" type="hidden" required>
              <div class="form-group">
                    <select class="form-control form-control-alternative select-width">
                    <option disabled selected value> Menu Order Type</option>
                    <option>Single Order</option>
                    <option>Meal Subscription</option>
                    </select>
                    </div>
              <div class="form-group<?php echo e($errors->has('category_name') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="category_name" id="cat_name" placeholder="<?php echo e(__('Category name')); ?> ..." type="text" required>
                <?php if($errors->has('category_name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('category_name')); ?></strong> </span> <?php endif; ?> </div>
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
<!-- add meal item -->
<div class="modal fade" id="modal-meal-item" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Add new item')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
            <form role="form" method="post" action="<?php echo e(route('items.store')); ?>" enctype="multipart/form-data" autocomplete="off">
              <?php echo csrf_field(); ?>
              <div class="row">
                <!--   <div class="col-md-6 col-12">
                  <div class="form-group">
                    <select class="form-control form-control-alternative select-width" name="foodtype_id" required>
                    <option disabled selected value> Select Category</option>
                    <?php $__currentLoopData = $food_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($food_type['id']); ?>"><?php echo e($food_type['title']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                  </div> -->
                  <input type="hidden" name="meal_type" value="meal" >
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="diet_id" required>
                      <option disabled selected value> Select Veg & Non-Veg</option>
                       <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($diet['id']); ?>"><?php echo e($diet['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="frequency">
                      <option disabled selected value> Select Frequency</option>
                      <?php $__currentLoopData = $frequencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frequency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($frequency['id']); ?>"><?php echo e($frequency['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <select class="selectpicker delselect2 form-control" title="Please Select" multiple="multiple" id="del_select" name="deliveries[]">
                      <?php $__currentLoopData = $recharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recharge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($recharge['id']); ?>"><?php echo e($recharge['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <!-- <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter Deliveries ..." value="" required autofocus> -->
                    </div>
                  </div>
              </div>
              
              <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_name" id="item_name" placeholder="<?php echo e(__('Item name')); ?> ..." type="text" required>
                <?php if($errors->has('item_name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_name')); ?></strong> </span> <?php endif; ?> </div>
              <div class="form-group<?php echo e($errors->has('item_description') ? ' has-danger' : ''); ?>">
                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="<?php echo e(__('Item description')); ?> ..." required></textarea>
                <?php if($errors->has('item_description')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_description')); ?></strong> </span> <?php endif; ?> </div>
              <div class="form-group<?php echo e($errors->has('item_price') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_price" id="item_price" placeholder="<?php echo e(__('Item Price')); ?> ..." type="number" step="any" required>
                <?php if($errors->has('item_price')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_price')); ?></strong> </span> <?php endif; ?> </div>

                <div class="form-group">
                  <label class="form-control-label">Before Time</label>
                <input class="form-control form_time" name="before_time" id="before_time" data-val="<?php echo e(date('Y-m-d').' '. date('H:i')); ?>" placeholder="<?php echo e(__('Before Time')); ?> ..." type="text" step="any" required>
                <?php if($errors->has('before_time')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('before_time')); ?></strong> </span> <?php endif; ?> </div>

              <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="item_image"><?php echo e(__('Item Image')); ?></label>
                <div class="text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> <img src="https://www.fastcat.com.ph/wp-content/uploads/2016/04/dummy-post-square-1-768x768.jpg" width="200px" height="150px" alt="..."/> </div>
                    <div> <span class="btn btn-outline-secondary btn-file"> <span class="fileinput-new"><?php echo e(__('Select image')); ?></span> <span class="fileinput-exists"><?php echo e(__('Change')); ?></span>
                      <input type="file" name="item_image" accept="image/x-png,image/gif,image/jpeg">
                      </span> <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput"><?php echo e(__('Remove')); ?></a> </div>
                  </div>
                </div>
              </div>
              <input name="category_id" id="scategory_id" type="hidden" required>
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

<!-- NEW Language -->
<div class="modal fade" id="modal-new-language" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-notification"><?php echo e(__('Add new language')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="post" action="<?php echo e(route('admin.restaurant.storenewlanguage')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" value="<?php echo e($restorant_id); ?>"  name="restaurant_id" />
              <?php echo $__env->make('partials.select', ['class'=>"col-12", 'classselect'=>"noselecttwo",'name'=>"Language",'id'=>"locale",'placeholder'=>__("Select Language"),'data'=>config('config.env')[2]['fields'][0]['data'],'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4"><?php echo e(__('Add new language')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-new-item" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Add new item')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-3 py-lg-3">
            <form role="form" method="post" action="<?php echo e(route('items.store')); ?>" enctype="multipart/form-data" autocomplete="off">
              <?php echo csrf_field(); ?>
              <div class="row">
              
                  <div class="col-md-12 col-12">
                  <div class="form-group">
                      <input type="text" class="form-control multidate" placeholder="Pick the multiple dates" name="meal_date" required>
                    </div>
                  </div>
               <!--    <div class="col-md-6 col-12">
                  <div class="form-group">
                    <select class="form-control form-control-alternative select-width" name="foodtype_id" required>
                    <option disabled selected value> Select Food Type</option>
                    <?php $__currentLoopData = $food_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($food_type['id']); ?>"><?php echo e($food_type['title']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                  </div> -->
                    <input type="hidden" name="meal_type" value="single" >
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width" name="diet_id" required>
                      <option disabled selected value> Select Veg & Non-Veg</option>
                       <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($diet['id']); ?>"><?php echo e($diet['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
<!-- 
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <select class="form-control form-control-alternative select-width">
                      <option disabled selected value> Select Frequency</option>
                      <option>Daily</option>
                      <option>Weekdays</option>
                      <option>Weekends</option>
                      </select>
                    </div>
                  </div> -->

                <!--   <div class="col-md-6 col-12">
                    <div class="form-group">
                      <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter Deliveries ..." value="" required autofocus>
                    </div>
                  </div> -->
              </div>
              
              <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_name" id="item_name" placeholder="<?php echo e(__('Item name')); ?> ..." type="text" required>
                <?php if($errors->has('item_name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_name')); ?></strong> </span> <?php endif; ?> </div>
				
			<div class="form-group<?php echo e($errors->has('delivered_by') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="delivered_by" id="delivered_by" placeholder="<?php echo e(__('Delivery By')); ?> ..." type="text" required>
                <?php if($errors->has('delivered_by')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('delivered_by')); ?></strong> </span> <?php endif; ?> </div>
				
				
              <div class="form-group<?php echo e($errors->has('item_description') ? ' has-danger' : ''); ?>">
                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="<?php echo e(__('Item description')); ?> ..." required></textarea>
                <?php if($errors->has('item_description')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_description')); ?></strong> </span> <?php endif; ?> </div>
              <div class="form-group<?php echo e($errors->has('item_price') ? ' has-danger' : ''); ?>">
                <input class="form-control" name="item_price" id="item_price" placeholder="<?php echo e(__('Item Price')); ?> ..." type="number" step="any" required>
                <?php if($errors->has('item_price')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('item_price')); ?></strong> </span> <?php endif; ?> </div>
                <div class="form-group">
                  <label class="form-control-label">Before Time</label>
                <input class="form-control form_time" name="before_time" id="before_time"  data-val="<?php echo e(date('Y-m-d').' '. date('H:i')); ?>" placeholder="<?php echo e(__('Before Time')); ?> ..." type="text" step="any" required>
                <?php if($errors->has('before_time')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('before_time')); ?></strong> </span> <?php endif; ?> </div>
              <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="item_image"><?php echo e(__('Item Image')); ?></label>
                <div class="text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> <img src="https://www.fastcat.com.ph/wp-content/uploads/2016/04/dummy-post-square-1-768x768.jpg" width="200px" height="150px" alt="..."/> </div>
                    <div> <span class="btn btn-outline-secondary btn-file"> <span class="fileinput-new"><?php echo e(__('Select image')); ?></span> <span class="fileinput-exists"><?php echo e(__('Change')); ?></span>
                      <input type="file" name="item_image" accept="image/x-png,image/gif,image/jpeg">
                      </span> <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput"><?php echo e(__('Remove')); ?></a> </div>
                  </div>
                </div>
              </div>
              <input name="category_id" id="category_id" type="hidden" required>
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
<div class="modal fade" id="modal-import-items" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Import items from CSV')); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="col-md-10 offset-md-1">
              <form role="form" method="post" action="<?php echo e(route('import.items')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="items_excel"><?php echo e(__('Import your file')); ?></label>
                  <div class="text-center">
                    <input type="file" class="form-control form-control-file" name="items_excel" accept=".csv, .ods, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                  </div>
                </div>
                <input name="res_id" id="res_id" type="hidden" value="<?php echo e($restorant_id); ?>" required>
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
</div>
<?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/items/partials/modals.blade.php ENDPATH**/ ?>