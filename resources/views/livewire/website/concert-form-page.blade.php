<section class="pb-40">
    <div class="container">
      <div class="row">
        
        <div class="col-sm-12 col-md-12 col-lg-8 offset-md-2">
          <div class="contact-panel">
            <form wire:submit.prevent="saveconcertForm" class="contact-panel-form">
            @csrf
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="contact-panel-title">{{ __('message.Booking Concert Table Form') }}</h4>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group">
                    <label for="cat_id">{{ __('message.Table type') }} <span class="red">*</span></label>
                    <select class="form-control" wire:model="cat_id" disabled>
                        @if(!empty($categorydata))
                            @foreach($categorydata as $catrow)
                            
                                <option value="{{ $catrow->id }}">{{ strtoupper($catrow?->translationValuecat?->cat_name) ?? '--' }}</option>
                           
                            @endforeach
                         @endif
                    </select>
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group">
                    <label for="tbl_amount">{{ __('message.Price') }}</label>
                    <input type="text" class="form-control" wire:model="tbl_price" readonly>
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group">
                      <label for="service">{{ __('message.Table quantity') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('quantity') is-invalid @enderror" wire:model.lazy="quantity" placeholder="{{ __('message.1 or 2 or 3') }}" maxlength="2">
                      @error('quantity')
                      <label class="error" for="quantity">{{ $message }}</label>
                      @enderror
                  </div>
          </div><!-- /.col-lg-6 -->
                
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group">
                    <label for="date">{{ __('message.Select date') }} <span class="red">*</span></label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" wire:model="date" id="selectdate">
                          @error('date')
                          <label class="error" for="date">{{ $message }}</label>
                          @enderror
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="location">{{ __('message.Select time') }} <span class="red">*</span></label>
                          <select id="location" class="form-control @error('time') is-invalid @enderror" wire:model.live="time" id="time">
                                  <option value="">--{{ __('message.Select') }}--</option>
                                  @if(!empty($timeslotList))
                                  @foreach($timeslotList as $key => $row)
                                  <option value="{{ $row->time ?? '' }} {{ $row->interval ?? '' }}">{{ $row->time ?? '' }} {{ $row->interval ?? '' }}</option>
                                  @endforeach
                                  @endif
                          </select>
                              @error('time')
                              <label class="error" for="time">{{ $message }}</label>
                              @enderror
                      </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="no_of_people">{{ __('message.No. of people') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('no_of_people') is-invalid @enderror" wire:model.live="no_of_people" placeholder="{{ __('message.Enter no. of people') }}" maxlength="2">
                            @error('no_of_people')
                            <label class="error" for="no_of_people">{{ $message }}</label>
                            @enderror
                    </div>
                </div><!-- /.col-lg-6 -->
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
                                <option value="cash on delivery">{{ __('message.Cash on delivery') }}</option>
                                <option value="online">{{ __('message.Online Payment') }}</option>
                            </select>
                            @error('paymentType')
                              <label class="error" for="paymentType">{{ $message }}</label>
                            @enderror
                        </div>
                </div><!-- /.col-lg-6 -->
                {{-- @if($showDiv)
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label for="{{ __('message.Payment Options') }}">{{ __('message.Payment Options') }}:</label>
                    <div class="accordion" id="accordion1">
                      <div class="accordion-item">
                        <div class="accordion-header" data-toggle="collapse" data-target="#collapse2">
                          <a class="accordion-title" href="#">{{ __('message.Pay with Paypal') }}</a>
                        </div><!-- /.accordion-item-header -->
                        <div id="collapse2" class="collapse" data-parent="#accordion1">
                          <div class="accordion-body">
                            <button type="submit" class="btn btn-white btn-block">
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
                              <span>{{ __('message.Pay') }} {{ !empty($tableDetails->currency_symbol) ? $tableDetails->currency_symbol : '' }}{{ !empty($tableDetails->tbl_price) ? $tableDetails->tbl_price : '' }}</span> <i class="icon-arrow-right"></i>
                            </button>
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
                              <button type="submit" class="btn btn-secondary btn-block">
                                <span>{{ __('message.Pay') }} {{ !empty($tableDetails->currency_symbol) ? $tableDetails->currency_symbol : '' }}{{ !empty($tableDetails->tbl_price) ? $tableDetails->tbl_price : '' }}</span> <i class="icon-arrow-right"></i>
                              </button>
                          </div><!-- /.accordion-item-body -->
                        </div>
                      </div><!-- /.accordion-item -->
                     
                    </div><!-- /.accordion -->
                </div><!-- /.col-lg-8 -->
                @endif --}}

                {{-- @if($showDiv) --}}
                {{-- @else --}}
                <div class="col-12">
                  <button type="submit" wire:click="loading = true" wire:loading.attr="disabled" class="btn btn-secondary btn-block">
                    <span>{{ __('message.Book Now') }} {{ $tbl_price ?? '' }}</span> <i class="icon-arrow-right"></i>
                  </button>
                  <a href="/GEntertainment/concert" wire:navigate class="btn btn-primary btn-link btn-block">{{ __('message.Back') }}</a>
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
    <script>
        // Get the input element
        var datePicker = document.getElementById('selectdate');
        // Get today's date in the format YYYY-MM-DD
        var today = new Date().toISOString().split('T')[0];
        // Set the minimum date to today
        datePicker.setAttribute('min', today);
    </script>
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
