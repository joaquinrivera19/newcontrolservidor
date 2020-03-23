<?php
Route::get('/', 'AuditServidorController@index');
Route::get('/auditservidor', 'AuditServidorController@index');
Route::get('/csi', 'CsiController@index');
Route::get('/dbbackup', 'DbbackupController@index');

Route::resource('conces', 'ConcesController');

Route::resource('conceconexion', 'ConceConexionController');
Route::get('info_conexiones/{cod}', 'ConceConexionController@getConceConexion');

Route::resource('campcon', 'CampConController');

//Route::resource('novedad', 'NovedadController');

Route::resource('campania', 'CampaniaController');

Route::get('getcampania/{codigo}', 'CampaniaController@getcampania');

Route::get('getcampania_segunda_table/{codigo}', 'CampaniaController@getcampania_segunda_table');

Route::get('getcampanialist/{cod}', 'CampaniaController@getcampanialist');

Route::get('getcampania_info', 'CampaniaController@getcampania_info');

Route::get('getcampsis/{cod}', 'CampaniaController@getcampsis');

Route::resource('actualiza_empresa', 'CampaniaController');

Route::get('auditservidor/{fecha}', 'AuditServidorController@getFecha');
Route::get('csi/{fecha}', 'CsiController@getFecha');
Route::get('dbbackups/{fecha}', 'DbbackupController@getFecha');

Route::get('lsdyhlyjctslc4qs067u/{conce}/{tipo}/{fechainicio}', 'AuditServidorController@getrecibo');

Route::get('lsdyhlyjctslc4qs067csi/{conce}/{tipo}/{fechainicio}/{version}', 'CsiController@getrecibo');

Route::get('lsdyhlyjctslc4qs067dbbackup/{conce}/{tipo}/{fechainicio}/{version}', 'DbbackupController@getrecibo');