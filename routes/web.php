<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Livewire\Website\HomePage;
use App\Livewire\Website\Contact;
use App\Livewire\Website\AboutusPage;
use App\Livewire\Website\RegisterPage;
use App\Livewire\Website\LoginPage;
use App\Livewire\Website\ForgetPassForm;
use App\Livewire\Website\BookingNowPage;
use App\Livewire\Website\ConcertPage;
use App\Livewire\Website\ConcertFormPage;
use App\Livewire\Website\PaymentOptionsPage;
use App\Livewire\Website\ConcertTblInvoicePage;
use App\Livewire\Website\PaymentPolicyPage;
use App\Livewire\Website\DashboardPage;
use App\Livewire\Website\RestaurantPage;
use App\Livewire\Website\FoodListPage;
use App\Livewire\Website\RestaurantSellerFormPage;
use App\Livewire\Website\dashboard\EditProfileForm;
use App\Livewire\Website\dashboard\ConcertBookingList;
use App\Livewire\Website\dashboard\ConcertCalcelationPolicyPage;
use App\Livewire\Website\Email\ForgetPassMailComponent;

use App\Models\TblGbooking;
use App\Models\Language;
use Filament\Notifications\Events\DatabaseNotificationsSent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/testingNotification', function () {
        $recipient = auth()->user();
        \Filament\Notifications\Notification::make()
            ->title('Saved successfully By DK')
            ->sendToDatabase($recipient);
            event(new DatabaseNotificationsSent($recipient));
            dd('Notification Send successfully By DK');
})->middleware('auth');

Route::get('/', HomePage::class)->name('home');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/aboutus', AboutusPage::class)->name('aboutus');
Route::get('/register', RegisterPage::class)->name('register');
Route::get('/login', LoginPage::class)->name('login');
Route::get('/forgetPassword', ForgetPassForm::class)->name('forgetPassword');

Route::get('/bookingList', BookingNowPage::class)->name('bookingList');
// For Customer dashboard START
Route::get('/dashboard', DashboardPage::class)->name('dashboard.user');
Route::get('/dashboard/updateProfile', EditProfileForm::class)->name('dashboard.updateProfile');
Route::get('/dashboard/myConcertBooking', ConcertBookingList::class)->name('dashboard.myConcertBooking');
// For Customer dashboard END
//For GEntertainment concert START
Route::get('/GEntertainment/concert', ConcertPage::class)->name('concert');
Route::get('/GEntertainment/concertForm/{tableId?}', ConcertFormPage::class)->name('concertForm');
Route::get('/paymentOptions/{amount}/{currencySymbol}/{currency}', PaymentOptionsPage::class); ////
Route::get('/invoice/{amount}/{currencySymbol}/{currency}/{recordId}', ConcertTblInvoicePage::class); ////
Route::get('/payment/privacypolicy/{amount}/{currencySymbol}/{currency}/{recordId}', PaymentPolicyPage::class); ////
Route::get('/concertTable/{recordId}/cancellationPolicy', ConcertCalcelationPolicyPage::class); ////
//For GEntertainment concert END

// For Paypal payment Gateway START
Route::post('/paypal/checkout', [PaypalPaymentController::class, 'paypalCheckout'])->name('paypal.checkout');
Route::get('/paypalCheckout/success', [PaypalPaymentController::class, 'paypalSuccess'])->name('paypalCheckout.success');
Route::get('/paypalCheckout/cancel', [PaypalPaymentController::class, 'paypalCancel'])->name('paypalCheckout.cancel');
// For Paypal payment Gateway END
Route::post('make/payment',[StripePaymentController::class,'makePayment'])->name('make.payment');

Route::get('/language', function () {
    $languages = Language::active()->get();
    $banners = TblGbooking::where('status', '1')->get();
    // echo "<pre>"; print_r($banners); die;
    return view('welcome', compact('languages', 'banners'));
});
Route::get('lang/change', [LocalizationController::class, 'lang_change'])->name('LangChange');
//Email
// Route::get('/email-sender', ForgetPassMailComponent::class);

//For GBooking restaurant START
Route::get('/GBooking/restaurant', RestaurantPage::class)->name('restaurantPage');
Route::get('/GBooking/restaurant/foods/{restaurant_id}/{cat_id?}', FoodListPage::class)->name('FoodListPage');
Route::get('/GBooking/restaurant/newSeller', RestaurantSellerFormPage::class)->name('newRestaurantSeller');
//For GBooking restaurant END

Route::get('/location', function (Request $request) {
    $ip= request()->ip()=='127.0.0.1' ? '103.146.44.34' : request()->ip();
    $position = Location::get($ip);
    echo "<pre>";
    echo "ip=".$ip;
    print_r($position);
})->name('location');


