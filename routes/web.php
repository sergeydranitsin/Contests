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
use App\Image;
use App\User;
use App\Vote;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Route::get('/file', function () {
    return view('file_upload');
});

Route::get('/', function () {
    return view('one_page');
});

Route::get('/here_you_dont_find_any_interesting', function () {
    return view('adding_new_contests');
})->name("adding_new_contests");

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

Route::get('moderator', function () {
    if (Auth::check() && Auth::user()->moderator) {
        return view('moderator');
    } else {
        return redirect('/');
    }
});

Route::get('cabinet', function () {
    return view('cabinet');
});

Route::get('cabinet', function () {
    return view('cabinet');
})->name("cabinet");

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
                $user = Auth::user();
                $works = Work::where('id_creator', $user->id)->get();
                $user['contests'] = array();
                foreach ($works as &$work) {
                    $work['images'] = $work->images;
                    $contests = $user['contests'];
                    array_push($contests, $work->contests);
                    $user['contests'] = $contests;
//                    $work['images'] = Image::where('id_work', $work->id)->get();
                }
                $user['contests'] = array_unique($user['contests']);
                $user['works'] = $works;
                return response($user);
            } else {
                return response(User::find($id));
            }
        } else {
            return response('Unauthenticated', 401);
        }
    })->where('id', '[0-9]+');

    Route::post("user/certificate", function (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $fio = $user->first_name . ' ' . $user->second_name;
            if ($request->has(['id_contest'])) {
                $contest = Contest::find($request['id_contest']);
                $contest_name = $contest->name;
                $year = explode('-', $contest->outcomes)[0];

                $path = 'watermark.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $html = '
<style>
h1 {
    color: rgb(0, 0, 120); 
    font-size: 48px;
}

h2 {font-size: 32px;}
h3 {font-size: 24px;}
h4 {font-size: 16px;}


</style>
<body style="background: transparent url(' . $base64 . '); background-image-resize: 6;">
<div style="padding: 7%; text-align: center;">
<h1 >Диплом участника</h1>
<hr>
<h2>' . $fio . '</h2>
<h4>принял участие в конкурсе</h4>
<h3>' . $contest_name . '</h3>
<h5>' . $year . '</h5>
</div>
</body>';

                $mpdf = new \Mpdf\Mpdf();
                $mpdf->allow_charset_conversion = true;
                $mpdf->charset_in = 'UTF-8';
                $mpdf->AddPage();
                $mpdf->WriteHTML($html);
                $path = 'seal.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $mpdf->Image($base64, 150, 220);
//$mpdf->showWatermarkImage = true;
                return $mpdf->Output("test.pdf", "D");
            }
        } else {
            return response('Unauthenticated', 401);
        }
    });

    //region contests

    Route::get("/contests", function (Request $request) {
        $contests = Contest::paginate($request->query('per_page', '10'));
        foreach ($contests as &$contest) {
            $contest['image'] = null;
            $works = Work::where('id_contest', $contest->id)->inRandomOrder()->get();
            foreach ($works as $work) {
                $image = Image::where('id_work', $work->id)->inRandomOrder()->first();
                if ($image) {
                    $contest['image'] = $image;
                    break;
                }
            }
        }
        return $contests;
    });

    function get_contest_status($contest)
    {
        $q = $contest['qualification'];
        $q = strtotime(explode(" ", $q)[0]);
        $v = $contest['vote'];
        $v = strtotime(explode(" ", $v)[0]);
        $o = $contest['outcomes'];
        $o = strtotime(explode(" ", $o)[0]);

        $t = time();
        if ($t < $q)
            return "not started";
        elseif ($q < $t && $t < $v)
            return "qualification";
        elseif ($v < $t && $t < $o)
            return "vote";
        else
            return "end";
    }

    Route::get("/contest/{id?}", function (Request $request, $id = null) {
        if (!$id)
            return response('Forbidden', 403);

        $user = Auth::user();
        $works =
            Work::where('id_contest', $id)
                ->where('is_verified', '=', '1')
                ->paginate($request->query('per_page', '10'));
        foreach ($works as &$work) {
//            $work['images'] = Image::where('id_work', $work->id)->get();
            $work['images'] = $work->images;
            $work['rating'] = round(Vote::where('id_work', $work->id)->avg('vote'), 1);
            $work['user_vote'] = null;
            if ($user) {
                $v = Vote::where('id_user', $user->id)->where('id_work', $work->id)->first(['vote']);
                if ($v) {
                    $work['user_vote'] = $v['vote'];
                }
            }
        }
        $contest = Contest::find($id);
        $status = get_contest_status($contest);
        $add = collect(["status" => $status]);

        $works = $add->merge($works)->all();

        return $works;
    });

    Route::post("/contest", function (Request $request) {
        if (Auth::check() && Auth::user()->moderator) {
            if ($request->has(['name', 'category', 'description', 'qualification', 'vote', 'outcomes'])) {
                $contest = new Contest;
                $contest->name = $request->input('name');
                $contest->description = $request->input('description');
                $contest->category = $request->input('category');

                $qualification = $request->input('qualification');
                $vote = $request->input('vote');
                $outcomes = $request->input('outcomes');

                if (strtotime($qualification) < strtotime($vote) && strtotime($vote) < strtotime($outcomes)) {
                    $contest->qualification = $qualification;
                    $contest->vote = $vote;
                    $contest->outcomes = $outcomes;
                    $contest->save();
                    return response(array(
                        'ok' => true,
                        'id' => $contest->id
                    ));
                } else {
                    return response(array(
                        'ok' => false,
                        'error' => 'dates must be greater than each other (at least on a day)'
                    ));
                }
            } else {
                return response(array(
                    'ok' => false,
                    'error' => 'missing fields'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    });

    //endregion

    //region works
    Route::get("/work/{id}", function (Request $request, $id) {
        $work = Work::find($id);
        if ($work) {
            $work['images'] = $work->images;
            $work['rating'] = round(Vote::where('id_work', $id)->avg('vote'), 1);
            $contest = Contest::find($id);
            $work['contest'] = get_contest_status($contest);
            $user = Auth::user();
            $work['user_vote'] = null;
            if ($user) {
                $v = Vote::where('id_user', $user->id)->where('id_work', $id)->first(['vote']);
                if ($v) {
                    $work['user_vote'] = $v['vote'];
                }
            }
//            $work['images'] = Image::where('id_work', $id)->get();
            return response($work);
        } else {
            return (array(
                'error' => 'work not found'
            ));
        }
    })->where('id', '[0-9]+');

    Route::get("/works/random/{count?}", function (Request $request, $count = 6) {
        $works = Work::inRandomOrder()->take($count)->get();
        foreach ($works as &$work) {
            $work['images'] = $work->images;
        }
        return $works;
    })->where('id', '[0-9]+');

    Route::post("/work", function (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            if ($request->has(['name', 'description', 'id_contest'])) {
                $id_contest = $request->input('id_contest');
                $contest = Contest::find($id_contest);
                $status = get_contest_status($contest);
                if ($status == 'qualification') {
                    $work = new Work;
                    $work->name = $request->input('name');
                    $work->description = $request->input('description');
                    $work->id_contest = $id_contest;
                    $work->id_creator = $user->id;
                    $work->save();
                    $id_work = $work->id;

                    $images = Image::where('id_creator', $user->id)->whereNull('id_work')->get();
                    foreach ($images as $img) {
                        $img->id_work = $id_work;
                        $img->save();
                    }

                    return response(array(
                        'ok' => true,
                        'id_work' => $id_work
                    ));
                } else {
                    return response(array(
                        'ok' => false,
                        'error' => 'not in qualification'
                    ));
                }
            } else {
                return response(array(
                    'ok' => false,
                    'error' => 'missing fields'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    });


    /* TODO решить как будет происходить редактирование работ (если вообще будет)
    Route::patch("/work/{id}", function (Request $request, $id) {
        if (Auth::check()) {
            $user = Auth::user();
            if ($request->has(['name', 'description'])) {
                $work =Work::where('user_id', Auth::user()->id)->find($id);
    $work->name = $request->input('name');
                $work->description = $request->input('description');
//                $work->id_contest = $request->input('id_contest');
//                $work->id_creator = $user->id;
                $work->save();
                $id_work = $work->id;

                $images = Image::where('id_creator', $user->id)->whereNull('id_work')->get();
                foreach ($images as $img) {
                    $img->id_work = $id_work;
                    $img->save();}

                return response(array(
                    'ok' => true,
                    'id_work' => $id_work
                ));
            } else {
                return response(array(
                    'ok' => false,
                    'error' => 'missing fields'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    })->where('id', '[0-9]+');
                return response(array(
                    'ok' => true,
                    'id_work' => $id_work
                ));
            } else {
                return response(array(
                    'ok' => false,
                    'error' => 'missing fields'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    })->where('id', '[0-9]+');
    */


    //region images
    function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    Route::get("/images", function (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();

            $imgs = Image::where('id_creator', $user->id)->whereNull('id_work')->get();
            return response(array(
                'ok' => true,
                'images' => $imgs
            ));
        } else {
            return response('Forbidden', 403);
        }
    });

    Route::post("/image", function (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();

            $user_id = $user->id;
            $count = Image::where('id_creator', $user_id)->whereNull('id_work')->count();
            if ($count >= 9) {
                return response(array(
                    'ok' => false,
                    'error' => 'You have uploaded too many files (limit is 9).'
                ));
            }

            $file = $request->file;
            $path = $file->path();
            $content = file_get_contents($path);
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

                return response(array(
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

    Route::delete("/image/{id?}", function (Request $request, $id = null) {
        if (Auth::check() && $id) {
            $user = Auth::user();
            $img = Image::where('id_creator', $user->id)->whereNull('id_work')->find($id);

            if ($img) {
                $path = str_replace('/storage', 'public', $img->path);
                Storage::delete($path);
                $img->delete();
                return response(array('ok' => true));
            } else {
                return response(array(
                    'ok' => false,
                    'error' => 'wrong id'
                ));
            }
        } else {
            return response('Forbidden', 403);
        }
    });

    //endregion

    //region moderator

    Route::get("/moderator/works/{param}", function (Request $request, $param) { // $param in ['null', '0', '1']
        if (Auth::check()) {
            if (Auth::user()->moderator) {
                if ($param == 'null') {
                    $works = Work::whereNull('is_verified')
                        ->orderBy('created_at', 'desc')
                        ->paginate($request->query('per_page', '10'));
                } else {
                    $works = Work::where('is_verified', $param)
                        ->orderBy('created_at', 'desc')
                        ->paginate($request->query('per_page', '10'));
                }
                foreach ($works as &$work) {
                    $work['images'] = $work->images;
                }
                return $works;
            } else {
                return response('Forbidden', 403);
            }
        } else {
            return response('Unauthenticated', 401);
        }
    })->where('param', '(null|0|1)');

    Route::patch("/moderator/work/{id}/verify/{param}", function (Request $request, $id, $param) { //$param in [0, 1]
        if (Auth::check()) {
            if (Auth::user()->moderator) {
                $work = Work::find($id);
                if ($work) {
                    $work->is_verified = $param;
                    $work->save();
                    return response(array('ok' => 'true'));
                } else
                    return response(array('ok' => false, 'error' => 'work not found'));

            } else {
                return response('Forbidden', 403);
            }
        } else {
            return response('Unauthenticated', 401);
        }
    })->where('param', '[01]');

    //endregion

    //region votes
    Route::post("/work/{id}/vote/{vote}", function (Request $request, $id, $vote) {
        if (Auth::check()) {
            $user = Auth::user();
            $contest = Contest::find(Work::find($id)->id_contest);
            $status = get_contest_status($contest);
            if ($status == 'vote') {
                $v = Vote::where('id_user', $user->id)->where('id_work', $id)->first();
                if ($v) {
                    $v->vote = $vote;
                    $v->save();
                    return response(array('ok' => 'vote changed'));
                } else {
                    $v = new Vote();
                    $v->id_user = $user->id;
                    $v->id_work = $id;
                    $v->vote = $vote;
                    $v->save();
                    return response(array('ok' => 'true'));
                }
            } else {
                return response(array('ok' => 'false', 'error' => 'can\'t vote'));
            }
        } else {
            return response('Unauthenticated', 401);
        }
    })->where('vote', '[1-5]');

    Route::get("/work/{id}/rating", function (Request $request, $id) {
        if (Auth::check()) {
            $count = Vote::where('id_work', $id)->count('vote');
            $rating = round(Vote::where('id_work', $id)->avg('vote'), 1);

            return array('rating' => $rating, 'count' => $count);
        } else {
            return response('Unauthenticated', 401);
        }
    })->where('id', '[0-9]+');

//endregion
});

// endregion
