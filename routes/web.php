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
/*******************************************Pagina inicial************************************************************/
// Inicio
Route::resource('inicio','inicio');

/*******************************************Numeros aleatorios********************************************************/
// Pagina principal de numeros aleatorios					:index
// Generacion de numeros aleatorios							:store
Route::resource('numeros_aleatorios','num_aleatorioController');

/********************************************Linea de espera**********************************************************/
// Pagina principal de linea de espera						:index
// generacion de los aleatorios de llegada y servicio		:store
Route::resource('linea-espera','lineaespera');

// calculo de la linea de espera
Route::post('linea-espera-calculo','lineaespera@calcular_linea_espera');

/*********************************************Linea de espera montecarlo***********************************************/
// pagina inicial de la linea de espera montecarlo
Route::get('linea-espera-montecarlo','lineaespera@montecarlo');

// generacion de la tabla de probabilidades de en eventos de llegada
Route::post('probabilidades_llegada','lineaespera@generar_tab_pro');

// Calculo de la simulacion de linea de espera montecarlo
Route::post('linea-montecarlo-calculo','lineaespera@calcularlineamontecarlo');

/********************************************* Inventario Montecarlo***********************************************/
// Pagina Inicial para la simulacion del Inventario Montecarlo
Route::resource('inventario-montecarlo','inventario');