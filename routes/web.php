<?php

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

use App\Contest;
use App\User;
use App\Work;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('one_page');
});

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('one_page', function () {
//    return view('one_page');
//})->name("one_page");

Route::get('gallery_of_competitions', function () {
    return view('gallery_of_competitions');
})->name("gallery_of_competitions");

Route::get('gallery_work', function () {
    return view('gallery_work');
})->name("gallery_work");


// region AUTH

//Route::get('/login', function () {
//    return view('login');
//})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    abort(404);
})->name('register');

Route::get('login/vk', 'Auth\LoginVKController@redirectToProvider');
Route::get('login/vk/callback', 'Auth\LoginVKController@handleProviderCallback');

Route::get('login/ok', 'Auth\LoginOKController@redirectToProvider');
Route::get('login/ok/callback', 'Auth\LoginOKController@handleProviderCallback');

Route::get('/user', function () {
    return Auth::user();
});

// endregion

// API
Route::group(['prefix' => 'api'], function () {
    Route::get("/user/{id?}", function (Request $request, $id = null) {
        if (Auth::check()) {
            if (!$id) {
                return json_encode(Auth::user());
            } else {
                return json_encode(User::find($id));
            }
        } else {
            return response('Unauthenticated', 401);
        }
    });

    //region contests

    Route::get("/contests", function (Request $request) {
        return Contest::paginate($request->query('per_page', '10'));
    });

    Route::get("/contest_works/{id?}", function (Request $request, $id = null) {
        if (!$id)
            return response('Forbidden', 403);
        return Work::where('id_contest', $id)->paginate($request->query('per_page', '10'));
    });


    Route::post("/contest", function (Request $request) {
        if (Auth::check() && Auth::user()->moderator) {
            if ($request->has(['name', 'category', 'description'])) {
                $contest = new Contest;
                $contest->name = $request->input('name');
                $contest->description = $request->input('description');
                $contest->category = $request->input('category');
                $contest->save();
                return json_encode(array(
                    'ok' => true,
                    'id' => $contest->id
                ));
            } else {
                return json_encode(array(
                    'ok' => false,
                    'error' => 'missing fields'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    });

    Route::post("/work", function (Request $request) {
        return response('Not implemented', '500');
        if (Auth::check()) {
            $user = Auth::user();
            if ($request->has(['name', 'description', 'images'])) {
                $work = new Work;
                $work->name = $request->input('name');
                $work->description = $request->input('description');
                $work->save();
                $id_work = $work->id;

                $images = $request->images;
                foreach ($images as $image_id) {
                    $img = Image::find($image_id);
                    $img->id_work = $id_work;
                    $img->save();
                }

                return json_encode(array(
                    'ok' => true,
                    'id_work' => $id_work
                ));
            } else {
                return json_encode(array(
                    'ok' => false,
                    'error' => 'missing fields'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    });

    //endregion

    Route::get("/work/{id}", function (Request $request, $id) {
        return json_encode(Work::find($id));
    });

    function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    Route::post("/image", function (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();

            $user_id = $user->id;
            $count = Image::where('id_creator', $user_id)->count();
            if ($count >= 10) {
                return json_encode(array(
                    'ok' => false,
                    'error' => 'You have uploaded too many files (limit is 10).'
                ));
            }

            $content = $request->getContent();
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $type = $finfo->buffer($content);

            if (in_array($type, array('image/jpeg', 'image/png', 'image/bmp'))) {
                $name = "public/images/" . random_string(32) . ".jpg";

                Storage::put($name, $content, 'public');
                $url = Storage::url($name);
//                Storage::put("public/images/$id.jpg", $content, 'public');
//                $url = Storage::url("public/images/$id.jpg");

                $img = new Image;
                $img->id_creator = $user_id;
                $img->path = $url;
                $img->save();
//                $id = $img->id;

                return json_encode(array(
                    'ok' => true,
                    'image' => $img
                ));
            } else {
                return response("Wrong file type! ($type)", 400);
            }
        } else {
            return response('Forbidden', 403);
        }
    });
});

// endregion
