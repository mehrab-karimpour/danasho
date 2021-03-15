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
            '_route' => 'generated::yrQy9Lhw0eIBXhgD',
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
            '_route' => 'generated::4ot1Lqy01rWDrWVp',
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
      '/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bivh1LW8C1v61GVW',
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
      '/panel/get-student-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'panel.online-get-student-status',
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
            '_route' => 'generated::PCuFYRcoHx0ptFmy',
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
            '_route' => 'generated::HzAB5BawDEp7piYX',
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
            '_route' => 'generated::MCDKo62vBBQuwcAm',
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
            '_route' => 'generated::qvnYljjEGLJEg7CI',
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
            '_route' => 'generated::b8PUwr6IJS4mfSx1',
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
            '_route' => 'generated::Xuk2qpixDgbu0Sse',
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
            '_route' => 'generated::FdqEkNJf6yKcSaQo',
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
            '_route' => 'generated::oGh06nAhU1hWTEwJ',
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
            '_route' => 'generated::avKdA6IND9hSFJmV',
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
            '_route' => 'generated::by9M0EMTomk0I7Ey',
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
            '_route' => 'generated::s6esb1XzbivukTfj',
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
            '_route' => 'generated::BrHmYxW2HvQQe2jV',
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
            '_route' => 'generated::OgFiw7T5IqJaQPxQ',
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
            '_route' => 'generated::avBNrThRNnLc9mWc',
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
            '_route' => 'generated::abCZdLF9GwEYr3VL',
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
            '_route' => 'generated::JLVE3YZn3UT2ei63',
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
            '_route' => 'generated::zAwPKQiILgCQcjO0',
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
            '_route' => 'generated::90zR2MvoSg4KyKTU',
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
    'generated::yrQy9Lhw0eIBXhgD' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":291:{@iNyGZ0xIaeDaODt2UiW8xxyRyB0FPpn9Q3p8XqK3ank=.a:5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000046622cd0000000001a476ccf";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::yrQy9Lhw0eIBXhgD',
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
    'generated::4ot1Lqy01rWDrWVp' => 
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
        'as' => 'generated::4ot1Lqy01rWDrWVp',
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
    'generated::bivh1LW8C1v61GVW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\onlineClassController@professorSelected',
        'controller' => 'App\\Http\\Controllers\\onlineClassController@professorSelected',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::bivh1LW8C1v61GVW',
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
    'panel.online-get-student-status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'panel/get-student-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@getStudentStatus',
        'controller' => 'App\\Http\\Controllers\\panelController@getStudentStatus',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'panel.online-get-student-status',
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
    'generated::PCuFYRcoHx0ptFmy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'panel/get-student-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\panelController@getStudentUpdate',
        'controller' => 'App\\Http\\Controllers\\panelController@getStudentUpdate',
        'namespace' => NULL,
        'prefix' => '/panel',
        'where' => 
        array (
        ),
        'as' => 'generated::PCuFYRcoHx0ptFmy',
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
    'generated::HzAB5BawDEp7piYX' => 
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
        'as' => 'generated::HzAB5BawDEp7piYX',
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
    'generated::MCDKo62vBBQuwcAm' => 
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
        'as' => 'generated::MCDKo62vBBQuwcAm',
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
    'generated::qvnYljjEGLJEg7CI' => 
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
        'as' => 'generated::qvnYljjEGLJEg7CI',
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
    'generated::b8PUwr6IJS4mfSx1' => 
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
        'as' => 'generated::b8PUwr6IJS4mfSx1',
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
    'generated::Xuk2qpixDgbu0Sse' => 
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
        'as' => 'generated::Xuk2qpixDgbu0Sse',
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
    'generated::FdqEkNJf6yKcSaQo' => 
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
        'as' => 'generated::FdqEkNJf6yKcSaQo',
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
    'generated::oGh06nAhU1hWTEwJ' => 
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
        'as' => 'generated::oGh06nAhU1hWTEwJ',
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
    'generated::avKdA6IND9hSFJmV' => 
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
        'as' => 'generated::avKdA6IND9hSFJmV',
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
    'generated::by9M0EMTomk0I7Ey' => 
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
        'as' => 'generated::by9M0EMTomk0I7Ey',
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
    'generated::s6esb1XzbivukTfj' => 
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
        'as' => 'generated::s6esb1XzbivukTfj',
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
    'generated::BrHmYxW2HvQQe2jV' => 
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
        'as' => 'generated::BrHmYxW2HvQQe2jV',
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
    'generated::OgFiw7T5IqJaQPxQ' => 
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
        'as' => 'generated::OgFiw7T5IqJaQPxQ',
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
    'generated::avBNrThRNnLc9mWc' => 
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
        'as' => 'generated::avBNrThRNnLc9mWc',
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
    'generated::abCZdLF9GwEYr3VL' => 
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
        'as' => 'generated::abCZdLF9GwEYr3VL',
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
    'generated::JLVE3YZn3UT2ei63' => 
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
        'as' => 'generated::JLVE3YZn3UT2ei63',
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
    'generated::zAwPKQiILgCQcjO0' => 
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
        'as' => 'generated::zAwPKQiILgCQcjO0',
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
    'generated::90zR2MvoSg4KyKTU' => 
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
        'as' => 'generated::90zR2MvoSg4KyKTU',
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
