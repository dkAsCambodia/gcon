<section class="pb-40">
      <div class="container">
        <div class="row">
          
          <div class="col-sm-12 col-md-12 col-lg-8 offset-md-2">
            <div class="contact-panel">
              <form wire:submit.prevent="save" class="contact-panel-form">
              @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="contact-panel-title">{{ __('message.Member Registration') }}</h4>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="membertype">{{ __('message.Type of Member') }} <span class="red">*</span></label>
                      <select class="form-control @error('membertype') is-invalid @enderror" wire:model.live="membertype">
                            <option value="">--{{ __('message.Select') }}--</option>
                            @if(!empty($members))
                            @foreach($members as $key => $member)
                            <option value="{{ $member->id }}">{{ $member->member_type_name }}</option>
                            @endforeach
                            @endif
                      </select>
                            @error('membertype')
                            <label class="error" for="membertype">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="card_number">{{ __('message.Gcon ID') }}<span class="red">*</span></label>
                      <input type="text" class="form-control @error('card_number') is-invalid @enderror" wire:model.live="card_number" placeholder="{{ __('message.Enter Gcon ID') }}" value="" maxlength="6">
                            @error('card_number')
                            <label class="error" for="card_number">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
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
                        <label for="phone">{{ __('message.Phone Number') }} <span class="red">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.live="phone" placeholder="{{ __('message.Enter phone number') }}" value="{{old('phone')}}" maxlength="12">
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
                      <label for="password">{{ __('message.Password') }} <span class="red">*</span></label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.live="password" placeholder="{{ __('message.Enter password') }}">
                            @error('password')
                            <label class="error" for="password">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="issue_by">{{ __('message.Issue By') }} <span class="red">*</span></label>
                        <select class="form-control @error('issue_by') is-invalid @enderror" wire:model="issue_by" id="issue_by">
                                <option value="{{old('issue_by')}}">--{{ __('message.Select') }}--</option>
                                @if(!empty($AuthorizedBye))
                                @foreach($AuthorizedBye as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->authorized_by }}</option>
                                @endforeach
                                @endif
                        </select>
                            @error('issue_by')
                            <label class="error" for="issue_by">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-12">
                    <div class="border-top mb-30"></div>
                    <p class="mb-30">{{ __('message.Kindly provide your personal informations below') }}:</p>
                    <div class="form-group">
                      <label for="address">{{ __('message.Address') }}</label>
                      <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model="address" placeholder="{{ __('message.Enter address') }}" value="{{old('address')}}">
                            @error('address')
                            <label class="error" for="address">{{ $message }}</label>
                            @enderror
                    </div>
                  </div><!-- /.col-lg-12 -->
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
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="line_id">{{ __('message.Line ID') }}</label>
                      <input type="text" class="form-control @error('line_id') is-invalid @enderror" wire:model="line_id" placeholder="{{ __('message.Enter line id') }}" value="{{old('line_id')}}">
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="facebook_id">{{ __('message.Facebook') }}</label>
                      <input type="text" class="form-control @error('facebook_id') is-invalid @enderror" wire:model="facebook_id" placeholder="{{ __('message.Enter Facebook link') }}" value="{{old('facebook_id')}}">
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="instagram">{{ __('message.Instagram') }}</label>
                      <input type="text" class="form-control @error('instagram') is-invalid @enderror" wire:model="instagram" placeholder="{{ __('message.Enter Instagram link') }}" value="{{old('instagram')}}">
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-secondary btn-block">
                      <span>{{ __('message.Submit') }}</span> <i class="icon-arrow-right"></i>
                    </button>
                  </div>
                </div><!-- /.row -->
              </form>
            </div>
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
