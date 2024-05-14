<section class="contact-layout3 bg-overlay bg-overlay-primary-gradient">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-7 offset-md-2">
              
              {{-- @if($showDiv)
                <form class="login-form"><br/><br/>
                  <div class="form-group">
                    <h4 class="service-title">{{ __('message.Gcon ID') }} : {{$user?->card_number ?? ''}}</h4>
                    <p for="Password">{{ __('message.Password') }} : {{base64_decode($user?->password) ?? ''}}</p>
                  </div><br/>
                </form>
              @else --}}
                <form wire:submit.prevent="CheckUser" class="login-form">
                  <h4 class="contact-panel-title">{{ __('message.Forget password') }}</h4>
                  <p class="contact-panel-desc">{{ __('message.Please enter Email to complete the forget password process') }}!</p>
                  <div class="form-group">
                    <label for="email">{{ __('message.Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" placeholder="{{ __('message.Enter email') }}">
                          @error('email')
                          <label class="error" for="email">{{ $message }}</label>
                          @enderror
                  </div>
                  <button type="submit" class="btn btn-primary btn-block mb-10">
                      <span>{{ __('message.Continue') }}</span> <i class="icon-arrow-right"></i>
                  </button>
                  <a href="/register" wire:navigate class="btn btn-primary btn-link btn-block">{{ __('message.Register') }}</a>
                </form>
              {{-- @endif --}}
        </div><!-- /.col-lg-7 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.contact layout 3 -->
