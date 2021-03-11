<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ui25VlKXphjA58CL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/d' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ccXZ6WqYer2ApgsD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/online-reserved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.online-reserved',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/online-held' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.online-held',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/online-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.online-create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/online-select-teaching' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.online-select-teaching',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'panel.online-select-teaching-record',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/teaching-dates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.select-teaching-dates',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'panel.update-teaching-dates',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/edit-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.edit-profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'panel.edit-profile-form',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/edit-profile-professor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.edit-profile-professor',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/upload-image-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qtC84GP2UCr68yjZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/new-ticket' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.new-ticket',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1z1kx4EEWY4vYJff',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/list-tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.list-tickets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/show-ticket' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.send.message',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/panel/increase-credit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.increase.credit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/online' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yaIOED3jYfj5MTp2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/online/getDates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nOde5ln9O1XIsP0C',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/online/mobileHandle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cIKBVRjtSCT3d0NZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/online/check-verify-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OhcDfzuleIqXy4rN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/online/online-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'online-form',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/offline' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OAUSO1aCr2QeZQ14',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/offline/mobileHandle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4Oxx2C9SjQEwj9Vy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z94brnAiR6GmqUfo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ThADxBPwH8tNdyNH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DAZrRL9klshqY0EH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2h441MEMjWNPBh20',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/recovery-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::poXtxw3q4fHA8qyD',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/recovery-password-check-verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::deFR1KGqvdVLqP6w',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IerSwAG3m0TaXlhc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/offline/recordHandle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::B0pp8FLh003VpfVy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/panel/show\\-ticket/([^/]++)(*:35)|/files/([^/]++)(*:57))/?$}sDu',
    ),
    3 => 
    array (
      35 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.show.ticket',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      57 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BLAQqMY73KloZR3j',
          ),
          1 => 
          array (
            0 => 'img_name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::Ui25VlKXphjA58CL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":291:{@MIK7p+evJO5g9kZG8HflxV9P5SJOgL05cgzf2np1lwc=.a:5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000034fe8180000000000ad09cd9";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Ui25VlKXphjA58CL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ccXZ6WqYer2ApgsD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'd',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@getPass',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@getPass',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::ccXZ6WqYer2ApgsD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@home',
        'controller' => 'App\\Http\\Controllers\\panelController@home',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.online-reserved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/online-reserved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@onlineReserved',
        'controller' => 'App\\Http\\Controllers\\panelController@onlineReserved',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.online-reserved',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.online-held' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/online-held',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@onlineHeld',
        'controller' => 'App\\Http\\Controllers\\panelController@onlineHeld',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.online-held',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.online-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/online-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@onlineRequest',
        'controller' => 'App\\Http\\Controllers\\panelController@onlineRequest',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.online-create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.online-select-teaching' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/online-select-teaching',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@onlineSelectTeaching',
        'controller' => 'App\\Http\\Controllers\\panelController@onlineSelectTeaching',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.online-select-teaching',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.online-select-teaching-record' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/online-select-teaching',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@onlineSelectTeachingRecord',
        'controller' => 'App\\Http\\Controllers\\panelController@onlineSelectTeachingRecord',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.online-select-teaching-record',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.select-teaching-dates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/teaching-dates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@selectTeachingDates',
        'controller' => 'App\\Http\\Controllers\\panelController@selectTeachingDates',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.select-teaching-dates',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.update-teaching-dates' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/teaching-dates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@updateTeachingDates',
        'controller' => 'App\\Http\\Controllers\\panelController@updateTeachingDates',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.update-teaching-dates',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.edit-profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/edit-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@editProfile',
        'controller' => 'App\\Http\\Controllers\\panelController@editProfile',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.edit-profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.edit-profile-professor' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/edit-profile-professor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@editProfileProfessor',
        'controller' => 'App\\Http\\Controllers\\panelController@editProfileProfessor',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.edit-profile-professor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.edit-profile-form' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/edit-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\panelController@updateProfile',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.edit-profile-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qtC84GP2UCr68yjZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/upload-image-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@uploadImageProfile',
        'controller' => 'App\\Http\\Controllers\\panelController@uploadImageProfile',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'generated::qtC84GP2UCr68yjZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.new-ticket' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/new-ticket',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ticketController@newTicket',
        'controller' => 'App\\Http\\Controllers\\ticketController@newTicket',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.new-ticket',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1z1kx4EEWY4vYJff' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/new-ticket',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ticketController@create',
        'controller' => 'App\\Http\\Controllers\\ticketController@create',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'generated::1z1kx4EEWY4vYJff',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.list-tickets' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/list-tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ticketController@listTickets',
        'controller' => 'App\\Http\\Controllers\\ticketController@listTickets',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.list-tickets',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.show.ticket' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/show-ticket/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ticketController@showTicket',
        'controller' => 'App\\Http\\Controllers\\ticketController@showTicket',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.show.ticket',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.send.message' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/show-ticket',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ticketController@sendTicket',
        'controller' => 'App\\Http\\Controllers\\ticketController@sendTicket',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.send.message',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'panel.increase.credit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/increase-credit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@increaseCredit',
        'controller' => 'App\\Http\\Controllers\\panelController@increaseCredit',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.increase.credit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::yaIOED3jYfj5MTp2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'online',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@index',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@index',
        'namespace' => NULL,
        'prefix' => '/online',
        'where' => 
        array (
        ),
        'as' => 'generated::yaIOED3jYfj5MTp2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::nOde5ln9O1XIsP0C' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'online/getDates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@getDates',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@getDates',
        'namespace' => NULL,
        'prefix' => '/online',
        'where' => 
        array (
        ),
        'as' => 'generated::nOde5ln9O1XIsP0C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::cIKBVRjtSCT3d0NZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'online/mobileHandle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@mobileHandle',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@mobileHandle',
        'namespace' => NULL,
        'prefix' => '/online',
        'where' => 
        array (
        ),
        'as' => 'generated::cIKBVRjtSCT3d0NZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OhcDfzuleIqXy4rN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'online/check-verify-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@checkVerifyPassword',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@checkVerifyPassword',
        'namespace' => NULL,
        'prefix' => '/online',
        'where' => 
        array (
        ),
        'as' => 'generated::OhcDfzuleIqXy4rN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'online-form' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'online/online-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@create',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@create',
        'namespace' => NULL,
        'prefix' => '/online',
        'where' => 
        array (
        ),
        'as' => 'online-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OAUSO1aCr2QeZQ14' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'offline',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\offlineClassController@index',
        'controller' => 'App\\Http\\Controllers\\offlineClassController@index',
        'namespace' => NULL,
        'prefix' => '/offline',
        'where' => 
        array (
        ),
        'as' => 'generated::OAUSO1aCr2QeZQ14',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4Oxx2C9SjQEwj9Vy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'offline/mobileHandle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\offlineClassController@mobileHandle',
        'controller' => 'App\\Http\\Controllers\\offlineClassController@mobileHandle',
        'namespace' => NULL,
        'prefix' => '/offline',
        'where' => 
        array (
        ),
        'as' => 'generated::4Oxx2C9SjQEwj9Vy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Z94brnAiR6GmqUfo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\indexController@index',
        'controller' => 'App\\Http\\Controllers\\indexController@index',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::Z94brnAiR6GmqUfo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\registerController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\registerController@register',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ThADxBPwH8tNdyNH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\registerController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\registerController@create',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::ThADxBPwH8tNdyNH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DAZrRL9klshqY0EH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\registerController@passwordRequest',
        'controller' => 'App\\Http\\Controllers\\Auth\\registerController@passwordRequest',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::DAZrRL9klshqY0EH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\loginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\loginController@login',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2h441MEMjWNPBh20' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\loginController@doLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\loginController@doLogin',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::2h441MEMjWNPBh20',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::poXtxw3q4fHA8qyD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'recovery-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\loginController@recoveryPassword',
        'controller' => 'App\\Http\\Controllers\\Auth\\loginController@recoveryPassword',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::poXtxw3q4fHA8qyD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::deFR1KGqvdVLqP6w' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'recovery-password-check-verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\loginController@recoveryPasswordCheckVerify',
        'controller' => 'App\\Http\\Controllers\\Auth\\loginController@recoveryPasswordCheckVerify',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::deFR1KGqvdVLqP6w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::IerSwAG3m0TaXlhc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\loginController@logOut',
        'controller' => 'App\\Http\\Controllers\\Auth\\loginController@logOut',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::IerSwAG3m0TaXlhc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::B0pp8FLh003VpfVy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'offline/recordHandle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\offlineClassController@recordStepOne',
        'controller' => 'App\\Http\\Controllers\\offlineClassController@recordStepOne',
        'namespace' => NULL,
        'prefix' => '/offline',
        'where' => 
        array (
        ),
        'as' => 'generated::B0pp8FLh003VpfVy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BLAQqMY73KloZR3j' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'files/{img_name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\fileController@getFile',
        'controller' => 'App\\Http\\Controllers\\fileController@getFile',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::BLAQqMY73KloZR3j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
