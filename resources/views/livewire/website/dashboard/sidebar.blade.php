<ul class="list-unstyled mb-0" wire:ignore>
    <li>
      <a href="/dashboard" wire:navigate class="{{ Route::is('dashboard.user') ? 'active' : '' }} {{ Route::is('dashboard.updateProfile') ? 'active' : '' }}"><span class="cat-title">{{ __('message.View profile') }}</span><span class="cat-count"><i class='fas fa-address-book'></i></span></a>
    </li>
    <li>
      <a href="/dashboard/myConcertBooking" wire:navigate class="{{ Route::is('dashboard.myConcertBooking') ? 'active' : '' }}"><span class="cat-title">{{ __('message.My concert booking') }}</span><span class="cat-count"><i class="fa fa-list" aria-hidden="true"></i></span></a>
    </li>
    <li>
      <a href="/dashboard/shippingAddress" wire:navigate class="{{ Route::is('dashboard.myshippingAddress') ? 'active' : '' }}"><span class="cat-title">{{ __('message.Shipping Address') }}</span><span class="cat-count"><i class="fa fa-map-marker-alt"></i></span></a>
    </li>
    <li>
      <a href="" class=""><span class="cat-title">{{ __('message.My order') }}</span><span class="cat-count"><i class="fa fa-list" aria-hidden="true"></i></span></a>
    </li>
    {{-- <li>
      <a href="#" class="tablinks" onclick="openCity(event, 'accordion')"><span class="cat-title">accordion</span><span class="cat-count">12</span></a>
    </li> --}}
    {{-- <li>
      <a href="#"><span class="cat-title">Hype</span><span class="cat-count">7</span></a>
    </li> --}}
    {{-- <li>
      <a href="#" wire:click="customerlogout"><span class="cat-title">{{ __('message.Logout') }}</span><span class="cat-count"><i class="fa fa-sign-out" aria-hidden="true"></i></span></a>
    </li> --}}
  </ul>
  {{-- <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script> --}}