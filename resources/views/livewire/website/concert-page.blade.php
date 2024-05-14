<section class="services-layout2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-filter d-flex flex-wrap justify-content-center list-unstyled mb-30">
                    <li><a class="filter" href="#" data-filter="all">{{ __('message.ALL') }}</a></li>
                    @forelse($categorydata as $catrow)
                        <li>
                            <a class="filter active" href="#" data-filter=".{{ $catrow->id ?? 'dd'}}">
                                {{-- {{ $catrow && $catrow->translationValuecat && $catrow->translationValuecat->cat_name ? $catrow->translationValuecat->cat_name : '--' }} --}}
                                {{ strtoupper($catrow?->translationValuecat?->cat_name) ?? '--' }}
                            </a>
                        </li>
                    @empty
                        <li><span>{{ __('message.Not Found') }}! </span><span class="price"></span></li>
                    @endforelse

                </ul><!-- /.portfolio-filter  -->
            </div><!-- /.col-lg-12 -->
        </div>
        <div id="filtered-items" class="row">
            @forelse($tableProductlist as $tablerow)
                <!-- service item #1 -->
                <div class="col-sm-12 col-md-12 col-lg-6 mix {{ $tablerow->cat_id ?? 'dd' }}">
                    <div class="service-item">
                        <div class="service-img">
                            <div class="bg-img"><img
                                    src="{{ asset('storage/'.$tablerow->tbl_img) ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdxXTJfjkJRIYLXuESrhcWOZFpV6b27WQFoXKXWMqxs_7X2HNR5b9h93oNkWszI6uNj2k&usqp=CAU' }}"
                                    alt="service"></div>
                        </div><!-- /.service-img -->
                        <div class="service-body">
                            <div class="service-category">
                                <a href="/GEntertainment/concertForm/{{ base64_encode($tablerow->id) }}" wire:navigate>{{ __('message.No of people') }}</a>
                                <a href="/GEntertainment/concertForm/{{ base64_encode($tablerow->id) }}" wire:navigate>{{ !empty($tablerow->translationValue->tbl_title) ? ucwords($tablerow->translationValue->tbl_title) : '' }}</a>
                            </div>
                            <h4 class="service-title">
                                <a href="/GEntertainment/concertForm/{{ base64_encode($tablerow->id) }}" wire:navigate>{{ !empty($tablerow->translationValue->tbl_name) ? ucwords($tablerow->translationValue->tbl_name) : '' }}</a>
                            </h4>
                            <p class="service-desc">
                                {{ !empty($tablerow->translationValue->tbl_desc) ? ucwords($tablerow->translationValue->tbl_desc) : '' }}
                            </p>
                            <p class="service-desc">{{ __('message.Address') }} : 
                                {{ !empty($tablerow->translationValue->tbl_address) ? ucwords($tablerow->translationValue->tbl_address) : 'Beer city Zone 3' }}
                            </p>
                            <h5 class="service-title">{{ __('message.Price') }} :{{ !empty($tablerow->currencydata->currency_symbol	) ? $tablerow->currencydata->currency_symbol : '' }}{{ !empty($tablerow->tbl_price) ? $tablerow->tbl_price : '' }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ !empty($tablerow->discount) ? 'Discount : '.$tablerow->discount.'%' : '' }}</h5>
                            <a href="/GEntertainment/concertForm/{{ base64_encode($tablerow->id) }}" wire:navigate class="btn btn-link btn-primary">
                                <i class="fa fa-long-arrow-right"></i><span>{{ __('message.Book Now') }}</span>
                            </a>
                        </div><!-- /.service-body -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
            @empty
                <li><span>{{ __('message.Not Found') }}!</span><span class="price"></span></li>
            @endforelse
        </div><!-- /.row -->
        {{-- <div class="row">
        <div class="col-12 text-center">
          <nav class="pagination-area">
            <ul class="pagination justify-content-center mb-0">
              <li><a class="current" href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#"><i class="icon-arrow-right"></i></a></li>
            </ul>
          </nav><!-- .pagination-area -->
        </div><!-- /.col-12 -->
      </div> --}}
    </div><!-- /.container -->
</section><!-- /.Services Layout 2 -->
