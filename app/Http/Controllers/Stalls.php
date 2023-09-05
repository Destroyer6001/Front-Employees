<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class Stalls extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/stalls');
        $data = $response->json();
        return view('stalls.index',compact('data'));
    }

    public function create()
    {
        return view('stalls.create');
    }


    public function store(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::post($url.'/stalls',[
            'Name' => $request->Name
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

        return redirect()->route('stalls.index')->with('successful','Puesto Creado Exitosamente');
    }

    public function edit($idStall)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/stalls/'.$idStall);
        $puesto = $response->json();
        return view ('stalls.edit', compact('puesto'));
    }

    public function update(Request $request)
    {
        $url = env('URL_SERVER_API','Http://127.0.0.1');
        $response = Http::put($url.'/stalls/'.$request->Id,[
            'Name' => $request->Name
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


        return redirect()->route('stalls.index')->with('successful','Puesto actualizado exitosamente');
    }

    public function delete($idStall)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::delete($url.'/stalls/'.$idStall);

        return redirect()->route('stalls.index')->with('successful','Puesto eliminado exitosamente');
    }
}
