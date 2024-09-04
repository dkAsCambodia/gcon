<section class="pb-80">
    {{-- <div class="container"> --}}
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3">
          <aside class="sidebar has-marign-right sticky-top mb-50">
            <div class="widget widget-categories">
              <h5 class="widget-title">{{ __('message.My Dashboard') }}</h5>
              <div class="widget-content">
                @include('livewire.website.dashboard.sidebar')
              </div><!-- /.widget-content -->
            </div><!-- /.widget-categories -->
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-12 col-md-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                  <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>{{ __('message.Sr. no.') }}</th>
                          <th>{{ __('message.G-Entertainment') }}</th>
                          <th>{{ __('message.OrderId') }}</th>
                          <th>{{ __('message.TransactionId') }}</th>
                          <th>{{ __('message.Table quantity') }}</th>
                          <th>{{ __('message.Total amount') }}</th>
                          <th>{{ __('message.Concert booking date') }}</th>
                          <th>{{ __('message.View') }}</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse($ConcertBookingList as $key => $tablerow)
                        
                        <tr class="cart-product">
                          <td class="cart-product-total">{{ $key+1  ?? ''}}</td>
                          <td class="d-flex align-items-center">
                            <div class="cart-product-img">
                              <img src="{{ asset('storage/'.$tablerow->bookingTable->tbl_img) ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdxXTJfjkJRIYLXuESrhcWOZFpV6b27WQFoXKXWMqxs_7X2HNR5b9h93oNkWszI6uNj2k&usqp=CAU' }}" height="50px" width="50px" alt="product" />
                            </div>
                            <h5 class="cart-product-title">{{ $tablerow->bookingTable->translationValue->tbl_name ?? ''}}</h5>
                          </td>
                          <td class="cart-product-total">G-CON{{ date('Y')}}{{ !empty($tablerow->id) ? $tablerow->id : '' }}</td>
                          <td class="cart-product-total">{{ $tablerow->transaction_id ?? ''}}</td>
                          <td class="cart-product-price">{{ $tablerow->quantity ?? ''}}</td>
                          <td class="cart-product-total">{{ $tablerow->currency_symbol ?? ''}}{{ $tablerow->total_amount ?? ''}}</td>
                          <td class="cart-product-total"><?php
                            if(!empty($tablerow->concert_booking_date)){
                                $date = DateTime::createFromFormat('Y-m-d', $tablerow->concert_booking_date);
                                echo $date->format('d M Y');
                            }
                            ?></td>
                          <td class="cart-product-quantity"><a class="btn btn-primary btn-link btn-block" href="/invoice/{{ base64_encode($tablerow->total_amount) }}/{{ $tablerow->currency_symbol }}/{{ base64_encode($tablerow->currency) }}/{{ base64_encode($tablerow->id) }}"  >{{ __('message.View More') }}</a></td>
                        </tr>
                        @empty
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span>{{ __('message.Not Found') }}!</span><span class="price"></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        @endforelse
                      
                      </tbody>
                    </table>
                  </div><!-- /.cart-table -->
                </div><!-- /.col-lg-12 -->
      
                {{-- <div class="col-sm-12 col-md-6 col-lg-4">
                  <div class="cart-total-amount">
                    <h6>Cart Totals</h6>
                    <ul class="list-unstyled mb-30">
                      <li><span> Subtotal :</span><span>$ 140.00</span></li>
                      <li><span> Total :</span><span class="font-weight-bold">$ 140.00</span></li>
                    </ul>
                    <a href="#" class="btn btn-secondary">Proceed To Checkout</a>
                  </div><!-- /.cart-total-amount -->
                </div><!-- /.col-lg-6 --> --}}
              </div><!-- /.row -->
          
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    {{-- </div><!-- /.container --> --}}

  </section>

  