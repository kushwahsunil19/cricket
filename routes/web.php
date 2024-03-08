<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\Admin\{RankController,HomePlayerController,SubscriptionController};
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignUpController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

// Route::get('/', function () {
//     return view('home');
// });

Route::view('home', 'home');
Route::view('contact-us', 'contact');
Route::view('faqs', 'faqs');
Route::view('Dashboard', 'feedback');
Route::view('about-us', 'about-us');

Route::get('/signUp', function(){
    return view('/signUp');
});
Route::post('/signup', [SignUpController::class, 'store'])->name('signup.store');

// Route::view('about-new', 'about-new');


Route::view('blogs', 'blogs');
Route::view('blog-detail', 'blog_details');
Route::get('/h/{type}/{cat}', [RankController::class, 'getPList']);
Route::get('/', [HomeController::class, 'getHomePageData']);
Route::post('/store', [SubscriptionController::class, 'store'])->name('store');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::view('create-blog', 'admin.blogs.create_blog');
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Route::view('players', 'admin.player')->name('players');
    // Route::view('blog-list', 'admin.blogs.blog-list');
    Route::get('blog-categories-list', [CategoryController::class, 'index']);
    Route::get('blog-list', [BlogController::class, 'fetchAllBlogAdmin']);
    // Route::get('players', [RankController::class, 'getPlayers']);
    //Route::resource('player', 'RankController');
    Route::get('/players', [RankController::class, 'index'])->name('players');
    Route::post('/players', [RankController::class, 'getPlayersData'])->name('players');
    Route::get('teams', [RankController::class, 'getTeamData'])->name('teams');
    Route::post('teams', [RankController::class, 'getTeamDataNew'])->name('teams');
    Route::post('upload-team-csv', [RankController::class, 'uploadTeamsCSV'])->name('upload.teams_csv');

    Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add-category');;
    Route::post('add-blog', [BlogController::class, 'addBlog'])->name('add-blog');
    Route::get('delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('delete-blog');
    Route::post('upload', [BlogController::class, 'upload'])->name('upload');
    Route::post('upload-csv', [RankController::class, 'uploadPlayerCSV'])->name('upload.players_csv');
    Route::get('delete-player/{id}', [RankController::class, 'deletePlayer'])->name('delete-player');
    Route::get('delete-team/{id}', [RankController::class, 'deleteTeam'])->name('delete-team');
 
    //routes blog
    Route::get('blog-categories-list', [CategoryController::class, 'index']);
    Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::get('delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('delete-blog');
    Route::post('upload', [BlogController::class, 'upload'])->name('upload');

    // blog update routes
    Route::get('/blog-list', [BlogController::class, 'AllBlogAdmin'])->name('blog-list');
    Route::get('admin/edit-blog/{id}', [BlogController::class, 'editBlog'])->name('edit-blog');
    Route::post('update-blog/{id}', [BlogController::class, 'update'])->name('update-blog');

    //feedback admin routes
    Route::resource('feedback', FeedbackController::class)->except(['index', 'create', 'store']);
    Route::get('feedback-list', [FeedbackController::class, 'feedbackList'])->name('admin.feedback-list');
    Route::get('/feedback/{id}', [FeedbackController::class, 'feedback-list'])->name('feedback-list');
    // Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('feedback-list/update/{id}', [FeedbackController::class, 'update'])->name('admin.feedback.update');
    Route::post('feedback-list/delete-feedback/{id}', [FeedbackController::class, 'destroy'])->name('admin.feedback.delete');

    //contact-details
    Route::get('contactlist', [ContactController::class, 'contactlist']);
    Route::get('contact/contactlist', [ContactController::class, 'contactlist'])->name('admin.contactlist');
    Route::delete('contactlist/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');

    // FAQS routes
    Route::get('/faqs-list', [FaqController::class, 'index'])->name('admin.faqs-list');
    Route::get('/add-faqs', [FaqController::class, 'create'])->name('admin.add-faqs');
    Route::post('/add-faqs', [FaqController::class, 'store'])->name('admin.add-faqs');
    Route::get('/faqs/edit-faqs/{faq}', [FaqController::class, 'edit'])->name('admin.edit-faqs');
    Route::put('/faqs/update/{faq}', [FaqController::class, 'update'])->name('faqs-update');
    Route::delete('/faqs/destroy/{faq}', [FaqController::class, 'destroy'])->name('admin.faqs-destroy');

    //About-us routes
    Route::get('/aboutus-list', [AboutUsController::class, 'index'])->name('admin.aboutus-list');
    Route::post('/aboutus/update', [AboutUsController::class, 'update'])->name('aboutus.update');
    Route::get('/aboutus/about-list', [AboutUsController::class, 'index'])->name('admin.aboutus.about-list');
    Route::post('/aboutus-list/update', [AboutUsController::class, 'update'])->name('admin.aboutus-update');

    // home Playes route
    // Route::get('home-players', [HomePlayerController::class, 'getPlayers']);
    Route::post('home-player-csv', [RankController::class, 'uploadPlayerCSV'])->name('upload.home-player-csv');
    Route::get('delete-home-player/{id}', [RankController::class, 'deletePlayer'])->name('delete-home-player');
    Route::get('/profile', [RankController::class, 'profile'])->name('profile');
    Route::post('/profile', [RankController::class, 'profilePost'])->name('profile');

    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::post('/logs', [LogController::class, 'getLogs'])->name('logs');
    Route::get('/delete-log/{id}', [LogController::class, 'destroy'])->name('delete-log');
    Route::get('/details/{id}', [LogController::class, 'getLogcsvData'])->name('details');
    Route::post('/team-logs', [LogController::class, 'getTeamLogData'])->name('team-logs');
    Route::post('/player-logs', [LogController::class, 'getPlayersLogData'])->name('player-logs');

    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::post('/subscription', [SubscriptionController::class, 'getLogs'])->name('subscription');
    Route::get('/delete-subscription/{id}', [SubscriptionController::class, 'destroy'])->name('delete-subscription');
    
    
});

Auth::routes(['register' => false]);

// Public blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

// Feedback routes
Route::get('/frontend-feedback', [FeedbackController::class, 'frontendFeedbackList'])->name('frontend-feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

//contact-us  routes
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

// FAQS routes
Route::get('/faqs', [FaqController::class, 'faq'])->name('faqs');

//abouts us 
Route::get('/about-us', [AboutUsController::class, 'show'])->name('show');

//coming-soon all the performance
Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming-soon');
Route::get('/test', [ComingSoonController::class, 'test']);