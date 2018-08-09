<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inventario extends Controller
{
    public function index()
    {
    	return view('inicio.inventariomontecarlo');
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
        // dd($request->all());
        $r = $request->r;
        $q = $request->q;
        $inv_ini = $request->inv_ini;
        $ch = $request->ch;
        $co = $request->Co;
        $cf = $request->cf;

        // Crear tabla de probabilidad de demanda
        $tabla_pro_demanda = [];
        // crear una variable acumuladora que ira acumulando los valores de la probabilidad acumulada
        $acumulador_pro_dem = 0;
        // esta variable lo que hace es Acumular los rangos menores de la tabla
        $acumulador_rango_menor = 0;
        // se genera un bucle dependiendo del numero de probabilidades y valores que contendran la tabla de llegada
        for ($i=0; $i < count($request->valor3); $i++) { 
            // en el arreglo multidimensional se guarda en la posicion i0 el valor de la llegada
            $tabla_pro_demanda[$i][0] = $request->valor3[$i];
            // en el arreglo multidimensional se guarda en la posicion i1 el valor de la probabilidad
            $tabla_pro_demanda[$i][1] = $request->probabilidad3[$i];
            // se hace uso de la variable acumuladora para la probabilidad acumulada
            $acumulador_pro_dem = $acumulador_pro_dem + $request->probabilidad3[$i];
            // en la posicion i2 se guarda la probabilidad acumulada
            $tabla_pro_demanda[$i][2] = $acumulador_pro_dem;
            // en la posicion i3 se guarda el rango menor y se redondea a tres decimales por medio de la funcion round
            $tabla_pro_demanda[$i][3] = round($acumulador_rango_menor,3);
            // se actualiza el acumulador aumentandole 0.001 para el rango
            $acumulador_rango_menor = round($acumulador_pro_dem,3) + 0.001;
            // en la posicion i4 del arreglo se guarda el rango mayor
            $tabla_pro_demanda[$i][4] = $acumulador_pro_dem;
        }

        // Crear tabla de probabilidad de entrega
        $tabla_pro_entrega = [];
        // crear una variable acumuladora que ira acumulando los valores de la probabilidad acumulada
        $acumulador_pro_ent = 0;
        // esta variable lo que hace es Acumular los rangos menores de la tabla
        $acumulador_rango_menor = 0;
        // se genera un bucle dependiendo del numero de probabilidades y valores que contendran la tabla de llegada
        for ($i=0; $i < count($request->valor4); $i++) { 
            // en el arreglo multidimensional se guarda en la posicion i0 el valor de la llegada
            $tabla_pro_entrega[$i][0] = $request->valor4[$i];
            // en el arreglo multidimensional se guarda en la posicion i1 el valor de la probabilidad
            $tabla_pro_entrega[$i][1] = $request->probabilidad4[$i];
            // se hace uso de la variable acumuladora para la probabilidad acumulada
            $acumulador_pro_ent = $acumulador_pro_ent + $request->probabilidad4[$i];
            // en la posicion i2 se guarda la probabilidad acumulada
            $tabla_pro_entrega[$i][2] = $acumulador_pro_ent;
            // en la posicion i3 se guarda el rango menor y se redondea a tres decimales por medio de la funcion round
            $tabla_pro_entrega[$i][3] = round($acumulador_rango_menor,3);
            // se actualiza el acumulador aumentandole 0.001 para el rango
            $acumulador_rango_menor = round($acumulador_pro_ent,3) + 0.001;
            // en la posicion i4 del arreglo se guarda el rango mayor
            $tabla_pro_entrega[$i][4] = $acumulador_pro_ent;
        }

        $tabla_calculada = [];
        // Esta variabe sera util para identificar el numero de fila
        $contador_res = 1;
        // esta es la hora de llegada exacta que se inicializa con cero
        $hora_llegada_exacta = 0;
        // al igual que la llegada exacta el fin de servicio tambien se inicializa con cero
        $hora_fin_servicio = 0;
        $marcador_entrega = 0;
        // Se realiza el bucle la cantidad de veces de numeros aleatorios enviados
        for ($i=0; $i < count($request->aleatorio_llegada); $i++) { 
            // en la posicion i0 del arreglo se guarda el numero de fila
            $tabla_calculada[$i][0] = $contador_res;
            // en la posicion i1 del arreglo se guarda el aleatorio de llegada
            $tabla_calculada[$i][1] = $request->aleatorio_llegada[$i];
            $deandas_ventas = buscar_en_pro($tabla_pro_demanda, $request->aleatorio_llegada[$i]);
            $tabla_calculada[$i][2] = $deandas_ventas;
            $tabla_calculada[$i][3] = $inv_ini;
            $inv_tem = $inv_ini;
            $inv_ini = $tabla_calculada[$i][3] - $tabla_calculada[$i][2];
            if ($inv_ini < 0) {
                $inv_ini = 0;
            }
            $tabla_calculada[$i][4] = 0;
            if ($marcador_entrega != 0) {
                if ($tabla_calculada[$i][0] == $marcador_entrega) {
                    $tabla_calculada[$i][4] = $q;
                    $inv_ini = $inv_ini + $q - $tabla_calculada[$i][2] + $inv_tem;
                    $marcador_entrega = 0;
                }
            }

            $tabla_calculada[$i][5] = $inv_ini;
            $costo_faltante = 0;
            if ($tabla_calculada[$i][2] > ($tabla_calculada[$i][3] + $tabla_calculada[$i][4])) {
            $costo_faltante = $cf;
            }
            $tabla_calculada[$i][6] = $costo_faltante;

            $costo_mantener=0;
            $costo_mantener = $ch * $tabla_calculada[$i][5];
            $tabla_calculada[$i][7] = $costo_mantener;

            $orden = 0;
            if ($marcador_entrega == 0) {
                if ($tabla_calculada[$i][5] <= $r) {
                    $orden = $co;
                }
            }
            $tabla_calculada[$i][8] = $orden;

            $tabla_calculada[$i][9] = $request->aleatorio_servicio[$i];
            $t_entrega = 0;
            if ($marcador_entrega == 0) {
                if ($tabla_calculada[$i][5] <= $r) {
                    $t_entrega = buscar_en_pro($tabla_pro_entrega, $request->aleatorio_servicio[$i]);
                }
            }

            $tabla_calculada[$i][10] = $t_entrega;
            $dia_entrega = 0;
            if ($marcador_entrega == 0) {
                if ($tabla_calculada[$i][10] > 0) {
                    $dia_entrega = $tabla_calculada[$i][10] + $tabla_calculada[$i][0] + 1;
                }
            }
            $tabla_calculada[$i][11] = $dia_entrega;
            if ($tabla_calculada[$i][11] != 0) {
                $marcador_entrega = $tabla_calculada[$i][11];
            }
            $contador_res = $contador_res + 1;
        }
        return view('desnudas.inv_mon_resul',compact('tabla_pro_demanda','tabla_pro_entrega','tabla_calculada'));
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
