<?php

namespace App\Http\Controllers;

use App\Integrante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use App\User;
use App\Profession;
use Illuminate\Validation\Rule;


/**
 * Logica de nuestro modulo de usuarios
 */
class IntegranteController extends Controller
{
    public function index()
    {
        $integrantes = Integrante::paginate(10); // con paginación

        return view('integrantes.index',compact('integrantes'));
    }

    public function detail(Integrante $integrante)
    {
        return view('integrantes.detail')
                 ->with('integrante', $integrante);
    }

    public function new()
    {
        return view('integrantes.new');
    }

    public function store()
    {
        $data = request()->validate(
        [
            'int_nombre' => 'required',
            'int_edad' => 'required',
            'int_identificacion' => 'required',
            'int_foto' => 'required|image'
        ],
        [
            'int_nombre.required' => 'El campo nombre es obligatorio',
            'int_edad.required' => 'El campo edad es obligatorio',
            'int_identificacion.required' => 'El campo identificacion es obligatorio',
            'int_foto.required' => 'El campo foto es obligatorio',
            'int_foto.image' => 'Por favor, no suba archvivos diferentes a una foto'
        ]);

        try
        {
            DB::commit();

            Integrante::create([
                'int_nombre' => $data['int_nombre'],
                'int_edad' => $data['int_edad'],
                'int_identificacion' => $data['int_identificacion'],
                'int_foto' => request()->file('int_foto')->store('public'),
            ]);



        }
        catch (\Exception $exception)
        {
            DB::rollBack();

            dd($exception);
        }

        Mail::to('ccflorezrud@gmail.com')->send(new MessageReceived($data));
        return redirect()->route('integrantes.index');
    }

    public function edit(Integrante $integrante)
    {
        return view('integrantes.edit',compact('integrante'));
    }

    public function update(Integrante $integrante)
    {
        $data = request()->validate([
            'int_nombre' => 'required',
            'int_edad' => 'required',
            'int_identificacion' => 'required',
            'int_foto' => 'image|nullable'
        ],
        [
            'int_nombre.required' => 'El campo nombre es obligatorio',
            'int_edad.required' => 'El campo edad es obligatorio',
            'int_identificacion.required' => 'El campo identificacion es obligatorio',
        ]);

        if (request()->hasFile('int_foto'))
        {
            \Storage::delete($integrante->int_foto);

            $data["int_foto"] = request()->file('int_foto')->store('public');
        }

        $integrante->update($data);//actualizando datos con ELOQUENT

        return redirect("integrantes/{$integrante->int_id}");//redireccion aldetalle de compañia
    }

    public function delete(Integrante $integrante)
    {
        $integrante->delete();

        return redirect()->route('integrantes.index');
    }
}
