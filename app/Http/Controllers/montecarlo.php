<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class montecarlo extends Controller
{
    public function index()
    {
    	return view('inicio.simulacion_montecarlo');
    }

    public function create()
    {
    	# code...
    }

    public function show($id)
    {
    	# code...
    }

    public function store(Request $request)
    {
        // Recibir valores desde la vista
        // valor para Xn o semilla
        $xn = $request->xn;
        // valor para a o multiplicador
        $a = $request->a;
        // valor para c o sesgo
        $c = $request->c;
        // valor m o modulo
        $m = $request->m;
        // valor que nos indicara el numero de aleatorios que deseamos
        $n = $request->n;
        
        // Se hace el llamado a a funcion que realiza el proceso, esta funcion retorna un arreglo multidimensional con los numeros aleatorios
        $datos = calcular_aleatorio($xn, $a, $c, $m, $n);

        // se muestran los resultados en la vista
        return view('desnudas.aleatorio_congruente',compact('datos'));
    }

    public function update(Request $request)
    {
    	# code...
    }

    public function destroy($request)
    {
    	# code...
    }
}
