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
                  <a href="#"> {{ __('message.G-Booking') }} </a>
                  </li>
                  <li class="breadcrumb-item">
                  <a href="/GBooking/BookingRestaurant" wire:navigate>{{ __('message.Booking Restaurants') }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('message.Seating Layout') }}</li>
              </ol>
              </nav>
          </div><!-- /.container -->
        </div><!-- /.breadcrumb-area --> 
      </section><!-- /.page-title -->
    <div class="blog-layout2">
        <div class="container">
          <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <!-- Post Item #1 -->
                    <div class="post-item featured-post">
                            <div class="post-img">
                            <a href="#">
                                <img src="{{ asset('storage/'.$restaurantData->imgRestaurant) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="post image"  height="370px" loading="lazy">
                            </a>
                            </div><!-- /.post-img -->
                            {{-- <div class="post-body">
                                <div class="post-meta d-flex align-items-center">
                                    <div class="post-meta-cat">
                                    <a href="/GEntertainment/events/seatinglayout/{{base64_encode($restaurantData->id)}}" wire:navigate>{{!empty($restaurantData->event_date) ? date('d M Y', strtotime($restaurantData->event_date)) : ''}}</a>
                                    </div><!-- /.blog-meta-cat -->
                                </div>
                                <a href="/GEntertainment/events/seatinglayout/{{base64_encode($restaurantData->id)}}" wire:navigate class="btn btn-link">
                                    <i class="plus-icon">+</i>
                                    <span>Read More</span>
                                </a>
                            </div><!-- /.post-body --> --}}
                    </div><!-- /.post-item -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <!-- Post Item #1 -->
                    <div class="post-item featured-post">
                            <div class="post-img">
                            <a href="#">
                                <img src="{{ URL::to('website/assets/images/saiku2.jpg') }}" alt="post image"  height="370px" loading="lazy">
                            </a>
                            </div><!-- /.post-img -->
                            {{-- <div class="post-body">
                                <div class="post-meta d-flex align-items-center">
                                    <div class="post-meta-cat">
                                    <a href="#">{{ __('message.Seating Layout') }}</a>
                                    </div><!-- /.blog-meta-cat -->
                                </div>
                                <a href="/GEntertainment/events/seatinglayout/{{base64_encode($restaurantData->id)}}" wire:navigate class="btn btn-link">
                                    <i class="plus-icon">+</i>
                                    <span>Read More</span>
                                </a>
                            </div><!-- /.post-body --> --}}
                    </div><!-- /.post-item -->
                </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.blog Grid -->
      {{-- <section> --}}
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-md-2">
              <div class="contact-panel">
                <form wire:submit.prevent="saveconcertForm" class="contact-panel-form">
                @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="contact-panel-title">{{ __('message.Booking Restaurant Table Form') }}</h4>
                    </div>
                   
                    
                    <div class="col-sm-3 col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="date">{{ __('message.Select date') }} <span class="red">*</span></label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" wire:model="date" min="{{ $date }}" id="selectdate">
                              @error('date')
                              <label class="error" for="date">{{ $message }}</label>
                              @enderror
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-3 col-md-3 col-lg-3">
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
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                          <label for="no_of_people">{{ __('message.No. of people') }} <span class="red">*</span></label>
                          <input type="text" class="form-control @error('no_of_people') is-invalid @enderror" wire:model.live="no_of_people" placeholder="{{ __('message.Enter no. of people') }}" maxlength="2">
                                @error('no_of_people')
                                <label class="error" for="no_of_people">{{ $message }}</label>
                                @enderror
                        </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-3 col-md-3 col-lg-3">
                      <div class="form-group">
                          <label for="Preferred">{{ __('message.Preferred seats') }}</label>
                            <select class="form-control" wire:model="preferredSeats">
                                    <option value="">--{{ __('message.Select') }}--</option>
                                    <option value="Seat near the restroom">{{ __('message.Seat near the restroom') }}</option>
                                    <option value="Birthday surprise">{{ __('message.Birthday surprise') }}</option>
                                    <option value="Child seats">{{ __('message.Child seats') }}</option>
                                    <option value="Other">{{ __('message.Other') }}</option>
                            </select>
                        </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="tbl_amount">{{ __('message.Flat fee') }} (฿)</label>
                      <input type="text" class="form-control" wire:model="flat_fee" readonly>
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
                        <label for="special_request">{{ __('message.Special Requests') }} <span class="red">*</span></label>
                        <input type="text" class="form-control" wire:model="special_request">
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
                                    <option value="cash on delivery">{{ __('message.Cash Deposit') }}</option>
                                    <option value="online">{{ __('message.Online Payment') }}</option>
                                </select>
                                @error('paymentType')
                                  <label class="error" for="paymentType">{{ $message }}</label>
                                @enderror
                            </div>
                    </div><!-- /.col-lg-6 -->
                   
                    <div class="col-12">
                      <button type="submit" wire:click="loading = true" wire:loading.attr="disabled" class="btn btn-secondary btn-block">
                        <span>{{ __('message.Book Table Now') }} {{ $tbl_price ?? '' }}</span> <i class="icon-arrow-right"></i>
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
      {{-- </section> --}}

      <br/>
</div>
