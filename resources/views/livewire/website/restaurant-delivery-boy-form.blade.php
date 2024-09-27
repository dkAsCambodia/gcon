<section class="contact-layout5 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="contact-panel">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-6">
                <h4 class="contact-panel-title">{{ __('message.Delivery Boy Registration') }}</h4>
                <p class="contact-panel-desc mb-30">{{ __('message.Interested? Fill in the form below to become our partner and increase your revenue') }}!</p>
              </div>
              @if($submitform)
              <div class="alert alert-success">
                <p><b>{{ __('message.Thank you for your interest') }}!</b></p>
                <p><b>{{ __('message.In the next few hours we will contact you, so that we can begin the delivery process together') }}</b></p>
              </div>
              @endif
            </div>
            <div class="d-flex flex-wrap">
              <form wire:submit.prevent="saveSeller" class="contact-panel-form">
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="businessType">{{ __('message.Business Type') }} <span class="red">*</span></label>
                      <select class="form-control" wire:model.live="businessType" disabled>
                            <option value="">--{{ __('message.Select') }}--</option>
                            @if(!empty($BookingTypeList))
                            @foreach($BookingTypeList as $key => $row)
                            <option value="{{ $row->id }}">{{ ucfirst($row->BookingType) }}</option>
                            @endforeach
                            @endif
                      </select>
                    </div>
                  </div><!-- /.col-lg-4 -->
                  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="name">{{ __('message.Guest Name') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.live="name" placeholder="{{ __('message.Enter Guest name') }}" value="{{old('name')}}">
                            @error('name')
                            <label class="error" for="name">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                 

                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group" >
                        <label for="phoneNumber">{{ __('message.Phone Number') }} <span class="red">*</span></label>
                        <input type="text" class="form-control phone-design @error('phoneNumber') is-invalid @enderror" wire:model.live="phoneNumber" placeholder="{{ __('message.Enter phone number') }}" value="{{old('phone')}}" maxlength="12">
                        @error('phoneNumber')
                        <label class="error" for="phoneNumber">{{ $message }}</label>
                        @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="email">{{ __('message.Email') }} <span class="red">*</span></label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" placeholder="{{ __('message.Enter email') }}" value="{{old('email')}}">
                            @error('email')
                            <label class="error" for="email">{{ $message }}</label>
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
                      <label for="city">{{ __('message.City') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model.live="city" placeholder="{{ __('message.Enter city') }}" value="{{old('city')}}">
                            @error('city')
                            <label class="error" for="city">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="zip">{{ __('message.zip') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('zip') is-invalid @enderror" wire:model.live="zip" placeholder="{{ __('message.Enter zip') }}" maxlength="6" value="{{old('zip')}}">
                            @error('zip')
                            <label class="error" for="zip">{{ $message }}</label>
                            @enderror
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="state">{{ __('message.State') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('state') is-invalid @enderror" wire:model.live="state" placeholder="{{ __('message.Enter state') }}" value="{{old('state')}}">
                            @error('state')
                            <label class="error" for="state">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="country">{{ __('message.Country') }} <span class="red">*</span></label>
                      <select class="form-control @error('country') is-invalid @enderror" wire:model="country" id="country">
                            <option value="{{old('country')}}">--{{ __('message.Select') }}--</option>
                            <option value="MY">Malaysia</option>
                            <option value="TH">Thailand</option>
                            <option value="VN">Vietnam</option>
                            <option value="ID">Indonesia</option>
                            <option value="US">United States</option>
                            <option value="PH">Philippines</option>
                            <option value="IN">India</option>
                            <option value="KH">Cambodia</option>
                            <option value="CN">China</option>
                      </select>
                            @error('country')
                            <label class="error" for="country">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                      <label for="landmark">{{ __('message.landmark') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('landmark') is-invalid @enderror" wire:model.live="landmark" placeholder="{{ __('message.Enter landmark') }}" value="{{old('landmark')}}">
                            @error('landmark')
                            <label class="error" for="landmark">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  
                  
                  
                  
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-xl mt-10">
                      <span>{{ __('message.Submit your Request') }}</span> </span> <i class="icon-arrow-right"></i>
                    </button>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </form>
              <div class="contact-panel-banner">
                <div class="widget widget-banner bg-overlay bg-overlay-secondary">
                  {{-- <div class="bg-img"><img src="{{ URL::to('website/assets/images/banners/4.jpg') }}" alt="background"></div> --}}
                  <div class="widget-content">
                    <h4 class="widget-title">{{ __('message.Process of Partner with Us for delivery foods') }}!</h4>
                    <p class="widget-desc mb-10"><span class="blue-Step">{{ __('message.Step') }}1:</span> {{ __('message.If you want to deliver foods with us then you should fill up this form') }}.</p>
                    <p class="widget-desc mb-10"><span class="blue-Step">{{ __('message.Step') }}2:</span> {{ __('message.In the next process G-CON Team will verify your informations and contact you') }}.</p>
                    <p class="widget-desc mb-10"><span class="blue-Step">{{ __('message.Step') }}3:</span> {{ __('message.G-con will share the contract with you') }}.</p>
                    <p class="widget-desc mb-10"><span class="blue-Step">{{ __('message.Step') }}4:</span> {{ __('message.G-CON will provide Login credentials of check the ordered foods') }}.</p>

                    <a href="contact-us.html" class="btn btn-white btn-block mb-30">
                      <span>{{ __('message.Contact Us') }}</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                    <a href="tel:+201061245741" class="phone-number d-flex align-items-center">
                      <i class="icon-phone mr-20"></i> <span>+855 69861444</span>
                    </a>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-banner -->
              </div>
            </div>
          </div><!-- /.contact-panel -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.contact layout 5 -->
