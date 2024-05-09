<?php

use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\ChatGroupsController;
use App\Http\Controllers\ChatMemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

// admin routes 
Route::group(['middleware' => ['auth:web'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('dashboard');

    // members crud
    Route::get('memebers/all', [MembersController::class, 'index'])->name('members.all');
    Route::get('memeber/{id}/{action}', [MembersController::class, 'toggleActive'])->name('member.active');
    
    // Groups private
    Route::get('Rooms/all', [ChatGroupsController::class, 'Room_all'])->name('room.index');
    Route::post('Rooms/add', [ChatGroupsController::class, 'Room_add'])->name('room.store');
    Route::get('Room/{id}/{action}', [ChatGroupsController::class, 'Room_Active'])->name('room.active');
    Route::post('Room/update', [ChatGroupsController::class, 'Room_update'])->name('room.update');
    Route::get('Rooms/Requests/all', [ChatGroupsController::class, 'Room_Requests_all'])->name('room.Requests');
    Route::get('Rooms/Requests/{id}/approved', [ChatGroupsController::class, 'Room_Request_approved'])->name('room.Requests.approved');
    Route::get('Rooms/Requests/{id}/rejected', [ChatGroupsController::class, 'Room_Request_rejected'])->name('room.Requests.rejected');

    // chat public manage
    Route::get('Rooms/guest/all', [ChatGroupsController::class, 'guests_all'])->name('guest.index');
    Route::get('Rooms/guest/{id}/{action}', [ChatGroupsController::class, 'toggleActiveGuest'])->name('guest.active');

    // chat bot
    Route::get('chatBot', [ChatBotController::class, 'index'])->name('bot.index');
    Route::post('chatBot/store', [ChatBotController::class, 'store'])->name('bot.store');
    Route::post('chatBot/info/store', [ChatBotController::class, 'Infostore'])->name('bot.info.store');
});

// members routes
Route::group(['middleware' => ['auth:member']], function(){
    Route::group(['middleware' => 'IsActive'], function () {
        Route::get('dashboard', [HomeController::class, 'memberHome'])->name('dashboard');
        Route::get('chat/private', [ChatGroupsController::class, 'chatPrivate'])->name('chat.private');
        Route::get('Room/{id}/join', [ChatGroupsController::class, 'Room_request_join'])->name('room.join');
        Route::get('/chat/Messages', [ChatGroupsController::class, 'chatPublic'])->name('chat.public');
        
        // chat one to one 
        Route::get('chat/Members', [ChatMemberController::class, 'chatarea'])->name('chat.member');
    
        // chat bot
        Route::get('chatBot', [ChatBotController::class, 'chatArea'])->name('bot.chat');
    
    });
    Route::get('member/blocked', [HomeController::class, 'blocked'])->name('member.blocked');
});


// guest chat
Route::get('/chat/guest', [ChatGroupsController::class, 'chatGuest'])->name('guest.chat');

// profile memeber
Route::middleware('auth:member')->group(function () {
    Route::get('/member/profile', [ProfileController::class, 'edit'])->name('m.profile.edit');
    Route::post('/member/profile', [ProfileController::class, 'update'])->name('m.profile.update');
    Route::delete('/member/profile', [ProfileController::class, 'destroy'])->name('m.profile.destroy');
});

// profile admin
Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
