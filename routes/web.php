<?php


use App\Models\Commande;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CityImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhoneVerificationController;

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contactez-nous', [HomeController::class, 'contact'])->name('contact');
Route::get('/aide-faq', [ContactController::class, 'faq'])->name('faq');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contacts.submit');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscriber'])->name('newsletters.subscriber');

Route::get('/city-image/{city}', [CityImageController::class, 'fetchCityImage']);

Route::get('/trajets', [DashboardController::class, 'trajets'])->middleware(['auth', 'verified', 'check.user.details'])->name('annonces.liste');


// Route::get('/emailverified', function () {
//     return view('auth.emailverified');
// })->middleware(['auth', 'verified'])->name('emailverified');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::get('/profile-settings', [ProfileController::class, 'profile'])->middleware('verified')->name('profile.edit') ;
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('upload-image-profile', [ProfileController::class, 'uploadImage'])->name('upload.image');
});

Route::get('users/details/{user}', [UserDetailsController::class, 'userDetails'])->name('users.details')->middleware('auth') ;

Route::prefix('/offres')->name('offers.')->controller(OfferController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{annonce}', 'show')->name('show')->where(
        [
            'slug' => '[a-z0-9\-]+',
            'annonce' => '[0-9]+'
        ]
    );
});


Route::prefix('/demandes')->name('requests.')->controller(RequestController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{annonce}', 'show')->name('show')->where(
        [
            'slug' => '[a-z0-9\-]+',
            'annonce' => '[0-9]+'
        ]
    );
});


Route::prefix('annonces')->middleware(['auth', 'verified', 'check.user.details'])->name('annonces.')->controller(AnnonceController::class)->group(function () {
    Route::get('/{annonce}/edit', 'edit')->name('edit');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::put('/{annonce}/edit', 'update')->name('update');
    Route::delete('/{annonce}/delete', 'destroy')->name('destroy');
    Route::post('/{annonce}/archive', 'archive')->name('archive');
});


Route::prefix('messages')->controller(ConversationController::class)->name('conversations.')->middleware('auth')->group(function () {
    Route::get('/{conversation?}', 'index')->name('index')->where('conversation', '[0-9]+') ;
    // Route::get('/', 'index')->name('index'); // Liste des conversations
    // Route::get('/{conversation}', 'index')->where('conversation', '[0-9]+')->name('show'); // Afficher une conversation
    Route::get('/conversations/{conversation}', 'fetchMessages')->name('fetchMessages');
});

Route::prefix('/messenger')->controller(MessengerController::class)->name('messenger.')->middleware(['auth', 'verified', 'check.user.details'])->group(function() {
    Route::get('/', 'base')->name('base') ;
    Route::get('/conversations/{id}/messages', 'index' )->name('index') ;
    Route::get('/conversations/{conversation}/show', 'show')->name('show') ;
    Route::post('/', 'store')->name('store') ;
}) ;


Route::get('message/{conversation?}', [ConversationController::class, 'iframe'])->name('conversations.iframe');

Route::post('conversations/{conversation}/save', [ConversationController::class, 'storeMessage'])->name('conversations.storeMessage');
Route::get('/conversations/{conversationId}/new-messages', [ConversationController::class, 'getNewMessages']);


Route::resource('commandes', CommandeController::class)->except(['show', 'create'])->middleware(['auth']);
Route::get('commandes/requests', [CommandeController::class, 'request'] )->name('commandes.requests')->middleware('auth') ;
Route::resource('conversations', ConversationController::class)->except(['show', 'index'])->middleware(['auth']);
Route::resource('rates', RateController::class )  ;

Route::get('/get-popup-commande', function (Request $request) {

    $commande = Commande::where('status', 'recue')->where('recever_id', auth()->user()->id)->orderBy('updated_at', 'desc')->first() ;

    return response()->json([
        'id' => $commande->id,
    ]);
});

// Route::get('/notifications', [NotificationController::class, 'notifis']);
// Route::post('/notifications/mark-as-read', [NotificationController::class,'markAsReadd'])->middleware('auth') ;
Route::get('/notifications', function () {

    $user = auth()->user();

     return response()->json([
        'notifications' => $user->notifications()->take(20)->get(), // 20 dernières
        'unread_count' => $user->unreadNotifications->count()
    ]);
    // return auth()->user()->unreadNotifications()->take(5)->get();
})->middleware('auth');

Route::post('/notifications/read/{id}', function ($id) {
    $notif = auth()->user()->notifications()->findOrFail($id);
    $notif->markAsRead();
    return response()->json(['status' => 'ok']);
})->middleware('auth');

Route::post('/notifications/read-all', function(){

    auth()->user()->unreadNotifications->markAsRead();
    return response()->noContent();
}) ;

Broadcast::routes(['middleware' => ['auth']]);

Route::get('phone-verify', [PhoneVerificationController::class, 'phoneVerify'])->name('phone.verify') ;
Route::post('/send-code', [PhoneVerificationController::class, 'send'])->name('phone.send');
Route::post('/verify-code', [PhoneVerificationController::class, 'verify'])->name('verify.code.phone');



require __DIR__ . '/auth.php';
