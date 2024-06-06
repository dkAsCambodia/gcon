<section class="pb-80">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading-layout2 text-center mb-50">
                <h2 class="heading-subtitle">{{ __('message.G-Entertainment') }} / {{ __('message.Booking Concert Table Invoice') }}</h2>
                {{-- <h3 class="heading-title">Providing the Diverse Needs of Your Patient Community</h3> --}}
              </div>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-10 offset-md-1">
          <div class="widget-plan">
            <div class="widget-body">
                <div class="text-block">
                    {{-- <h5 class="text-block-title">What We Do?</h5> --}}
                  </div><!-- /.text-block -->
                  <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="post-item">
                            <div class="post-img">
                            <a href="#">
                                <img src="{{ asset('storage/'.$tableDetails->tbl_img) ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdxXTJfjkJRIYLXuESrhcWOZFpV6b27WQFoXKXWMqxs_7X2HNR5b9h93oNkWszI6uNj2k&usqp=CAU' }}" height="200px" width="99%" alt="post image" loading="lazy">
                            </a>
                            </div><!-- /.post-img -->
                        </div><!-- /.post-item -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-12 col-md-6">
                        <div class="post-body">
                            <h4 class="post-title"><a href="#">{{ !empty($tableDetails->translationValue->tbl_name) ? ucwords($tableDetails->translationValue->tbl_name) : '' }}
                              </a></h4>
                            <p class="post-desc">{{ __('message.No. of people') }}: {{ !empty($tableDetails->translationValue->tbl_title) ? ucwords($tableDetails->translationValue->tbl_title) : '' }}</p>
                            <p class="post-desc">{{ !empty($tableDetails->translationValue->tbl_desc) ? ucwords($tableDetails->translationValue->tbl_desc) : '' }}</p>
                            <p class="post-desc">{{ !empty($tableDetails->translationValue->tbl_address) ? ucwords($tableDetails->translationValue->tbl_address) : '' }}</p>
                            
                          </div><!-- /.post-body -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12 col-md-6">
                      <br/>
                      <div class="pricing-widget-layout1">
                        <h5 class="pricing-title">{{ __('message.Customer Information') }}</h5>
                        <ul class="pricing-list list-unstyled mb-0">
                          <li><span>{{ __('message.Guest Name') }}</span><span>{{ !empty($transaction->name) ? ucfirst($transaction->name) : '' }}</span></li>
                          <li><span>{{ __('message.Phone Number') }}</span><span>{{ !empty($transaction->phone) ? ucfirst($transaction->phone) : '' }}</span></li>
                          <li><span>{{ __('message.Email') }}</span><span>{{ !empty($transaction->email) ? ucfirst($transaction->email) : '' }}</span></li>
                          <li><span>{{ __('message.Address') }}</span><span>{{ !empty($transaction->address) ? ucfirst($transaction->address) : '' }}</span></li>
                          <li><span>{{ __('message.No. of people') }}</span><span>{{ !empty($transaction->no_of_people) ? ucfirst($transaction->no_of_people) : '' }}</span></li>
                          <li><span>{{ __('message.Preferred seats') }}</span><span>{{ !empty($transaction->preferredSeats) ? ucfirst($transaction->preferredSeats) : '' }}</span></li>
                          <li><span>{{ __('message.Table quantity') }}</span><span>{{ !empty($transaction->quantity) ? ucfirst($transaction->quantity) : '' }}</span></li>
                          @if(!empty($transaction->payment_time))
                          <li><span>{{ __('message.Date') }}</span><span>{{ !empty($transaction->payment_time) ? ucfirst($transaction->payment_time) : '' }}</span></li>
                          @endif
                        </ul>
                      </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-12 col-md-6">
                      <div class="pricing-widget-layout2">
                        <h5 class="pricing-title">{{ __('message.Transaction Information') }}</h5>
                        <ul class="pricing-list list-unstyled mb-0">
                          <li><span>{{ __('message.OrderId') }}</span><span class="price">G-CON{{ date('Y')}}{{ !empty($transaction->id) ? $transaction->id : '' }}</span></li>
                          @if(!empty($transaction->transaction_id))
                          <li><span>{{ __('message.TransactionId') }}</span><span>{{ $transaction->transaction_id }}</span></li>
                          @endif
                          
                          <li><span>{{ __('message.Payment type') }}</span><span class="price">{{ !empty($transaction->paymentType) ? ucfirst($transaction->paymentType) : '' }}</span></li>
                          <li><span>{{ __('message.Concert booking date') }}</span><span>
                                <?php
                                if(!empty($transaction->concert_booking_date)){
                                    $date = DateTime::createFromFormat('Y-m-d', $transaction->concert_booking_date);
                                    echo $date->format('d M Y');
                                }
                                ?>
                            </span></li>
                          <li><span>{{ __('message.Concert arrival time') }}</span><span>{{ !empty($transaction->concert_arrival_time) ? $transaction->concert_arrival_time : '' }}</span></li>
                          <li><span>{{ __('message.Transaction Status') }}</span><span>{{ !empty($transaction->status) ? $transaction->status : '' }}</span></li>

                         
                          
                            @if($cancelButtonShow=='1')
                              <li><span>{{ __('message.Booking Status') }}</span><span class="text-danger">{{ $cancelButtonShow=='1' ? 'Cancelled' : '' }}</span></li>
                            @else
                              {{-- <li><button class="btn btn-danger" wire:click.prevent="cancelButtonfun({{ $transaction->id }})">{{ __('message.Cancel Booking') }}</button></li> --}}
                                @php
                                    $givenDate = new DateTime($transaction->concert_booking_date);
                                    $currentDate = new DateTime();
                                @endphp
                                @if ($givenDate > $currentDate && !empty(Session::get('memberdata')))  
                                    @if( $transaction->paymentType == 'online')
                                        <li><button href="/concertTable/{{ base64_encode($transaction->id) }}/cancellationPolicy/" wire:navigate class="btn btn-danger">{{ __('message.Cancel Booking') }}</button></li>
                                    @else
                                    <li><button class="btn btn-danger" wire:click.prevent="cancelButtonfun({{ $transaction->id }})">{{ __('message.Cancel Booking') }}</button></li>
                                @endif


                                @endif
                            @endif 
                         

                          
                          
                        </ul>
                      </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.widget-body -->
            <div class="widget-footer d-flex flex-wrap justify-content-between align-items-center">
              <div class="plan-price">{{ __('message.Total amount') }}</div>
              <div class="d-flex align-items-center">
                <div class="plan-price">{{ !empty($transaction->currency_symbol) ? $transaction->currency_symbol : '' }}{{ !empty($transaction->total_amount) ? $transaction->total_amount : '' }}<span class="period"><b>/{{ !empty($transaction->currency) ? $transaction->currency : '' }}</b></span></div>
                    &nbsp;
                    <div class="widget-download">
                        <button onclick="printAndHide()" class="btn btn-secondary btn-block">
                            <i class="icon-pdf-file btn-icon"></i>
                            <span class="btn-text">{{ __('message.Download PDF') }}&nbsp;&nbsp;</span>
                        </button>
                    </div><!-- /.widget-download -->
              </div>
              
            </div><!-- /.widget-footer -->
          </div><!-- /.widget-plan -->
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
    <script>
        function printAndHide() {
            // Hide the widget-download element
            var widgetDownload = document.querySelector('.widget-download');
            widgetDownload.style.display = 'none';
            // Use JavaScript to trigger print function
            window.print();
        }
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
        {{-- Code for Cancel Booking Js via sweetalert 2 START --}}
    <script>
          document.addEventListener('DOMContentLoaded', function () {
              window.addEventListener('show-cancel-confirmation', event => {
                  Swal.fire({
                      title: "{{ __('message.Are you sure?') }}",
                      text: "{{ __('message.You want to cancel this booking!') }}",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "{{ __('message.Yes, cancel it!') }}",
                      cancelButtonText: "{{ __('message.Cancel') }}"
                  }).then((result) => {
                      if (result.isConfirmed) {
                          if (typeof Livewire !== 'undefined' && typeof Livewire.dispatch === 'function') {
                              Livewire.dispatch('cancelConcertTicket');
                          } else {
                              console.error('Livewire is not available or dispatch function is not defined.');
                          }
                      }
                  });
              });
          });
        window.addEventListener('ticketCancelled', event => {
          Swal.fire(
              "{{ __('message.Cancelled') }}!",
              "{{ __('message.Your Booking has been Cancelled') }}.",
              'success'
            )
        });
    </script>
    {{-- Code for Cancel Booking Js via sweetalert 2 END --}}
  </section>