<div>
    <section class="page-title-layout4 py-0">
        <div class="breadcrumb-area">
        <div class="container">
            <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                <a href="index.html"><i class="icon-home"></i> <span>{{ __('message.Home') }}</span></a>
                </li>
                <li class="breadcrumb-item">
                <a href="about-us.html"> {{ __('message.G-Booking') }} </a>
                </li>
                <li class="breadcrumb-item">
                <a href="supplies.html">{{ __('message.Grand Delivery') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Cart') }}</li>
            </ol>
            </nav>
        </div><!-- /.container -->
        </div><!-- /.breadcrumb-area -->
    </section><!-- /.page-title -->
    @if(!empty($cartCount))
    <section class="shopping-cart pt-0 pb-100">
        <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>{{ __('message.Your items') }}</th>
                    <th>{{ __('message.Price') }}</th>
                    <th>{{ __('message.Quantity') }}</th>
                    <th>{{ __('message.Total') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cartList as $cartrow)
                        <tr class="cart-product">
                            <td class="d-flex align-items-center">
                                <i class="fas fa-times cart-product-remove" wire:click="deleteFoodformCart({{ $cartrow->cart_id }})"></i>
                                <div class="cart-product-img">
                                    <a href="void:javascript()" wire:click="loadFoodDetails( {{ $cartrow->id }} )" wire:loading.attr="disabled" data-toggle="modal" data-target="#myModal">
                                <img src="{{ asset('storage/'.$cartrow->food_img ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="50px" width="100%" alt="product" />
                                    </a>
                                </div>
                                <a href="void:javascript()" wire:click="loadFoodDetails( {{ $cartrow->id }} )" wire:loading.attr="disabled" data-toggle="modal" data-target="#myModal">
                                    <h5 class="cart-product-title">{{ !empty($cartrow->translationValue->food_translation_name) ? ucwords($cartrow->translationValue->food_translation_name) : '' }}</h5>
                                </a>
                            </td>
                            <td class="cart-product-price">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? ucwords($cartrow->getcurrencyData->currency_symbol) : '' }} {{ !empty($cartrow->price) ? ucwords($cartrow->price) : '' }}</td>
                            <td class="cart-product-quantity">
                                <div class="quantity-input-wrap">
                                {{-- <i class="fa fa-minus decrease-qty"></i> --}}
                                <i class="fa fa-minus decrease-qty" wire:click="decreaseQty({{ $cartrow->cart_id }})"></i>
                                <input type="number" value="{{ !empty($cartrow->cart_qty) ? $cartrow->cart_qty : '1' }}" class="qty-input">
                                {{-- <i class="fa fa-plus increase-qty"></i> --}}
                                <i class="fa fa-plus increase-qty" wire:click="increaseQty({{ $cartrow->cart_id }})"></i>
                                </div>
                            </td>
                            <td class="cart-product-total">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{ !empty($cartrow->price) ? $cartrow->price*$cartrow->cart_qty : '' }}</td>
                        </tr>
                    @empty
                    <li>{{ __('message.Empty Cart') }}</li>
                    @endforelse
                    
                    <tr class="cart-product-action">
                    <td colspan="4">
                        <div class="cart-product-action-content d-flex align-items-center justify-content-between">
                        <form class="d-flex flex-wrap">
                            <input type="text" class="form-control mb-10 mr-10" placeholder="Coupon Code">
                            <button type="submit" class="btn btn-secondary mb-10">{{ __('message.Apply Coupon') }}</button>
                        </form>
                        <div>
                            {{-- <a class="btn btn-primary" href="#">update cart</a>
                            <a class="btn btn-secondary" href="#">Checkout</a> --}}
                        </div>
                        </div>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div><!-- /.cart-table -->
            </div><!-- /.col-lg-12 -->

            <div class="col-sm-12 col-md-6 col-lg-4">
                <h6>{{ __('message.My shipping address') }}</h6>
                <div class="about-Text">
                    @if(!empty($shipAddress))
                    <ul class="features-list-layout2 list-unstyled">
                        <li class="feature-item">
                            <i class="contact-icon icon-phone"></i>&nbsp;&nbsp;:&nbsp;&nbsp;
                            <h4 class="feature-title mb-0">{{ $shipAddress->mobile ?? '' }}</h4>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;:&nbsp;&nbsp; <h4 class="feature-title mb-0">{{ ucfirst($shipAddress->name) ?? '' }}</h4>
                            <p class="feature-title mb-0">{{ $shipAddress->address ?? '' }}, {{ $shipAddress->city ?? '' }}, {{ $shipAddress->state ?? '' }}, {{ $shipAddress->country ?? '' }}
                                <br/>{{ $shipAddress->landmark ?? '' }}</p>
                        </li>
                    </ul>
                    <a href="/dashboard/shippingAddress" wire:navigate class="btn btn-secondary mb-10">{{ __('message.Edit') }}<i class="fa fa-edit"></i></a>
                    @else
                    <a href="/dashboard/shippingAddress" wire:navigate class="btn btn-secondary mb-10"> {{ __('message.Add shipping address') }}<i class="fa fa-plus"></i></a>
                    @endif
                    
                </div>
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-6 col-lg-4"></div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="cart-total-amount">
                    <h6>{{ __('message.Cart Totals') }}</h6>
                    <ul class="list-unstyled mb-30">
                    <li><span> {{ __('message.Subtotal') }} :</span><span>{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{$subTotal ?? ''}}</span></li>
                    <li><span> {{ __('message.Charge') }} :</span><span class="font-weight-bold">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{ $charge ?? '0'}}</span></li>
                    <li><span> {{ __('message.Total') }} :<p class="text text-secondary">({{ __('message.incl. fees and tax') }})</p></span><span class="font-weight-bold">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{$totalPrice ?? ''}}</span></li>
                    </ul>
                    <a href="/GBooking/restaurant/logAuth/checkout" wire:navigate><button type="button" class="btn btn-secondary btn-block">
                        <span>{{ __('message.Proceed To Checkout') }}</span> <i class="icon-arrow-right"></i>
                    </button></a>
                </div><!-- /.cart-total-amount -->
            </div><!-- /.col-lg-6 -->

        </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.shopping-cart -->
    @else
        <section class="services-layout4 pb-0">
            <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading-layout2 text-center mb-50">
                    <h2 class="heading-subtitle">{{ __('message.Empty Cart') }}</h2>
                    <h3 class="heading-title"><a href="/GBooking/restaurant" wire:navigate>{{ __('message.Go to restaurant') }}</a></h3>
                </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Services Layout 4 -->
    @endif

    <!-- The Modal CODE START -->
    <div class="modal fade {{ $modalPopup ?? ''}}" id="myModal" style="display:{{ !empty($modalPopup) ? 'block' : 'none' }}" aria-modal="{{ !empty($modalPopup) ? 'true' : 'false' }}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" wire:click="closemodel" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if(!empty($foodDetails->food_img))
                <img src="{{ asset('storage/'.$foodDetails->food_img ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="300px" width="100%" class="food-img-popup" alt="product"/>
                @endif
                <h5>{{ !empty($foodDetails->translationValue->food_translation_name) ? ucwords($foodDetails->translationValue->food_translation_name) : '' }}</h5>
                <p class="heading-desc text text-success">{{ !empty($foodDetails->getcurrencyData->currency_symbol) ? ucwords($foodDetails->getcurrencyData->currency_symbol) : '' }} {{ !empty($foodDetails->price) ? ucwords($foodDetails->price) : '' }}</p>
                <hr/>
                <p class="heading-desc"><b>{{ !empty($foodDetails->translationValue->translation_title) ? ucwords($foodDetails->translationValue->translation_title) : '' }}</b></p>
                <p class="heading-desc"><b>{{ !empty($foodDetails->translationValue->translation_desc) ? ucwords($foodDetails->translationValue->translation_desc) : '' }}</b></p>
                <p class="heading-desc"><b>{{ __('message.Restaurant') }} :<a href="/GBooking/restaurant/foods/{{ base64_encode($foodDetails->restaurant_id ?? '1') }}" wire:navigate>{{ !empty($foodDetails->restaurantData->restaurantName) ? ucwords($foodDetails->restaurantData->restaurantName) : '' }}</a></b></p>
                
            </div>
            <!-- Modal footer -->
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>  --}}
          </div>
        </div>
      </div>
     <!-- The Modal CODE START -->
    
    <script>
        window.addEventListener('openModal', event => {
            console.log('openModal event received');
            $('#myModal').modal('show');
        });
    </script>
    
    
    
</div>