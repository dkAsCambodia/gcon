<section class="shop">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-9">
          <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
            <span><h2><strog>{{ __('message.We found 2 results for') }} "{{$search ?? ''}}"</strog></h2></span>
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

            @forelse($filterdata as $foodrow)
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
                    <span class="product-price">{{ !empty($foodrow->restaurantData->restaurantName) ? ucwords($foodrow->restaurantData->restaurantName) : '' }}</span>
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
              <h5 class="widget-title">{{ __('message.food categories') }}</h5>
              <div class="widget-content">
                {{-- <ul class="list-unstyled mb-0">
                    <li><a href="/GBooking/restaurant/foods/{{ $restaurant_id }}" wire:navigate class="DkactiveItem">{{ __('message.ALL') }}</a></li>
                    @forelse($calegoryList as $catrow)
                     <li><a href="/GBooking/restaurant/foods/{{ $restaurant_id }}/{{ base64_encode($catrow->id) }}" wire:navigate>{{ !empty($catrow->translationValue->cat_translation_name) ? ucwords($catrow->translationValue->cat_translation_name) : '' }}</a></li>
                    @empty
                        <li>{{ __('message.No have category in this restaurant') }}!</li>
                    @endforelse
                </ul> --}}
              </div><!-- /.widget-content -->
            </div><!-- /.widget-categories -->
           
            <div class="widget widget-tags">
              <h5 class="widget-title">{{ __('message.Other Restaurants') }}</h5>
              <div class="widget-content">
                {{-- <ul class="list-unstyled">
                    @forelse($restaurantList as $row)
                    <li><a href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate>{{ !empty($row->restaurantName) ? ucwords($row->restaurantName) : '' }}</a></li>
                    @empty
                        <li>{{ __('message.Restaurant have closed Today') }}!</li>
                    @endforelse
                </ul> --}}
              </div><!-- /.widget-content -->
            </div><!-- /.widget-Tags -->
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-3 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.shop -->
