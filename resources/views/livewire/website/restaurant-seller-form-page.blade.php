<section class="contact-layout5 bg-secondary">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    .avatar-upload {
      position: relative;
      max-width: 205px;
      margin: 50px auto;
    }
    .avatar-upload .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }
    .avatar-upload .avatar-edit input {
      display: none;
    }
    .avatar-upload .avatar-edit input + label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid transparent;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
      content: "\f040";
      font-family: 'FontAwesome';
      color: #757575;
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }
    .avatar-upload .avatar-preview {
      width: 192px;
      height: 192px;
      position: relative;
      border-radius: 100%;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
    </style>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="contact-panel">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-6">
                <h4 class="contact-panel-title">{{ __('message.Partner Providers Registration') }}</h4>
                <p class="contact-panel-desc mb-30">{{ __('message.Interested? Fill in the form below to become our partner and increase your revenue') }}!</p>
              </div>
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
                        <label for="phone">{{ __('message.Phone Number') }} <span class="red">*</span></label>
                        <input type="text" class="form-control phone-design @error('phone') is-invalid @enderror" wire:model.live="phone" placeholder="{{ __('message.Enter phone number') }}" value="{{old('phone')}}" maxlength="12">
                        @error('phone')
                        <label class="error" for="phone">{{ $message }}</label>
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
                     <!-- For image Preview --> 
                          <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" wire:model="shopImage"/>
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(https://lh5.googleusercontent.com/proxy/t08n2HuxPfw8OpbutGWjekHAgxfPFv-pZZ5_-uTfhEGK8B5Lp-VN4VjrdxKtr8acgJA93S14m9NdELzjafFfy13b68pQ7zzDiAmn4Xg8LvsTw1jogn_7wStYeOx7ojx5h63Gliw);">
                                </div>
                            </div>
                        </div>
                      <!-- For image Preview  -->
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
                  <div class="bg-img"><img src="{{ URL::to('website/assets/images/banners/4.jpg') }}" alt="background"></div>
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
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script> --}}
    <script>
      function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $("#imageUpload").change(function() {
      readURL(this);
  });
    </script>
  </section><!-- /.contact layout 5 -->
