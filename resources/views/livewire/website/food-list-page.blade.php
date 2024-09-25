<div>
    <section class="banner-layout3 py-0">
      <br/>
      {{-- <div class="top-shape"></div> --}}
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-xl-2"></div>
          <div class="col-12 col-xl-5 banner-img d-flex align-items-center" wire:ignore>
            <div class="bg-img">
              <img src="{{ asset('storage/'.$RestaurantDetails->imgRestaurant ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="250px" width="100%" alt="backgrounds">
            </div>
            <div class="banner-shape"></div>
          </div><!-- /.col-lg-6 -->
          <div class="col-12 col-xl-5 banner-content">
            <div class="banner-text">
              <div class="heading-layout2 heading-light">
                  <h3 class="heading-title">{{ !empty($RestaurantDetails->restaurantName) ? ucwords($RestaurantDetails->restaurantName) : '' }}</h3>
                    <p class="heading-desc">{{ !empty($RestaurantDetails->translationValue->heading) ? ucwords($RestaurantDetails->translationValue->heading) : '' }}</p>
                    <p class="heading-desc">{{ !empty($RestaurantDetails->translationValue->title) ? ucwords($RestaurantDetails->translationValue->title) : '' }}</p>
                    @if(!empty($RestaurantDetails->Discount))
                    <p class="heading-desc">{{ __('message.Discount') }} : {{ $RestaurantDetails->Discount }}%</p>
                    @endif
                    <p class="heading-desc"><i class='fas fa-shipping-fast'></i> : {{ __('message.Free delivery') }}</p>
              </div>
             
              <div class="mx-80 mt-20">
                <a  class="btn btn-white btn-xl" data-toggle="modal" data-target="#myModal">
                  <span>{{ __('message.Looking for More Info') }}!</span> <i class="icon-arrow-right"></i>
                </a>
              </div>
            </div><!-- /.banner-text -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner Layout3 -->
    <section class="shop">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9">
              <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
                <span><h2><strog>{{ __('message.Popular (Most ordered right now)') }}</strog></h2></span>
                {{-- <select>
                    <option selected value="">Select category </option>
                    @forelse($calegoryList as $catrow)
                    <option value="0">{{ !empty($catrow->translationValue->cat_translation_name) ? ucwords($catrow->translationValue->cat_translation_name) : '' }}</option>
                    @empty
                    <li></li>
                    @endforelse
                </select> --}}
              </div>
              <div class="row">

                @forelse($foodList as $foodrow)
                    <!-- Product item #1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="product-item">
                        <div class="product-img">
                        <img src="{{ asset('storage/'.$foodrow->food_img ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="250px" width="100%" alt="Product" loading="lazy">
                        <div class="product-action">
                            <a href="javascript:void(0)" wire:click="addToCart('{{ base64_encode($foodrow->id) }}')" class="btn btn-secondary">
                            <i class="icon-cart"></i>+ <span>{{ !empty($foodrow->cart_qty) ? "($foodrow->cart_qty)" : '' }}</span></a>
                            {{-- <a href="/GBooking/cart" wire:navigate class="btn btn-secondary">
                              <i class="icon-cart"></i> <span>{{ __('message.Go To Cart') }}</span>
                            </a> --}}
                        </div><!-- /.product-action -->
                        </div><!-- /.product-img -->
                        <div class="product-info">
                        <h4 class="product-title"><a href="supplies-single.html">{{ !empty($foodrow->translationValue->food_translation_name) ? ucwords($foodrow->translationValue->food_translation_name) : '' }}</a></h4>
                        <p class="post-desc">{{ !empty($foodrow->translationValue->translation_desc) ? ucwords($foodrow->translationValue->translation_desc) : '' }}</p>
                        <span class="product-price">{{ !empty($foodrow->getcurrencyData->currency_symbol) ? ucwords($foodrow->getcurrencyData->currency_symbol) : '' }}{{ !empty($foodrow->price) ? ucwords($foodrow->price) : '' }}</span>
                        </div><!-- /.product-content -->
                    </div><!-- /.product-item -->
                    </div><!-- /.col-lg-4 -->
                @empty
                <li>{{ __('message.not available in this restaurants') }}</li>
                @endforelse
                
              </div><!-- /.row -->
              
            </div><!-- /.col-lg-9 -->
            <div class="col-sm-12 col-md-4 col-lg-3">
              <aside class="sidebar-layout2">
                <div class="widget widget-search">
                  <h5 class="widget-title">{{ __('message.Search foods here') }}</h5>
                  <div class="widget-content">
                    <form class="widget-form-search" wire:submit.prevent="getSerachDataFun"> 
                      @csrf
                      {{-- <input type="text" class="form-control" placeholder="Search...">
                      <button class="btn" type="submit"><i class="icon-search"></i></button> --}}

                      <input list="foodSuggestions" type="text" wire:model.live="search" placeholder="Search..." class="form-control">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                      <datalist id="foodSuggestions">
                        @if(!empty($foods))
                          @foreach($foods as $food)
                              <option value="{{ !empty($food->food_translation_name) ? ucwords($food->food_translation_name) : '' }}"></option>
                          @endforeach
                          @endif
                      </datalist>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search -->
                <div class="widget widget-categories-layout2">
                  <h5 class="widget-title">{{ __('message.Menus') }}</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                        <li><a href="/GBooking/restaurant/foods/{{ $restaurant_id }}" wire:navigate class="DkactiveItem">{{ __('message.ALL') }}</a></li>
                        @forelse($calegoryList as $catrow)
                         <li><a href="/GBooking/restaurant/foods/{{ $restaurant_id }}/{{ base64_encode($catrow->id) }}" wire:navigate>{{ !empty($catrow->translationValue->cat_translation_name) ? ucwords($catrow->translationValue->cat_translation_name) : '' }}</a></li>
                        @empty
                            <li>{{ __('message.No have category in this restaurant') }}!</li>
                        @endforelse
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
               
                <div class="widget widget-tags">
                  <h5 class="widget-title">{{ __('message.Other Restaurants') }}</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                        @forelse($restaurantList as $row)
                        <li><a href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate>{{ !empty($row->restaurantName) ? ucwords($row->restaurantName) : '' }}</a></li>
                        @empty
                            <li>{{ __('message.Restaurant have closed Today') }}!</li>
                        @endforelse
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-Tags -->
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-3 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.shop -->
       <!-- The Modal CODE START -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">{{ !empty($RestaurantDetails->restaurantName) ? ucwords($RestaurantDetails->restaurantName) : '' }} ({{ !empty($RestaurantDetails->address) ? ucwords($RestaurantDetails->address) : '' }})</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                  <p class="heading-desc"><i class="fa fa-clock" aria-hidden="true"></i> {{ __('message.Now open until') }} {{ !empty($RestaurantDetails->closedtime) ? ucwords($RestaurantDetails->closedtime) : '' }}</p>
                  <p class="heading-desc"><b>{{ !empty($RestaurantDetails->openingDay) ? ucwords($RestaurantDetails->openingDay) : '' }} - {{ !empty($RestaurantDetails->closingday) ? ucwords($RestaurantDetails->closingday) : '' }}</b></p>
                  @if(!empty($RestaurantDetails->openTime) && !empty($RestaurantDetails->closedtime))
                    <?php
                          $dateTime = new DateTime($RestaurantDetails->openTime);
                          $dateTime2 = new DateTime($RestaurantDetails->closedtime);
                    ?>
                    <p class="heading-desc"><b>{{ $dateTime->format('H:i') }} - {{ $dateTime2->format('H:i') }}</b></p>
                  @endif
                  <?php  $lat=$RestaurantDetails->lat;
                         $long=$RestaurantDetails->long; ?>
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $lat; ?>,<?php echo $long; ?>&markers=color:red%7Clabel:C%7C<?php echo $lat; ?>,<?php echo $long; ?>&zoom=15&size=600x300&maptype=roadmap&key=AIzaSyDpthOrhTdzA26X7JlTG2k-5JH-S2oPj4g" height="300" style="border:0; width:100%; margin:0;">
                  <h5>{{ __('message.Delivery fee') }}</h5>
                  {{ __('message.Delivery fee is charged based on time of day, distance, and surge conditions') }} :
                  0
              </div>
              <!-- Modal footer -->
              {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div> --}}
            </div>
          </div>
        </div>
       <!-- The Modal CODE START -->
</div>
