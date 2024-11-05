<div>
    <section class="page-title-layout4 py-0">
        <div class="breadcrumb-area">
        <div class="container">
            <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                <a href="/" wire:navigate><i class="icon-home"></i> <span>{{ __('message.Home') }}</span></a>
                </li>
                <li class="breadcrumb-item">
                <a href="#">{{ __('message.G-Entertainment') }}</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="/GEntertainment/events" wire:navigate>{{ __('message.Special Events') }}</a>
                  </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Booking Events Table Form') }}</li>
            </ol>
            </nav>
        </div><!-- /.container -->
        </div><!-- /.breadcrumb-area -->
    </section><!-- /.page-title -->
    <section class="pb-40">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="pricing-widget-layout3 mb-30">
                  <h5 class="pricing-title">{{ __('message.Booking Summary') }}</h5>
                  <ul class="pricing-list list-unstyled mb-0">
                    @forelse (session('results') as $result)
                    <li><span>Table : {{ !empty($result->table_name) ? $result->table_name : '' }}</span><span class="price">{{ !empty($currency_symbol) ? $currency_symbol : '' }} {{ !empty($result->price) ? $result->price : '' }}</span></li>
                    @empty
                    <li><span>{{ __('message.Item not found') }}!</span></li>
                    @endforelse 
                   
                  </ul>
                  <hr/>
                  <div class="cart-total-amount">
                    <ul class="list-unstyled mb-30">
                    <li><span> {{ __('message.Subtotal') }} :</span><span>{{ !empty($currency_symbol) ? $currency_symbol : '' }} {{ session('totalPrice') ?? '' }}</span></li>
                    <li><span> {{ __('message.Charge') }} :</span><span class="font-weight-bold">{{ !empty($currency_symbol) ? $currency_symbol : '' }} {{ $charge ?? '0'}}</span></li>
                    <li><span> <h2>{{ __('message.Total') }} :</h2> <span class="text text-secondary">({{ __('message.incl. fees and tax') }})</span> </span><h2><span class="font-weight-bold">{{ !empty($currency_symbol) ? $currency_symbol : '' }} {{ $totalprice ?? '' }}</span></h2></li>
                    </ul>
                 </div><!-- /.cart-total-amount -->
              </div>
              
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="contact-panel">
                <form wire:submit.prevent="saveNewEventTransaction" class="contact-panel-form">
                @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="border-top mb-30"></div>
                      <p class="mb-30">{{ __('message.Kindly provide your personal informations below') }}:</p>
                    </div><!-- /.col-lg-12 -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label for="name">{{ __('message.Guest Name') }} <span class="red">*</span></label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.live="name" placeholder="{{ __('message.Enter Guest name') }}" value="{{old('name')}}">
                                @error('name')
                                <label class="error" for="name">{{ $message }}</label>
                                @enderror
                        </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label for="email">{{ __('message.Email') }}</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" placeholder="{{ __('message.Enter email') }}" value="{{old('email')}}">
                                @error('email')
                                <label class="error" for="email">{{ $message }}</label>
                                @enderror
                        </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="phone">{{ __('message.Phone Number') }} <span class="red">*</span></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.live="phone" placeholder="{{ __('message.Enter phone number') }}" value="{{old('phone')}}" maxlength="12">
                            @error('phone')
                            <label class="error" for="phone">{{ $message }}</label>
                            @enderror
                        </div>
                      </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="address">{{ __('message.Address') }}</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model="address" placeholder="{{ __('message.Enter address') }}" value="{{old('address')}}">
                                @error('address')
                                <label class="error" for="address">{{ $message }}</label>
                                @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="payment_type">{{ __('message.Payment type') }} <span class="red">*</span></label>
                                <select class="form-control @error('paymentType') is-invalid @enderror" wire:model.live="paymentType">
                                    <option value="">--{{ __('message.Select') }}--</option>
                                    {{-- <option value="cash on delivery">{{ __('message.Cash Deposit') }}</option> --}}
                                    <option value="online">{{ __('message.Online Payment') }}</option>
                                </select>
                                @error('paymentType')
                                  <label class="error" for="paymentType">{{ $message }}</label>
                                @enderror
                            </div>
                    </div><!-- /.col-lg-6 -->
                    
                    <div class="col-12">
                      <button type="submit" wire:click="loading = true" wire:loading.attr="disabled" class="btn btn-secondary btn-block">
                        <span>{{ __('message.Book Now') }} {{ $tbl_price ?? '' }}</span> <i class="icon-arrow-right"></i>
                      </button>
                      <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate class="btn btn-primary btn-link btn-block">{{ __('message.Back') }}</a>
                      <center>
                        <div class="text-center" wire:loading>
                          <img src="{{ URL::to('website/assets/images/loader.gif') }}" alt="Processing..." width="60px">
                        </div>
                      </center>
                      
                    </div>
                    {{-- @endif --}}
                  </div><!-- /.row -->
                  
                </form>
              </div>
            </div><!-- /.col-lg-8 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
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
      </section>
</div>
