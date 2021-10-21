<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('varietybundle.partials.header', ['title' => 'Add Variety Bundle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
    [draggable] {
  -moz-user-select: none;
  -khtml-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  /* Required to make elements draggable in old WebKit */
  -khtml-user-drag: element;
  -webkit-user-drag: element;
}

#columns {
  list-style-type: none;
}

.column {
  width: 162px;
  padding-bottom: 5px;
  padding-top: 5px;
  text-align: center;
  cursor: move;
}
.column header {
  height: 20px;
  width: 150px;
  color: black;
  background-color: #ccc;
  padding: 5px;
  border-bottom: 1px solid #ddd;
  border-radius: 10px;
  border: 2px solid #666666;
}

.column.dragElem {
  /*opacity: 0.4;*/
}
.column.over {
  border: 2px dashed #000;
  border-top: 2px solid blue;
}

</style>

    <div class="container-fluid mt--7">
  <div class="row">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Variety Bundle Management</h3>
            </div>
                <div class="col-4 text-right"> <a href="<?php echo e(url('/verietybundlelist')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a> </div>
              </div>
        </div>
            <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Variety Bundle Informantion</h6>
          <div class="pl-lg-4">
              <form method="post" action="verietybundlestore" autocomplete="off" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="name">Title</label>
                    <input type="text" name="name" id="name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Variety Bundle Title ..." value="" required autofocus>
                    <?php if($errors->has('name')): ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($errors->first('name')); ?></strong> </span> <?php endif; ?> </div>
              <hr />
              <h6 class="heading-small text-muted mb-4">Chef and Food Informantion</h6>
              <div class="row mb-4">
                    <div class="col-lg-3 col-md-4">
                  <div class="form-group">
                        <label class="form-control-label">Chef</label>
                        <br />
                        <select class="form-control form-control-alternative select-width chefs" name="chef_id[]">
                      <option disabled selected value> Select Chef</option>
                      <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($chef['id']); ?>"><?php echo e($chef['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                      </div>
                </div>
                  <div class="col-lg-3 col-md-4">
                  <div class="form-group">
                        <label class="form-control-label">Category</label>
                        <br />
                        <select class="form-control form-control-alternative select-width" name="food_type_id[]">
                      <option disabled selected value> Select Category</option>
                      <?php $__currentLoopData = $food_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($food_type['id']); ?>"><?php echo e($food_type['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                      </div>
                </div>
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label">Veg & Non-Veg</label>
                        <br />
                        <select class="form-control form-control-alternative select-width" name="user_diet_id[]">
                          <option disabled selected value> Select Type</option>
                          <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($diet['id']); ?>"><?php echo e($diet['title']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                  <div class="form-group">
                        <label class="form-control-label" for="name">Days</label>
                        <input type="number" name="days[]" id="name" class="form-control form-control-alternative days" placeholder="Enter Days ..." value="" required autofocus>
                      </div>
                </div>
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Price</label>
                        <input type="text" name="price[]" id="name" class="form-control form-control-alternative prices" placeholder="Enter Price ..." value="" required autofocus onkeypress="return isNumberKey(event)">
                      </div>
                    </div>
     
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Commission</label>
                        <input type="text" name="commission[]" id="name" class="form-control form-control-alternative commissions" placeholder="Enter Commission ..." value="" onkeypress="return isNumberKey(event)" required autofocus>
                      </div>
                    </div>

                     <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Delivery Time</label>
                        <input type="text" name="delivery_time[]" id="name" class="form-control form-control-alternative" placeholder="Enter delivery time ..." value="" required autofocus>
                      </div>
                    </div>

                    <?php
                    $images=[
                        ['name'=>'bundle_image[]','label'=>__('Slider Image'),'value'=>'','style'=>'width: 200px; height: 100px;']
                          ]
                  ?>
                  <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-lg-3 col-md-4">
                      <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                  <div class="col-12">
                    <div class="form-group">
                          <label class="form-control-label">Food Items</label>
                          <textarea  class="form-control form-control-alternative" rows="4" cols="50" name="food_items[]"></textarea>
                        </div>
                  </div>

                  <div class="col-md-12 newrows">
                    
                  </div>
                    <div class="col-md-12">
                      <div class="addmore">
                        <button type="button" onclick="add_more()">Add More</button>
                      </div>
                    </div>
                     <div class="col-md-12" id="seqbtn">
                      <div class="addmore">
                        <button type="button" onclick="add_sequence()">Add Sequence</button>
                      </div>
                    </div>
                  </div>
                 
              <div class="row mb-4" >
                  <div class="col-12">
                  <div class="box-com">
                        <h3 class="mb-4">Sequence</h3>
                        <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                          <tr>
                                <th scope="col">Chef</th>
                                <th scope="col">Total Days Delivery</th>
                              </tr>
                        </thead>
                            <tbody id="columns">
                          </tbody>
                          </table>
                        </div>
                      </div>
                     </div>

                  </div>
                  <div class="row align-items-center">
                      <div class="col-xl-4 col-md-5 col-12">
                        <ul class="totamtday">
                              <li>Total Day - <span id="total_days">0</span>
                                <input type="hidden" value="0" name="gross_value" id="gross_value"/>
                                  <input type="hidden" value="0" name="final_days" id="final_days"/>
                              </li>
                              <li>Total Amount - <span id="total_amount">0</span>
                                <input type="hidden" value="0" name="total_commission" id="total_commission"/>
                              </li>
                        </ul>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="form-group">
                          <label class="form-control-label" for="name">Discount </label>
                          <input type="text" name="discount" id="name" class="form-control form-control-alternative" placeholder="Enter Discount ..." value="" required autofocus>
                        </div>
                      </div>

                  </div>
              <div class="pl-lg-4">
                    <div class="text-center">
                  <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                </div>
                  </div>
            </form>
              </div>
        </div>
          </div>
    </div>
      </div>
  <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('js'); ?>
 <script>
   function isNumberKey(evt)
   {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
         return false;

      return true;
   }
   function add_sequence() {
    // get all days count
    total_days = 0;
     $(".days").each(function(){
        days = $(this).val();
        if(days != '' || days != 0){
            total_days += parseInt(days);
        }
    });

       total_prices = 0;
     $(".prices").each(function(){
        prices = $(this).val();
        if(prices != '' || prices != 0){
          sibling = $(this).parent().parent().siblings(); 
          chef_days = sibling.find(".days").val();
          total_prices += parseInt(prices)*parseInt(chef_days);
        }
    });

      total_commissions = 0;
     $(".commissions").each(function(){
        commissions = $(this).val();
        if(commissions != '' || commissions != 0){
            total_commissions += parseInt(commissions);
        }
    });

     $('#total_days').html(total_days);
     $('#final_days').val(total_days);
     $('#total_amount').html(total_prices);
     $('#gross_value').val(total_prices);
     $('#total_commission').val(total_commissions);
    
    var sequencehtml;
   
     $(".chefs").each(function(){
        sibling = $(this).parent().parent().siblings();      
      chef_id = $(this).val();

      var chefname = $(this).find('option:selected').text();
      
      chef_days = sibling.find(".days").val();
      var daycount;
      for (var j = 1; j <= total_days; j++) {
        daycount += `<option value="${j}">Day ${j}</option>`;
      }
      for (var i = 1; i <= chef_days; i++) {
        sequencehtml = `<tr class="column" draggable="true">
                        <td>${chefname} <input type="hidden" name="seq_chef_id[]" value="${chef_id}"/></td>
                        <td>${i} Delivery <input type="hidden" name="seq_deilvery[]" value="${i}"/> </td>
                        </tr>`;

        $('#columns').append(sequencehtml);
          // dragagble script
var dragSrcEl = null;

function handleDragStart(e) {
  // Target (this) element is the source node.
  dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.outerHTML);

  this.classList.add('dragElem');
}
function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault(); // Necessary. Allows us to drop.
  }
  this.classList.add('over');

  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

  return false;
}

function handleDragEnter(e) {
  // this / e.target is the current hover target.
}

function handleDragLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
}

function handleDrop(e) {
  // this/e.target is current target element.

  if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
  }

  // Don't do anything if dropping the same column we're dragging.
  if (dragSrcEl != this) {
    // Set the source column's HTML to the HTML of the column we dropped on.
    //alert(this.outerHTML);
    //dragSrcEl.innerHTML = this.innerHTML;
    //this.innerHTML = e.dataTransfer.getData('text/html');
    this.parentNode.removeChild(dragSrcEl);
    var dropHTML = e.dataTransfer.getData('text/html');
    this.insertAdjacentHTML('beforebegin',dropHTML);
    var dropElem = this.previousSibling;
    addDnDHandlers(dropElem);
    
  }
  this.classList.remove('over');
  return false;
}

function handleDragEnd(e) {
  // this/e.target is the source node.
  this.classList.remove('over');

  /*[].forEach.call(cols, function (col) {
    col.classList.remove('over');
  });*/
}

function addDnDHandlers(elem) {
  elem.addEventListener('dragstart', handleDragStart, false);
  elem.addEventListener('dragenter', handleDragEnter, false)
  elem.addEventListener('dragover', handleDragOver, false);
  elem.addEventListener('dragleave', handleDragLeave, false);
  elem.addEventListener('drop', handleDrop, false);
  elem.addEventListener('dragend', handleDragEnd, false);

}

var cols = document.querySelectorAll('#columns .column');
[].forEach.call(cols, addDnDHandlers);
      }
    });     
      
      $('#seqbtn').hide();
   }
    
   function add_more() {

     let html = `
     <div>
     <hr />
              <h6 class="heading-small text-muted mb-4">Chef and Food Informantion</h6>
              <div class="row mb-4">
                    <div class="col-lg-3 col-md-4">
                  <div class="form-group">
                        <label class="form-control-label">Chef</label>
                        <br />
                        <select class="form-control form-control-alternative select-width chefs" name='chef_id[]'>
                      <option disabled selected value> Select Chef</option>
                      <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($chef['id']); ?>"><?php echo e($chef['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                      </div>
                </div>
                  <div class="col-lg-3 col-md-4">
                  <div class="form-group">
                        <label class="form-control-label">Foods</label>
                        <br />
                        <select class="form-control form-control-alternative select-width" name="food_type_id[]">
                      <option disabled selected value> Select Food Type</option>
                      <?php $__currentLoopData = $food_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($food_type['id']); ?>"><?php echo e($food_type['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                      </div>
                </div>
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label">Veg & Non-Veg</label>
                        <br />
                        <select class="form-control form-control-alternative select-width" name="user_diet_id[]">
                          <option disabled selected value> Select Type</option>
                          <?php $__currentLoopData = $diets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($diet['id']); ?>"><?php echo e($diet['title']); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                  <div class="form-group">
                        <label class="form-control-label" for="name">Days</label>
                        <input type="number" name="days[]" id="name" class="form-control form-control-alternative days" placeholder="Enter Days ..." value="" required autofocus>
                      </div>
                </div>
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Price</label>
                        <input type="text" name="price[]" id="name" class="form-control form-control-alternative prices" placeholder="Enter Price ..." value="" required autofocus onkeypress="return isNumberKey(event)">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Commission</label>
                        <input type="text" name="commission[]" id="name" class="form-control form-control-alternative commissions" placeholder="Enter Commission ..." value="" onkeypress="return isNumberKey(event)" required autofocus>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Delivery Time</label>
                        <input type="text" name="delivery_time[]" id="name" class="form-control form-control-alternative" placeholder="Enter delivery_time ..."  required autofocus>
                      </div>
                    </div>
                    <?php
                    $images2=[
                        // ['name'=>'resto_logo','label'=>__('Category Image'),'value'=>$restorant->logom,'style'=>'width: 295px; height: 200px;'],
                        ['name'=>'bundle_image[]','label'=>__('Slider Image'),'value'=>'','style'=>'width: 200px; height: 100px;']
                          ]
                  ?>
                  <?php $__currentLoopData = $images2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-lg-3 col-md-4">
                      <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-12">
                    <div class="form-group">
                          <label class="form-control-label">Food Items</label>
                          <textarea  class="form-control form-control-alternative" rows="4" cols="50" name="food_items[]"></textarea>
                        </div>
                  </div>
                  <div class="col-12">
                   <button type="button" class="btn btn-warning remove_html">Remove</button>
                  </div>
                  </div>
                  `;
     $('.newrows').append(html);     
      $('#sequencehtml').html('');
      $('#seqbtn').show();
      $('#columns').empty();
   }
  $(document).on('click','.remove_html',function(){
  $(this).parent().parent().parent().remove();
  });
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Variety_Bundles')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nk6nzmf8mf9q/public_html/fdadmin.prometteur.in/resources/views/varietybundle/addverietybundle.blade.php ENDPATH**/ ?>