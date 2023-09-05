<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Employees extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/employees');
        $data = $response->json();
        return view('employees.index',compact('data'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/stalls');
        $data = $response->json();
        return view('employees.create',compact('data'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::post($url.'/employees',[
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Stall_id' => $request->Stall_id
        ]);

        if($response->status() == 422)
        {
            $errors = $response->json()['Errors'];
            $camposConErrores = array_keys($errors);

            if(!empty($camposConErrores))
            {
                $primercampo = $camposConErrores[0];
                $primerError = $errors[$primercampo][0];
            }
            
            return redirect()->back()->with('error',$primerError);
        }

        return redirect()->route('employees.index')->with('successful','Empleado Creado Exitosamente');
    }

    public function delete($id)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::delete($url.'/employees/'.$id);
        return redirect()->route('employees.index')->with('successful','Empleado Eliminado Exitosamente');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/employees/'.$id);
        $empleado = $response->json();
        $responsestalls = Http::get($url.'/stalls');
        $puestos = $responsestalls->json();

        return view('employees.edit', compact('puestos','empleado'));
    }


    public function update(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::put($url.'/employees/'.$request->id,[
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Stall_id' => $request->Stall_id
        ]);

        if($response->status() == 422)
        {
            $errors = $response->json()['Errors'];
            $camposConErrores = array_keys($errors);

            if(!empty($camposConErrores))
            {
                $primercampo = $camposConErrores[0];
                $primerError = $errors[$primercampo][0];
            }

            return redirect()->back()->with('error',$primerError);
        }

        return redirect()->route('employees.index')->with('successful','Empleado actualizado correctamente');
    }
}
