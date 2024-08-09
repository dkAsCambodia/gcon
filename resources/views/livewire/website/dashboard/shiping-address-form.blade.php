<section class="pb-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
          <aside class="sidebar has-marign-right sticky-top mb-50">
            <div class="widget widget-categories">
              <h5 class="widget-title">{{ __('message.My Dashboard') }}</h5>
              <div class="widget-content">
                @include('livewire.website.dashboard.sidebar')
              </div><!-- /.widget-content -->
            </div><!-- /.widget-categories -->
            
           
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-12 col-md-12 col-lg-8">
          {{-- <div class="tabcontent widget-plan mb-60" id="profile">
            
          </div><!-- /.widget-plan --> --}}
          <div class="row">
          
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="contact-panel">
                <form wire:submit.prevent="updateshippingaddress" class="contact-panel-form">
                @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="contact-panel-title">{{ __('message.My shipping address') }}</h4>
                    </div>
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
                      <div class="form-group">
                          <label for="mobile">{{ __('message.Phone Number') }} <span class="red">*</span></label>
                          <input type="text" class="form-control @error('mobile') is-invalid @enderror" wire:model.live="mobile" placeholder="{{ __('message.Enter phone number') }}" maxlength="12" >
                                @error('mobile')
                                    <label class="error" for="mobile">{{ $message }}</label>
                                @enderror
                      </div>
                    </div><!-- /.col-lg-6 -->
                    {{-- <div class="col-12">
                      <div class="border-top mb-30"></div>
                      <p class="mb-30">{{ __('message.Kindly provide your personal informations below') }}:</p>
                    </div><!-- /.col-lg-12 --> --}}
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="address">{{ __('message.Address') }} <span class="red">*</span></label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model="address" placeholder="{{ __('message.Enter address') }}" value="{{old('address')}}">
                              @error('address')
                              <label class="error" for="address">{{ $message }}</label>
                              @enderror
                      </div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <div class="form-group">
                        <label for="city">{{ __('message.City') }} <span class="red">*</span></label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model.live="city" placeholder="{{ __('message.Enter city') }}" value="{{old('city')}}">
                              @error('city')
                              <label class="error" for="name">{{ $message }}</label>
                              @enderror
                      </div>
                    </div><!-- /.col-lg-4 -->
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
                              <option value="Cambodia">Cambodia</option>
                              <option value="Thailand">Thailand</option>
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
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label for="zip">{{ __('message.zip') }} <span class="red">*</span></label>
                          <input type="text" class="form-control @error('zip') is-invalid @enderror" wire:model.live="zip" placeholder="{{ __('message.Enter zip') }}" maxlength="6" value="{{old('zip')}}">
                                @error('zip')
                                <label class="error" for="zip">{{ $message }}</label>
                                @enderror
                        </div>
                    </div><!-- /.col-lg-6 -->
                    
                    <div class="col-12">
                      <button type="submit" class="btn btn-secondary btn-block">
                        <span>{{ __('message.Save') }}</span> <i class="icon-arrow-right"></i>
                      </button>
                      <a href="/dashboard" wire:navigate class="btn btn-primary btn-link btn-block">{{ __('message.Back') }}</a>
                    </div>
                  </div><!-- /.row -->
                </form>
              </div>
            </div><!-- /.col-lg-8 -->
          </div><!-- /.row -->
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /.container -->

  </section>

  