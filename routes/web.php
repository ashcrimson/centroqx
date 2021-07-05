<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix' => 'developer'],function (){

    Route::get('prueba/api','PruebaApiController@index')->name('developer.prueba.api');

    Route::get('passport/clients', 'PassportClientsController@index')->name('passport.clients');

});


Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware' => 'auth'],function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/calendar', 'HomeController@calendar')->name('calendar');


    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
    Route::post('profile/{user}/edit/avatar', 'ProfileController@editAvatar')->name('profile.edit.avatar');

    Route::resource('users', 'UserController');
    Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
    Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

    Route::get('option/create/{option}', 'OptionController@create')->name('option.create');
    Route::get('option/orden', 'OptionController@updateOrden')->name('option.order.store');
    Route::resource('options',"OptionController");

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('configurations', 'ConfigurationController');


    Route::resource('pacientes', 'PacienteController');

    Route::get('get/data/paciente', 'PacienteController@getPacientePorApi')->name('get.datos.paciente');

    Route::resource('remas', 'RemaController');

    Route::resource('pacienteAtencions', 'PacienteAtencionController');

    Route::resource('pacientePrevisions', 'PacientePrevisionController');

});



Route::resource('drogas', 'DrogaController');

Route::get('print',function (){

    $fecha = \Carbon\Carbon::now()->format('d/m/Y');
    $primer_nombre = "Felipe";
    $segundo_nombre = "Pino";
    $apellido_paterno = "Ojeda";
    $apellido_materno = "bilches";
    $runcomp ="123456";
    $id_aten= "5555";
    $run= "12345";

    $print_data = "^XA
                ^LH0,0 
                ^FO4,2 
                ^GB804,798,4 
                ^FS 
                ^FO4,2 ^GB548,52,4 ^FS ^FO19,12 ^ADN,36,20 
                ^FDHospital Naval A.Nef ^FS ^FO548,2 ^GB260,52,4 
                ^FS 
                ^FO561,16 ^ADN,36,10 ^FDP/V ^FS ^FO611,16
                ^ADN,36,10 ^FD1:3 
                ^FO21,100 ^ADN,15,15 ^FR ^FDNombre:
                ^FS 
                ^FO321,100
                ^ADN,25,15 ^FR ^FDCLARISA BERNAL MOYA 
                ^FS ^FO4,210 ^GB128,166,4 ^FS ^FO128,210 ^GB680,166,4 ^FS
                ^FO136,220 ^ADN,36,15 ^FDHospital Naval ^FS ^FO136,276 ^ADN,36,10 ^FDInformatica ^FS ^FO15,243 ^ADN,108,50 ^FDE3 ^FS ^FO136,338 ^ADN,36,14 ^FDuwu ^FS ^FO580,338 ^ADN,36,15 ^FDRX ^FS ^FO632,210 ^GB176,166,4 ^FS ^FO660,220
                ^AAN,18,5 ^FDuwu ^FS ^FO695,246 ^ADN,18,5 ^FDCNN ^FS ^FO632, 273
                ^GB176,103,4 ^FS ^FO640,280 ^ADN,18,5 ^FDPeso Kg ^FS ^FO680,318 ^ADN,36,20 ^FD68 ^FS
                ^FO632, 372 ^GB176,48,4 ^FS ^FO640,378 ^ADN,18,5 ^FDPuerto: ^FS ^FO658,398 ^ADN,18,10
                ^FDVALPO ^FS ^FO4,372 ^GB804,48,4 ^FS ^FO25,383 ^ADN,36,10 ^FDNota: ^FS ^FO88,383
                ^ADN,36,10 ^FDOJO ^FS ^FO640,650 ^XGE:GLSMINI.GRF,1,1 ^FS ^FO606,718
                ^GB202,82,4 ^FS ^FO4,718 ^GB606,82,4 ^FS ^FO240,718 ^GB144,80,40 ^FS ^FO242,724
                ^ADN,96,25 ^FR ^FD1-25 ^FS ^FO50,422 ^BY3 ^BCN,260,N,N,N,A ^FVWW540006975010RC ^FS
                ^FO50,685 ^ADN,27,15 ^FDWW 540006975 01 0 RC 01 ^FS 
                ^XZ";

    // dd($print_data);

    try {
        $fp = pfsockopen("172.25.34.88", 9100);
        fputs($fp, $print_data);
        fclose($fp);

        echo 'Successfully Printed';
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
});