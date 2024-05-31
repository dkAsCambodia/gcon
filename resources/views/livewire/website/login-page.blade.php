<section class="contact-layout3 bg-overlay bg-overlay-primary-gradient">
      <!-- <div class="bg-img"><img src="{{ URL::to('website/assets/images/banners/6.jpg') }}" alt="banner"></div> -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7 offset-md-2">
            <div class="contact-panel">
                <form wire:submit.prevent="loginCheck" class="login-form">
                <h4 class="contact-panel-title">{{ __('message.Gcon Member Login') }}</h4>
                <p class="contact-panel-desc">{{ __('message.Please enter card ID and password to complete the Login process') }}!</p>
                  <div class="form-group">
                      <label for="email">{{ __('message.Gcon ID') }}</label>
                      <input type="text" class="form-control @error('card_number') is-invalid @enderror" wire:model.live="card_number" placeholder="{{ __('message.Enter Gcon ID') }}" value="" maxlength="6">
                              @error('card_number')
                              <label class="error" for="card_number">{{ $message }}</label>
                              @enderror
                  </div>
                  <p class="contact-panel-desc">{{ __('message.OR') }}</p>
                  <div class="form-group">
                      <label for="phone">{{ __('message.Phone Number') }}</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.live="phone" placeholder="{{ __('message.Enter phone number') }}" value="{{old('phone')}}" maxlength="12">
                      @error('phone')
                      <label class="error" for="phone">{{ $message }}</label>
                      @enderror
                  </div>
                <div class="form-group">
                        <label for="zip">{{ __('message.Password') }} <span class="red">*</span></label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.live="password" placeholder="{{ __('message.Enter password') }}">
                            @error('password')
                            <label class="error" for="name">{{ $message }}</label>
                            @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center mb-30">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label" for="rememberMe">{{ __('message.Remember me') }}!</label>
                    </div>
                    <a href="/forgetPassword" wire:navigate class="btn btn-secondary btn-link">Forget Password</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-10">
                    <span>{{ __('message.Login Now') }}</span> <i class="icon-arrow-right"></i>
                </button>
                <a href="/register" class="btn btn-primary btn-link btn-block">{{ __('message.Register') }}</a>
                </form>
            </div>
          </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 3 -->
