<div>
    <section class="shop">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9">
              <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
                <span><h2><strog>Popular (Most ordered right now)</strog></h2></span>
                <select>
                    <option selected value="">Select category </option>
                    @forelse($calegoryList as $catrow)
                    <option value="0">{{ !empty($catrow->translationValue->cat_translation_name) ? ucwords($catrow->translationValue->cat_translation_name) : '' }}</option>
                    @empty
                    <li></li>
                    @endforelse
                </select>
              </div>
              <div class="row">

                @forelse($foodList as $foodrow)
                    <!-- Product item #1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="product-item">
                        <div class="product-img">
                        <img src="{{ asset('storage/'.$foodrow->food_img ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="250px" width="100%" alt="Product" loading="lazy">
                        <div class="product-action">
                            <a href="#" class="btn btn-secondary">
                            <i class="icon-cart"></i> <span>Add To Cart</span>
                            </a>
                        </div><!-- /.product-action -->
                        </div><!-- /.product-img -->
                        <div class="product-info">
                        <h4 class="product-title"><a href="supplies-single.html">{{ !empty($foodrow->translationValue->food_translation_name) ? ucwords($foodrow->translationValue->food_translation_name) : '' }}</a></h4>
                        <p class="post-desc">{{ !empty($foodrow->translationValue->translation_desc) ? ucwords($foodrow->translationValue->translation_desc) : '' }}</p>
                        <span class="product-price">{{ !empty($foodrow->getcurrencyData->currency_symbol) ? ucwords($foodrow->getcurrencyData->currency_symbol) : '' }}{{ !empty($foodrow->price) ? ucwords($foodrow->price) : '' }}</span>
                        </div><!-- /.product-content -->
                    </div><!-- /.product-item -->
                    </div><!-- /.col-lg-4 -->
                @empty
                <li></li>
                @endforelse
                
                <!-- Product item #9 -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="product-item">
                    <div class="product-img">
                      <img src="{{ URL::to('website/assets/images/products/9.jpg') }}" alt="Product" loading="lazy">
                      <div class="product-action">
                        <a href="#" class="btn btn-secondary">
                          <i class="icon-cart"></i> <span>Add To Cart</span>
                        </a>
                      </div><!-- /.product-action -->
                    </div><!-- /.product-img -->
                    <div class="product-info">
                      <h4 class="product-title"><a href="supplies-single.html">Blood Pressure</a></h4>
                      <span class="product-price">$18.99</span>
                    </div><!-- /.product-content -->
                  </div><!-- /.product-item -->
                </div><!-- /.col-lg-4 -->
              </div><!-- /.row -->
              
            </div><!-- /.col-lg-9 -->
            <div class="col-sm-12 col-md-4 col-lg-3">
              <aside class="sidebar-layout2">
                <div class="widget widget-categories-layout2">
                  <h5 class="widget-title">Categories</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="DkactiveItem">All</a></li>
                        @forelse($calegoryList as $catrow)
                         <li><a href="#">{{ !empty($catrow->translationValue->cat_translation_name) ? ucwords($catrow->translationValue->cat_translation_name) : '' }}</a></li>
                        @empty
                            <li></li>
                        @endforelse
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
                <div class="widget widget-search">
                  <h5 class="widget-title">Search</h5>
                  <div class="widget-content">
                    <form class="widget-form-search">
                      <input type="text" class="form-control" placeholder="Search...">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search -->
                <div class="widget widget-poducts">
                  <h5 class="widget-title">Best Sellers</h5>
                  <div class="widget-content">
                    <!-- product item #1 -->
                    <div class="widget-product-item d-flex align-items-center">
                      <div class="widget-product-img">
                        <a href="#"><img src="{{ URL::to('website/assets/images/products/11.jpg') }}" alt="Product" loading="lazy"></a>
                      </div><!-- /.product-product-img -->
                      <div class="widget-product-content">
                        <h5 class="widget-product-title"><a href="supplies-single.html">Calming Herps</a></h5>
                        <span class="widget-product-price">$ 38.00</span>
                      </div><!-- /.widget-product-content -->
                    </div><!-- /.widget-product-item -->
                    <!-- product item #2 -->
                    <div class="widget-product-item d-flex align-items-center">
                      <div class="widget-product-img">
                        <a href="#"><img src="{{ URL::to('website/assets/images/products/10.jpg') }}" alt="Product" loading="lazy"></a>
                      </div><!-- /.product-product-img -->
                      <div class="widget-product-content">
                        <h5 class="widget-product-title"><a href="supplies-single.html">Goji Powder</a></h5>
                        <span class="widget-product-price">$ 33.00</span>
                      </div><!-- /.widget-product-content -->
                    </div><!-- /.widget-product-item -->
                    <!-- product item #3 -->
                    <div class="widget-product-item d-flex align-items-center">
                      <div class="widget-product-img">
                        <a href="#"><img src="{{ URL::to('website/assets/images/products/12.jpg') }}" alt="Product" loading="lazy"></a>
                      </div><!-- /.product-product-img -->
                      <div class="widget-product-content">
                        <h5 class="widget-product-title"><a href="supplies-single.html">Biotin Complex</a></h5>
                        <span class="widget-product-price">$ 18.00</span>
                      </div><!-- /.widget-product-content -->
                    </div><!-- /.widget-product-item -->
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-poducts -->
                <div class="widget widget-filter">
                  <h5 class="widget-title">Pricing Filter</h5>
                  <div class="widget-content">
                    <div id="rangeSlider"></div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="price-output d-flex align-items-center">
                        <label for="rangeSliderResult">Price: </label>
                        <input type="text" id="rangeSliderResult" readonly>
                      </div>
                      <button class="btn-filter">Filter</button>
                    </div>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-filter -->
                <div class="widget widget-tags">
                  <h5 class="widget-title">Tags</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                      <li><a href="#">Responsive</a></li>
                      <li><a href="#">Fresh</a></li>
                      <li><a href="#">Modern</a></li>
                      <li><a href="#">Corporate</a></li>
                      <li><a href="#">Business</a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-Tags -->
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-3 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.shop -->
</div>
