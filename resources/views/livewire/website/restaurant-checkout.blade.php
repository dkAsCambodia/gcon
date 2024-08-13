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
                <a href="supplies.html">{{ __('message.Restaurants') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Checkout') }}</li>
            </ol>
            </nav>
        </div><!-- /.container -->
        </div><!-- /.breadcrumb-area -->
    </section><!-- /.page-title -->
    @if(!empty($cartCount))
    <section class="shopping-cart pt-0 pb-100">
        <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <h6>{{ __('message.Delivery address') }}</h6>
                <div class="about-Text">
                    @if(!empty($shipAddress))
                    <ul class="features-list-layout2 list-unstyled">
                        <li class="feature-item">
                            <i class="contact-icon icon-phone"></i>&nbsp;&nbsp;:&nbsp;&nbsp;
                            <h4 class="feature-title mb-0">{{ $shipAddress->mobile ?? '' }}</h4>
                        </li>
                        <li class="feature-item">
                            <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;:&nbsp;&nbsp; 
                            <p class="feature-title mb-0">{{ ucfirst($shipAddress->name) ?? '' }}<br/>{{ $shipAddress->address ?? '' }}, {{ $shipAddress->city ?? '' }}, {{ $shipAddress->state ?? '' }}, {{ $shipAddress->country ?? '' }}
                                <br/>{{ $shipAddress->landmark ?? '' }}</p>
                        </li>
                    </ul>
                    <a href="/dashboard/shippingAddress" wire:navigate class="btn btn-secondary mb-10">{{ __('message.Change') }}<i class="fa fa-edit"></i></a>
                    @else
                    <a href="/dashboard/shippingAddress" wire:navigate class="btn btn-secondary mb-10"> {{ __('message.Add shipping address') }}<i class="fa fa-plus"></i></a>
                    @endif
                    
                </div>
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-6 col-lg-3"></div>
            <div class="col-sm-12 col-md-6 col-lg-5">
                <div class="pricing-widget-layout3 mb-30">
                  <h5 class="pricing-title">{{ __('message.Your order from GCON') }}</h5>
                  <ul class="pricing-list list-unstyled mb-0">
                    @forelse($cartList as $cartrow)
                    <li><span>{{ !empty($cartrow->cart_qty) ? $cartrow->cart_qty : '1' }} x {{ !empty($cartrow->translationValue->food_translation_name) ? ucwords($cartrow->translationValue->food_translation_name) : '' }}</span><span class="price">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{ !empty($cartrow->price) ? $cartrow->price*$cartrow->cart_qty : '' }}</span></li>
                    @empty
                    <li><span>{{ __('message.Item not found') }}!</span></li>
                    @endforelse
                  </ul>
                  <hr/>
                  <div class="cart-total-amount">
                    <h6>{{ __('message.Cart Totals') }}</h6>
                    <ul class="list-unstyled mb-30">
                    <li><span> {{ __('message.Subtotal') }} :</span><span>{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{$subTotal ?? ''}}</span></li>
                    <li><span> {{ __('message.Charge') }} :</span><span class="font-weight-bold">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{ $charge ?? '0'}}</span></li>
                    <li><h2><span> {{ __('message.Total') }} :</span><span class="font-weight-bold">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? $cartrow->getcurrencyData->currency_symbol : '' }} {{$totalPrice ?? ''}}</span></h2></li>
                    </ul>
                   
                            <div class="form-group">
                                <label for="payment_type">{{ __('message.Payment type') }} <span class="red">*</span></label>
                                <select class="form-control @error('paymentType') is-invalid @enderror" wire:model.live="paymentType">
                                    <option value="">--{{ __('message.Select') }}--</option>
                                    <option value="cash on delivery">{{ __('message.Cash on Delivery') }}</option>
                                    <option value="online">{{ __('message.Online Payment') }}</option>
                                </select>
                                @error('paymentType')
                                <label class="error" for="paymentType">{{ $message }}</label>
                                @enderror
                            </div>
                   
                    <a href="/GBooking/restaurant/log/checkout" wire:navigate><button type="button" class="btn btn-secondary btn-block">
                        <span>{{ __('message.Place order') }}</span> <i class="icon-arrow-right"></i>
                    </button></a>
                </div><!-- /.cart-total-amount -->
                </div>
              
                
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

    
</div>