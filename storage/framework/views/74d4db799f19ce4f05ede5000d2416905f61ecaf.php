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

<div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4"> 
        <div class="col-lg-12 col-12 text-right"> <?php if(isset($hasMenuPDf)&&$hasMenuPDf): ?> <a target="_blank" href="<?php echo e(route('menupdf.download')); ?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> <?php echo e(__('PDF Menu')); ?></a> <?php endif; ?>   
      </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0"> 
            <br/>
            <div class="col-12"> <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
              <div class="card-body"> 

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
                         
                         <div class="row justify-content-center">
                            <div class="col-lg-12">
                              <div class="row row-grid">
                                   <?php foreach ($single_packages as $index => $item): ?>
                                      <div class="col-lg-3">
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
                                    </div>
                                   <?php endforeach; ?>
                              </div>
                            </div>
                         </div>

                      </div>
                  </div>

              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Restaurant Menu Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/todayitems/index.blade.php ENDPATH**/ ?>