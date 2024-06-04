<section class="pb-40">
     <div class="container">
       <div class="row">
         
         <div class="col-sm-12 col-md-12 col-lg-8 offset-md-2">
           <div class="contact-panel">
             <form wire:submit.prevent="privacyPolicyFun" class="contact-panel-form">
             @csrf
               <div class="row">
                 <div class="col-sm-12">
                   <h4 class="contact-panel-title">{{ __('message.PRIVACY POLICY') }}</h4>
                 </div>
                 
                 <div class="col-12">
                   <div class="border-top mb-30"></div>
                   <p class="mb-30">{{ __('message.PrivacyPolicyDescription') }}.</p>
                 </div><!-- /.col-lg-12 -->
                
                 <div class="col-12">
                     <div class="form-group">
                         <label for="address">{{ __('message.Collection of Your Information') }}</label>
                         <p class="mb-30">{{ __('message.InfoDescription') }}.</p>
                     </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Security Precautions') }}</label>
                        <p class="mb-30">{{ __('message.SecurityDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Advertisements on Platform') }}</label>
                        <p class="mb-30">{{ __('message.AdvertisementDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Data Retention') }}</label>
                        <p class="mb-30">{{ __('message.RetentionDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Your Rights') }}</label>
                        <p class="mb-30">{{ __('message.YourRightDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Your Consent') }}</label>
                        <p class="mb-30">{{ __('message.YourConsentDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Changes to this Privacy Policy') }}</label>
                        <p class="mb-30">{{ __('message.ChangesDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="address">{{ __('message.Customer Support') }}</label>
                        <p class="mb-30">{{ __('message.CustomerSupportDesc') }}.</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group">
                        <p class="mb-30">{{ __('message.Last Updated') }} : Aprail 2024</p>
                    </div>
                 </div>
                 <div class="col-12">
                    <div class="form-group mb-20">
                      {{-- <label class="mb-20">Special Hours and Access</label> --}}
                      <div class="d-flex flex-wrap checkbox-controls">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox"  wire:model="checked" class="custom-control-input" id="customCheck7" wire:change="processMark()">
                          <label class="custom-control-label" for="customCheck7">{{ __('message.I have read and accept the privacy & policy') }}</label>
                        </div>
                      </div>
                    </div>
                  
                    
                    
                  </div><!-- /.col-lg-12 -->
                 
                
                 <div class="col-12">
                   <button type="submit" wire:click="loading = true" wire:loading.attr="disabled" {{$botton == 'inactive' ? 'disabled' : ''}} class="btn btn-secondary">
                     <span>{{ __('message.Submit') }} </span> <i class="icon-arrow-right"></i>
                   </button>
                   {{-- <a href="/GEntertainment/concert" wire:navigate class="btn btn-primary btn-link btn-block">{{ __('message.Back') }}</a> --}}
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
   </section>
 