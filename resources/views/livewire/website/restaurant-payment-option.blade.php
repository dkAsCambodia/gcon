<section class="faq pb-0">
    <style>
      .stripe-button-el{
        display: none;
      }
    </style>
      <div class="container">
        <div class="heading text-center mb-50">
          {{-- <h2 class="heading-subtitle">Commitment to Quality</h2> --}}
          <h3 class="heading-title">{{ __('message.Payment Options') }}</h3>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-sm-3">
              <div class="accordion" id="accordion1">
                  <div class="accordion-item">
                    <div class="accordion-header" data-toggle="collapse" data-target="#collapse2">
                      <a class="accordion-title" href="#">{{ __('message.Pay with Paypal') }}</a>
                    </div><!-- /.accordion-item-header -->
                    <div id="collapse2" class="collapse" data-parent="#accordion1">
                      <div class="accordion-body">
                          <form action="{{ route('paypal.checkout') }}" method="post">
                              @csrf
                              <input type="hidden" class="Final_amount" name="amount" value="{{ base64_decode($amount) }}" />
                              <input type="hidden" class="Final_currency" name="currency" value="{{ base64_decode($currency) }}" />
                              <input type="hidden" class="Final_currencySymbol" name="currencySymbol" value="{{$currencySymbol}}" />
                             
                        <button type="submit" wire:click="paypalLoading" wire:loading.attr="disabled" class="btn btn-white btn-block">
                          <svg height="22" preserveAspectRatio="xMinYMin meet" viewBox="0 0 101 32" width="69" xmlns="http://www.w3.org/2000/svg">
                            <g fill="#003087">
                                <path d="m12.237 2.8h-7.8c-.5 0-1 .4-1.1.9l-3.1 20c-.1.4.2.7.6.7h3.7c.5 0 1-.4 1.1-.9l.8-5.4c.1-.5.5-.9 1.1-.9h2.5c5.1 0 8.1-2.5 8.9-7.4.3-2.1 0-3.8-1-5-1.1-1.3-3.1-2-5.7-2zm.9 7.3c-.4 2.8-2.6 2.8-4.6 2.8h-1.2l.8-5.2c0-.3.3-.5.6-.5h.5c1.4 0 2.7 0 3.4.8.5.4.7 1.1.5 2.1z">
                                </path>
                                <path d="m35.437 10h-3.7c-.3 0-.6.2-.6.5l-.2 1-.3-.4c-.8-1.2-2.6-1.6-4.4-1.6-4.1 0-7.6 3.1-8.3 7.5-.4 2.2.1 4.3 1.4 5.7 1.1 1.3 2.8 1.9 4.7 1.9 3.3 0 5.2-2.1 5.2-2.1l-.2 1c-.1.4.2.8.6.8h3.4c.5 0 1-.4 1.1-.9l2-12.8c.1-.2-.3-.6-.7-.6zm-5.1 7.2c-.4 2.1-2 3.6-4.2 3.6-1.1 0-1.9-.3-2.5-1s-.8-1.6-.6-2.6c.3-2.1 2.1-3.6 4.2-3.6 1.1 0 1.9.4 2.5 1 .5.7.7 1.6.6 2.6z">
                                </path>
                                <path d="m55.337 10h-3.7c-.4 0-.7.2-.9.5l-5.2 7.6-2.2-7.3c-.1-.5-.6-.8-1-.8h-3.7c-.4 0-.8.4-.6.9l4.1 12.1-3.9 5.4c-.3.4 0 1 .5 1h3.7c.4 0 .7-.2.9-.5l12.5-18c.3-.3 0-.9-.5-.9z">
                                </path>
                            </g>
                            <g fill="#009cde">
                                <path d="m67.737 2.8h-7.8c-.5 0-1 .4-1.1.9l-3.1 19.9c-.1.4.2.7.6.7h4c.4 0 .7-.3.7-.6l.9-5.7c.1-.5.5-.9 1.1-.9h2.5c5.1 0 8.1-2.5 8.9-7.4.3-2.1 0-3.8-1-5-1.2-1.2-3.1-1.9-5.7-1.9zm.9 7.3c-.4 2.8-2.6 2.8-4.6 2.8h-1.2l.8-5.2c0-.3.3-.5.6-.5h.5c1.4 0 2.7 0 3.4.8.5.4.6 1.1.5 2.1z">
                                </path>
                                <path d="m90.937 10h-3.7c-.3 0-.6.2-.6.5l-.2 1-.3-.4c-.8-1.2-2.6-1.6-4.4-1.6-4.1 0-7.6 3.1-8.3 7.5-.4 2.2.1 4.3 1.4 5.7 1.1 1.3 2.8 1.9 4.7 1.9 3.3 0 5.2-2.1 5.2-2.1l-.2 1c-.1.4.2.8.6.8h3.4c.5 0 1-.4 1.1-.9l2-12.8c0-.2-.3-.6-.7-.6zm-5.2 7.2c-.4 2.1-2 3.6-4.2 3.6-1.1 0-1.9-.3-2.5-1s-.8-1.6-.6-2.6c.3-2.1 2.1-3.6 4.2-3.6 1.1 0 1.9.4 2.5 1 .6.7.8 1.6.6 2.6z">
                                </path>
                                <path d="m95.337 3.3-3.2 20.3c-.1.4.2.7.6.7h3.2c.5 0 1-.4 1.1-.9l3.2-19.9c.1-.4-.2-.7-.6-.7h-3.6c-.4 0-.6.2-.7.5z">
                                </path>
                            </g>
                        </svg>
                          <span>{{ __('message.Pay') }} {{ $currencySymbol ?? '' }}{{ base64_decode($amount) ?? '' }}</span> <i class="icon-arrow-right"></i>
                        </button>
                        <center>
                        <div class="text-center" wire:loading wire:target="paypalLoading">  
                          <img src="{{ URL::to('website/assets/images/loader.gif') }}" alt="Processing..." width="60px">
                        </div>
                      </center>
                          </form>
                      </div><!-- /.accordion-item-body -->
                    </div>
                  </div><!-- /.accordion-item -->
                  <div class="accordion-item opened">
                    <div class="accordion-header" data-toggle="collapse" data-target="#collapse3">
                      <a class="accordion-title" href="#">{{ __('message.Pay with Stripe') }}</a>
                    </div><!-- /.accordion-item-header -->
                    <div id="collapse3" class="collapse show" data-parent="#accordion1">
                      <div class="accordion-body">
                        <p style="display: none;">As an industry leader, we are relentless in our pursuit of advancing the science of wellness and
                          working with our laboratory partner to create a healthier world.</p>
                          <form action="{{ route('make.payment') }}" method="post">
                            @csrf
                              <input type="hidden" class="Final_amount" name="amount" value="{{ base64_decode($amount) }}" />
                              <input type="hidden" class="Final_currency" name="currency" value="{{ base64_decode($currency) }}" />
                              <input type="hidden" class="Final_currencySymbol" name="currencySymbol" value="{{$currencySymbol}}" />
                            <input type="hidden" name="description" value="Global Payment Gateway created by DK"/>
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY'); }}"
                                data-amount="{{ base64_decode($amount) }}00" 
                                data-name="G-CON" 
                                data-email="gconofficial@mail.com"
                                data-description="Quick Pay with Stripe"
                                data-image="{{ URL::to('website/assets/images/logo/gconlogo.png') }}" data-currency="{{ base64_decode($currency) }}" data-label="Pay Now"></script>
                          <button type="submit" class="btn btn-secondary btn-block"><i class='fab fa-stripe'></i> 
                            <span>{{ __('message.Pay') }} {{ $currencySymbol ?? '' }}{{ base64_decode($amount) ?? '' }}</span> <i class="icon-arrow-right"></i>
                          </button>
                          </form>
                      </div><!-- /.accordion-item-body -->
                    </div>
                  </div><!-- /.accordion-item -->
                 
              </div><!-- /.accordion -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.FAQ --></br>
    {{-- Disable_Browser_Back_JavaScript START --}}
    <script type="text/javascript">
      function preventBack() {
          // alert('summary page');
          window.history.forward();
      }
      setTimeout("preventBack()", 0);
      window.onunload = function () {
          null
      };
  </script>
      {{-- Disable_Browser_Back_JavaScript END --}}