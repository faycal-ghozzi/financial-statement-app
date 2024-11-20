<?php

use App\Http\Controllers\FinancialStatementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use LdapRecord\Models\ActiveDirectory\User as LdapUser;

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/welcome', function(){return view('home');})->name('welcome');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/financial-statement', [FinancialStatementController::class, 'index'])->middleware('auth')->name('financial-statement.create');


// function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'role:super_admin'])->group(function () {
//     Route::get('/manage-access', [SuperAdminController::class, 'index'])->name('manage.access');
//     Route::post('/approve-user', [SuperAdminController::class, 'approve'])->name('user.approve');
//     Route::post('/deny-user', [SuperAdminController::class, 'deny'])->name('user.deny');
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/fs-entry-point', [AdminController::class, 'index'])->name('fs.entry.index');
//     Route::post('/fs-entry-point', [AdminController::class, 'store'])->name('fs.entry.store');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/financial-statement', [FinancialStatementController::class, 'index'])->name('financial-statement.create');
//     Route::post('/financial-statement', [FinancialStatementController::class, 'store'])->name('financial-statement.store');

//     Route::get('/financial-statements', [FinancialStatementController::class, 'fetchAll'])->name('financial-statement.fetch_all');
//     Route::post('/financial-statements/{id}', [FinancialStatementController::class, 'show'])->name('financial-statement.show');
// });

// Route::get('/ldap-attr', function() {
//     try {
//         $ldapUsers = LdapUser::get();

//         if($ldapUsers->isEmpty()){
//             return response()->json(['message' => 'no users found']);
//         }
//         // $attributes = $ldapUser->getAttributes();
//         $utf8Attributes = [];

//         foreach($ldapUsers as $user){
            
//             // var_dump($user['displayname']);
//             if($user['samaccountname'] !== null){
//                             echo('displayname : '.$user['distinguishedname'][0].'////////');

//             }
//             // echo('displayname : '.$user['displayname'][0].'.\n');
//             // var_dump('samaccountname : '.$user['samaccountname'].'.\n');
//             // var_dump('distinguishedname : '.$user['distinguishedname'].'.\n');
//             // echo('name : '.$user['displayname'].'.\n');

//             // var_dump($user);
//         }

//         // foreach($ldapUsers as $key => $value){
//         //     $utf8Attributes[$key] = is_array($value)
//         //         ? array_map(fn($item) => mb_convert_encoding($item, 'UTF-8', 'UTF-8'), $value)
//         //         : mb_convert_encoding($value, 'UTF-8', 'UTF-8');
//         // }
//         // foreach($attributes as $key => $value){
//         //     $utf8Attributes[$key] = is_array($value)
//         //         ? array_map(fn($item) => mb_convert_encoding($item, 'UTF-8', 'UTF-8'), $value)
//         //         : mb_convert_encoding($value, 'UTF-8', 'UTF-8');
//         // }

//         // return response()->json([
//         //     'message' => 'first user attributes',
//         //     'attributes' => $utf8Attributes,
//         // ], 200, [], JSON_UNESCAPED_UNICODE);       
//     }catch(\LdapRecord\LdapRecordException $e){
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// });

require __DIR__.'/auth.php';
