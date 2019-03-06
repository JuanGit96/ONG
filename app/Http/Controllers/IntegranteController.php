<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profession;
use App\Company;
use Illuminate\Validation\Rule;


/**
 * Logica de nuestro modulo de usuarios
 */
class IntegranteController extends Controller
{
    public function index()
    {
        $integrante = Integrante::paginate(10); // con paginación
        
        return view('integrantes.index',compact('integrante'));
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
        $data = request()->validate([
            'int_nombre' => 'required',
            'int_edad' => 'required',
            'int_identificacion' => 'required',
            'int_foto' => 'required'
        ],[
            'int_nombre.required' => 'El campo nombre es obligatorio',
            'int_edad.required' => 'El campo edad es obligatorio',
            'int_identificacion.required' => 'El campo identificacion es obligatorio',
            'int_foto.required' => 'El campo foto es obligatorio',
        ]);

        Company::create([
            'int_nombre' => $data['name'],
            'int_edad' => $data['activity'],
            'int_identificacion' => $data['address'],
            'int_foto' => $data['seo'],
        ]);

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
            'int_foto' => 'required'
        ],[
            'int_nombre.required' => 'El campo nombre es obligatorio',
            'int_edad.required' => 'El campo edad es obligatorio',
            'int_identificacion.required' => 'El campo identificacion es obligatorio',
            'int_foto.required' => 'El campo foto es obligatorio',
        ]);

        $integrante->update($data);//actualizando datos con ELOQUENT

        return redirect("integrantes/{$integrante->int_id}");//redireccion aldetalle de compañia
    }

    public function delete(Integrante $integrante)
    {
        $integrante->delete();

        return redirect()->route('integrantes.index');
    }
}