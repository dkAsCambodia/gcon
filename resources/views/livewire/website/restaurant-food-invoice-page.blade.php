<div>
    <section class="page-title-layout4 py-0">
        <div class="breadcrumb-area">
        <div class="container">
            <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                <a href="index.html"><i class="icon-home"></i> <span>{{ __('message.Home') }}</span></a>
                </li>
                <li class="breadcrumb-item">
                <a href="about-us.html"> {{ __('message.G-Booking') }} </a>
                </li>
                <li class="breadcrumb-item">
                <a href="supplies.html">{{ __('message.Restaurants') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Invoice') }}</li>
            </ol>
            </nav>
        </div><!-- /.container -->
        </div><!-- /.breadcrumb-area --> 
    </section><!-- /.page-title -->

    <section class="pb-10 mb-10">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10 offset-md-1">
              <div class="widget-plan">
                <div class="widget-body">
                    <div class="text-block">
                        {{-- <h5 class="text-block-title">What We Do?</h5> --}}
                      </div><!-- /.text-block -->
                        <div class="row">
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>{{ __('message.Your items') }}</th>
                                    <th>{{ __('message.Price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($OrderedcartList as $cartrow)
                                        <tr class="cart-product">
                                            <td class="d-flex align-items-center">
                                                <div class="cart-product-img">
                                                    <a href="void:javascript()" wire:click="loadFoodDetails( {{ $cartrow->id }} )" wire:loading.attr="disabled" data-toggle="modal" data-target="#myModal">
                                                <img src="{{ asset('storage/'.$cartrow->food_img ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="50px" width="100%" alt="product" />
                                                    </a>
                                                </div>
                                                <a href="void:javascript()" wire:click="loadFoodDetails( {{ $cartrow->id }} )" wire:loading.attr="disabled" data-toggle="modal" data-target="#myModal">
                                                    <h5 class="cart-product-title">{{ !empty($cartrow->quantity) ? $cartrow->quantity : '1' }} x {{ !empty($cartrow->translationValue->food_translation_name) ? ucwords($cartrow->translationValue->food_translation_name) : 'item' }}</h5>
                                                </a>
                                            </td>
                                            <td class="cart-product-price">{{ !empty($cartrow->currency_symbol) ? $cartrow->currency_symbol : '' }} {{ !empty($cartrow->price) ? $cartrow->price*$cartrow->quantity : '' }}</td>
                                           
                                        </tr>
                                    @empty
                                    <li>{{ __('message.Empty Cart') }}</li>
                                    @endforelse
                                </tbody>
                                </table>
                            </div><!-- /.cart-table -->
                        </div><!-- /.row -->
                        {{-- <hr/> --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                              <div class="heading-layout2 text-center mb-50">
                                <p><span class="text-dark font-weight-bold">Order</span>  #<span class="text-dark font-weight-bold">{{ !empty($transactiondata->order_key) ? $transactiondata->order_key : '' }}</span></p>
                                    @if(!empty($transactiondata->order_date))
                                        <p>{{ __('message.Order on') }} :  <?php $formattedDate = date("d M h:i", strtotime($transactiondata->order_date));
                                                echo strtoupper($formattedDate);?>
                                            </p>
                                    @endif
                              </div>
                            </div><!-- /.col-lg-6 -->
                          </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="about-Text">
                                    @if(!empty($shipAddress))
                                       
                                        <ul class="features-list-layout2 list-unstyled">
                                            <li class="feature-item">
                                                <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;:&nbsp;&nbsp;
                                                <p class="feature-title mb-0"><span class="text text-secondary">{{ __('message.Order from') }}</span><br/>{{ $restaurantDetails->restaurantName ?? 'GCON Restaurant' }} ({{ !empty($restaurantDetails->address) ? ($restaurantDetails->address) : 'Poi Pet' }})</p>
                                            </li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</li>
                                            <li class="feature-item">
                                                <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;:&nbsp;&nbsp; 
                                                <p class="feature-title mb-0"><span class="text text-secondary">{{ __('message.Delivered to') }}</span><br/>{{ $shipAddress->address ?? '' }}, {{ $shipAddress->city ?? '' }}, {{ $shipAddress->state ?? '' }}, {{ $shipAddress->landmark ?? '' }}</p>
                                            </li>
                                        </ul>  
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="cart-total-amount">
                            <ul class="list-unstyled mb-30">
                                @if(!empty($transactiondata->TransactionId))
                                <li><span> {{ __('message.TransactionId') }} :</span><span>{{ !empty($transactiondata->TransactionId) ? $transactiondata->TransactionId : '' }}</span></li>
                                @endif
                            <li><span> {{ __('message.Payment type') }} :</span><span>{{ !empty($transactiondata->payment_type) ? $transactiondata->payment_type : '' }}</span></li>
                            <li><span> {{ __('message.Status') }} :</span><span>{{ !empty($transactiondata->order_status) ? $transactiondata->order_status : '' }}</span></li>
                            
                            <li><span> {{ __('message.Subtotal') }} :</span><span>{{ !empty($transactiondata->currency_symbol) ? $transactiondata->currency_symbol : '' }} {{$transactiondata->subTotal ?? ''}}</span></li>
                            <li><span> {{ __('message.Charge') }} :</span><span class="font-weight-bold">{{ !empty($transactiondata->currency_symbol) ? $transactiondata->currency_symbol : '' }} {{ $transactiondata->charge ?? '0'}}</span></li>
                            <li><span> <h4>{{ __('message.Total') }} :</h4> <span class="text text-secondary">({{ __('message.incl. fees and tax') }})</span> </span><h4><span class="font-weight-bold">{{ !empty($transactiondata->currency_symbol) ? $transactiondata->currency_symbol : '' }} {{$transactiondata->totalPayAmount ?? ''}}</span></h4></li>
                            </ul>
                            </div><!-- /.cart-total-amount -->
                            </div>
                        </div>
                </div><!-- /.widget-body -->
                <div class="widget-footer d-flex flex-wrap justify-content-between align-items-center">
                  <div class="plan-price">{{ __('message.Total amount') }}</div>
                  <div class="d-flex align-items-center">
                    <div class="plan-price">{{ !empty($transactiondata->currency_symbol) ? $transactiondata->currency_symbol : '' }}{{ !empty($transactiondata->totalPayAmount) ? $transactiondata->totalPayAmount : '' }}<span class="period"><b>/{{ !empty($transactiondata->currency) ? $transactiondata->currency : '' }}</b></span></div>
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



    
</div>
