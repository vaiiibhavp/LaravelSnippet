@extends('layouts.app', ['title' => __('Offers')])

@section('content')
    @include('offers.partials.header', ['title' => 'Add Offers'])
    <div class="container-fluid mt--7">
  <div class="row">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
          <div class="row align-items-center">
                <div class="col-8">
              <h3 class="mb-0">Offers Management</h3>
            </div>
                <div class="col-4 text-right"> <a href="{{ url('/offerslist')}}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a> </div>
              </div>
        </div>
            <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Offer Informantion</h6>
          <div class="pl-lg-4">
          <form method="post" action="" autocomplete="off">
                <div class="row mb-4">
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Title</label>
                  <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter Offer Title ..." value="" required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Offer Code</label>
                  <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter code ..." value="" required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Min. Order </label>
                  <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter min order ..." value="" required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Max. Discount </label>
                  <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter max disccount ..." value="" required autofocus>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                  <label class="form-control-label" for="name">Offer Duration</label>
                  <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Enter days ..." value="" required autofocus>
                   </div>
              </div>

              <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="form-control-label" for="name">Offer For Chef</label>
                                    <select class="form-control form-control-alternative select-width">
                                    <option disabled selected value> Select</option>
                                    <option>Chef 1</option>
                                    <option>Chef 2</option>
                                    <option>Chef 3</option>
                                    <option>Chef 4</option>
                                    <option>Chef 5</option>
                                    <option>Chef 6</option>
                                    <option>Chef 7</option>
                                    </select>
                                  </div>
                                  
              </div>

              <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="form-control-label" for="name">Offer For Customer</label>
                                    <select class="form-control form-control-alternative select-width">
                                    <option disabled selected value> Select</option>
                                    <option>Customer 1</option>
                                    <option>Customer 2</option>
                                    <option>Customer 3</option>
                                    <option>Customer 4</option>
                                    <option>Customer 5</option>
                                    <option>Customer 6</option>
                                    <option>Customer 7</option>
                                    </select>
                                  </div>
              </div>
             
              <div class="col-12">
                    <div class="form-group">
                  <label class="form-control-label">Offer Value</label>
                  <textarea  class="form-control form-control-alternative" rows="4" cols="50"></textarea>
                </div>
           
            </div>
               
                <div class="pl-lg-4">
                <div class="text-center">
              <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
            </div>
            </div>
              </form>
        </div>
          </div>
    </div>
      </div>
</div>

</div>
@endsection 