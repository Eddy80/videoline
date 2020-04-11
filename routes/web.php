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
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/lessons', function () {
    return view('lessons');
});

Route::get('/lesson/{lessonid}', 'VlcatController@lessonload');

Route::get('/experts', function () {
    return view('experts');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/comments', function () {
    return view('comments');
});

Route::get('/payment', function () {
    return view('packets');
});

//Route::post('/reg','Auth\RegisterController@create');
//Route::post('/regsimple','Auth\RegisterController@createsimple');
Route::get('/login', function () {
    return view('login');
});
Route::post('/logmain','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout');
/*
Route::get('/home', function () {
    return view('home');
});
*/
/*

Route::get('/infotracking',  'GeneralController@getPageInfoTracking');

Route::get('/infosending',  'GeneralController@getPageInfoSending');

Route::get('/infoagreement', 'GeneralController@getPageAgreement');

Route::get('/forbidden',  'GeneralController@getPageInfoForbidden');
/*
Route::get('/about', function () {
    return view('about');
});
*/
/*
Route::get('/about', 'GeneralController@getPageAbout');

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contactform', 'GeneralController@addressstore');

Route::get('/tasco',  'GeneralController@getPageTasco');


Route::get('/calculate', 'PriceController@calculate');

Route::get('/getreceivecountryiesbysendercountryid', 'PriceController@getRcByScId');


Route::get('/usercode', 'TrackingsController@getusercode');

//Route::get('/usercode', 'TrackingsController@saveusercode');

Route::get('/countryinfo', 'TrackingsController@getCountryInfo');
Route::get('/countryinfolist', 'TrackingsController@getCountryInfoByCountryId');



Route::post('/reg','Auth\RegisterController@create');
Route::post('/regsimple','Auth\RegisterController@createsimple');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout');

*/

Route::group([
    'middleware'=>'member'
], function(){

    Route::get('/cab', 'UserController@cab');

    Route::post('/cabcard', 'UserController@cabcard');

    Route::get('/mypayaccount', 'UserController@mypayaccount');

    Route::get('/changepassword',  function () {
        return view('changepassword');
    });

/*
    Route::post('/usercodesave', 'TrackingsController@setusercode');

    Route::get('/cab', function () {
        return view('cab');
    });

    Route::get('/cabedit', function () {
        return view('cabedit');
    });

    Route::post('/cabedit','UsersController@storemydata');

    Route::get('/cabpassword', function () {
        return view('cabpass');
    });

    Route::post('/cabpassword','UsersController@changemypassword');


    Route::get('/cabcodelist', function () {
        return view('cabcodelist');
    });

    Route::get('/cabtracking', function () {
        return view('cabtracking');
    });

    Route::get('/cabgettrackings','TrackingsController@getListByCodeIdAndUserId');

    Route::get('/cabgetsamolet','TrackingsController@getSamoletByTrackNumber');

    /*Route::get('/cabgettrackings', function () {
        return view('trackinglist');
    });*/
/*
    Route::post('/cabgettrackings',[
        'uses' => 'TrackingsController@getListByCodeIdAndUserId'
    ])->name('getListByCodeIdAndUserId');
*//*
    Route::get('/cabhistory', function () {
        return view('cabhistory');
    });


    Route::get('/tracking', function () {
        return view('tracking');
    });


*/

});
/*
Route::group([
    'middleware'=>'admin'
], function() {

    Route::get('/admin', function () {
        return view('root.home');
    });

    Route::get('/users', function () {
        return view('root.users');
    });

    Route::get('/pricelist', function () {
        return view('root.pricelist');
    });
/*
    Route::get('/nousers', function () {
        return view('root.nousers');
    });*/
/*
    Route::get('/comments', function () {
        return view('root.comments');
    });

    Route::get('/contacts', 'GeneralController@pageaddressload');

    Route::get('/links', 'GeneralController@pagelinksload');


    Route::get('/otpravkalist', function () {
        return view('root.otpravkalist');
    });

    Route::get('/addotpravka', function () {
        return view('root.addotpravka');
    });
    Route::post('/addotpravka', 'OtpravkaController@store');


    Route::get('/tracklist', function () {
        return view('root.tracklist');
    });


    Route::get('/addtrack', function () {
        return view('root.addtrack');
    });
    Route::post('/addtrack', 'TrackingsController@trackstore');

    Route::get('/usercodelist', 'CodesController@getListByUserId2');

    Route::get('/userbycode', 'CodesController@getUserIdByCodeId');

    Route::get('/admins', function () {
        return view('root.admins');
    });

    Route::get('/admin/pages/{pageid}', 'GeneralController@pageload');
    Route::post('/pages', 'GeneralController@pagestore');

    Route::get('/admin/users/{id}','UsersController@viewmember');



    Route::post('/makeadmin', 'UsersController@adminuser');


    Route::get('/admin/otpravkalist/{id}','OtpravkaController@viewforeditotpravka');

    Route::post('/updateotpravka', 'OtpravkaController@update');

});
*/
?>
