<section class="contact-layout5 bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="contact-panel">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-6">
                <h4 class="contact-panel-title">{{ __('message.Partner Providers Registration') }}</h4>
                <p class="contact-panel-desc mb-30">{{ __('message.Interested? Fill in the form below to become our partner and increase your revenue') }}!</p>
              </div>
              @if($submitform)
              <div class="alert alert-success">
                <p><b>{{ __('message.Thank you for your interest') }} {{$firstName ?? ''}}!</b></p>
                <p><b>{{ __('message.In the next few hours we will contact you, so that we can begin the selling process together') }}</b></p>
              </div>
              @endif
            </div>
            <div class="d-flex flex-wrap">
              <form wire:submit.prevent="saveSeller" class="contact-panel-form">
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="primary">{{ __('message.Restaurant/ Shop Name') }}<span class="red">*</span></label>
                      <input type="text" class="form-control @error('shopName') is-invalid @enderror" wire:model.live="shopName" placeholder="{{ __('message.Enter here') }}">
                              @error('shopName')
                              <label class="error" for="shopName">{{ $message }}</label>
                              @enderror
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="businessType">{{ __('message.Business Type') }} <span class="red">*</span></label>
                      <select class="form-control @error('businessType') is-invalid @enderror" wire:model.live="businessType">
                            <option value="">--{{ __('message.Select') }}--</option>
                            <option value="Restaurant">{{ __('message.Restaurant') }}</option>
                            <option value="Shop">{{ __('message.Shop') }}</option>
                      </select>
                            @error('businessType')
                            <label class="error" for="businessType">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="cuisine">{{ __('message.Cuisine') }}<span class="red">*</span></label>
                      <input type="text" class="form-control @error('cuisine') is-invalid @enderror" wire:model.live="cuisine" placeholder="{{ __('message.Enter here') }}">
                              @error('cuisine')
                              <label class="error" for="cuisine">{{ $message }}</label>
                              @enderror
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="firstName">{{ __('message.First/Given Name') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('firstName') is-invalid @enderror" wire:model.live="firstName" placeholder="{{ __('message.Enter first name') }}" value="{{old('firstName')}}">
                            @error('firstName')
                            <label class="error" for="firstName">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="lastName">{{ __('message.Last/ Family Name') }} <span class="red">*</span></label>
                      <input type="text" class="form-control @error('lastName') is-invalid @enderror" wire:model.live="lastName" placeholder="{{ __('message.Enter last name') }}" value="{{old('lastName')}}">
                            @error('lastName')
                            <label class="error" for="lastName">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->

                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group" >
                        <label for="phoneNumber">{{ __('message.Phone Number') }} <span class="red">*</span></label>
                        <input type="text" class="form-control phone-design @error('phoneNumber') is-invalid @enderror" wire:model.live="phoneNumber" placeholder="{{ __('message.Enter phone number') }}" value="{{old('phone')}}" maxlength="12">
                        @error('phoneNumber')
                        <label class="error" for="phoneNumber">{{ $message }}</label>
                        @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="email">{{ __('message.Email') }} <span class="red">*</span></label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" placeholder="{{ __('message.Enter email') }}" value="{{old('email')}}">
                            @error('email')
                            <label class="error" for="email">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
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
                  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="address">{{ __('message.Address') }}</label>
                      <textarea class="form-control" @error('address') is-invalid @enderror wire:model="address" placeholder="{{ __('message.Enter address') }}" value="{{old('address')}}" rows="6"></textarea>
                            @error('address')
                            <label class="error" for="address">{{ $message }}</label>
                            @enderror
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="shopImage">{{ __('message.Shop Image') }} <span class="red">*</span></label>
                      <input type='file'  @error('shopImage') is-invalid @enderror accept=".png, .jpg, .jpeg" wire:model="shopImage"/>
                      @error('shopImage')
                      <label class="error" for="address">{{ $message }}</label>
                      @enderror
                      <div wire:loading wire:target="shopImage" wire:key="shopImage"><i class="fa fa-spinner"></i> Uploading</div>

                      @if($shopImage)
                          <div class="post-item">
                            <div class="post-img">
                              <a href="blog-single-post.html">
                                <img src="{{ $shopImage->temporaryUrl() }}" alt="post image" height="300" width="400" style="border-radius:10px;" loading="lazy">
                              </a>
                            </div><!-- /.post-img -->
                          </div><!-- /.post-item -->
                      @endif
                     

                    </div>
                  </div>
                  
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-xl mt-10">
                      <span>{{ __('message.Submit your Request') }}</span> </span> <i class="icon-arrow-right"></i>
                    </button>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </form>
              <div class="contact-panel-banner">
                <div class="widget widget-banner bg-overlay bg-overlay-primary">
                  {{-- <div class="bg-img"><img src="{{ URL::to('website/assets/images/banners/4.jpg') }}" alt="background"></div> --}}
                  <div class="widget-content">
                    <h4 class="widget-title">{{ __('message.Process of Partner with Us') }}!</h4>
                    <p class="widget-desc mb-10"><span class="red">{{ __('message.Step') }}1:</span> {{ __('message.If you want to sell foods with us then you should fill up this form') }}.</p>
                    <p class="widget-desc mb-10"><span class="red">{{ __('message.Step') }}2:</span> {{ __('message.In the next process G-CON Team will verify your informations and contact you') }}.</p>
                    <p class="widget-desc mb-10"><span class="red">{{ __('message.Step') }}3:</span> {{ __('message.G-con will share the contract with you') }}.</p>
                    <p class="widget-desc mb-10"><span class="red">{{ __('message.Step') }}4:</span> {{ __('message.G-CON will provide Login credentials of Seller Dashboard') }}.</p>
                    <p class="widget-desc mb-10"><span class="red">{{ __('message.Step') }}5:</span> {{ __("message.You can add your banner, Restaurant, Restaurant's category, Restaurant's food etc") }}.</p>
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
