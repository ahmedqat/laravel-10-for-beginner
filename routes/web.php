<?php

use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    //get user data
    // $users = DB::select("select * from users");

    // $users = DB::table('users')->get();

//    $user = User::find(17);

    


    // //Create New User

    // $user = DB::insert('insert into users (name, email, password) values(?,?,?) ',[

    //     "osama","osamah@intern.com",350916
    // ]);

    // $user = DB::table('users')->insert([
    //     'name' => 'Osama2',
    //     'email' => 'osama2@intern.com',
    //     'password'=> 350916
    // ]);


    //  $user = User::create([
    //      'name' => 'Osama',
    //      'email' => 'pvptrash@gmail.com',
    //      'password' => 'gamingwithleo12'

    //  ]);

    //  $user = User::create([
    //     'name' => 'Osama',
    //     'email' => 'pvptrash2@gmail.com',
    //     'password' => 'gamingwithleo12'

    // ]);

    // $user = User::create([
    //     'name' => 'Osama',
    //     'email' => 'pvptrash3@gmail.com',
    //     'password' => 'gamingwithleo12'

    // ]);

    // $user = User::create([

    //     'name' => 'Nawas',
    //     'email'=> 'nawas@gmail.com',
    //     'password'=> '350916'
    // ]);

    //Update User

    // $user = DB::update("update users set email = ? where name = ? ", ['noobyaji@gmail.com','Ahmed']);

    // $user = DB::table('users')->where('id',7)->update(['email'=>'123@gmail.com']);

    // $user = User::where('name','Osama')->update(['email'=>'crossmotion@gmail.com']);

    //delete user

    // $user = DB::delete("delete from users where id = ? ",[2]);
    //  $user = DB::table('users')->where('name','Osama2')->delete();

    // $user = User::find(1);
    // $user->delete();

    


    // dd($user->name);

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar',[AvatarController::class,'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
