<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index',[
        'galeri' => Galeri::all(),
    ]);
});
Route::get('/chat-bot', function () {
    return view('chat');
});
Route::get('/admin', function () {
    return view('login');
});
Route::post('/admin', function (Request $request) {
    $user = new User();
    if($user->checkUser($request->username, $request->password) > 0){
        $request->session()->put([
            'role' => 'admin',
        ]);
        return redirect()->intended('/crud');
    }else{
        return back()->withErrors(['error' => 'Username dan Password salah']);
    }
});
Route::get('/crud/{id}', function ($id) {
    $galeri = new Galeri();
    if(session()->get('role') == 'admin' && $galeri->exitsById($id) > 0 ){
       $data = Galeri::find($id);
       Storage::delete('images/'.$data->gambar);
       $data->delete();
       return redirect()->intended('/crud');
    }else{
        return redirect()->intended('/admin');
    }
});
Route::post('/crud/{id}', function (Request $request, $id) {
    $galeri = Galeri::find($request->id);
    if(session()->get('role') == 'admin' && $galeri->exitsById($id) > 0 ){
        $galeri->judul = $request->judul;
        try{
            $file = $request->file('gambar');
            $file->move('images',$file->getClientOriginalName());
            $galeri->gambar = $file->getClientOriginalName();
        }catch(Throwable $e){
            // tidak ada gambar
        }
        $galeri->save();
        return redirect()->intended('/crud');
    }else{
        return redirect()->intended('/admin');
    }
});
Route::get('/crud', function () {
    if(session()->get('role') != 'admin'){
        return redirect()->intended('/admin');
    }
    return view('galeri', [
        'galeri' => Galeri::all(),
    ]);
});
Route::post('/crud', function (Request $request) {
    if(session()->get('role') != 'admin'){
        return redirect()->intended('/admin');
    }
    $galeri = new Galeri;
    $file = $request->file('gambar');
    $file->move('images',$file->getClientOriginalName());
    $galeri->judul = $request->judul;
    $galeri->gambar = $file->getClientOriginalName();
    $galeri->save();
    return redirect()->intended('/crud');
});
Route::get('loqout', function () {
    session()->flush();
    return redirect()->intended('/admin');
});
