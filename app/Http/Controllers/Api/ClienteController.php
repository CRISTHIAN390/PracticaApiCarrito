<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        if ($clientes->isEmpty()) {
            $data = [
                'message' => 'No se encontraron clientes',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        $data = [
            'clientes' => $clientes,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apellidos' => 'required',
            'nombres' => 'required',
            'edad' => 'required|numeric',
            'dni' => 'required|string|max:8',
            'estado' => 'numeric'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion',
                'errors' => $validator->errors(),
                'status' => 400
            ];
        }

        $cliente = Cliente::create(
            [
                'apellidos' => $request->apellidos,
                'nombres' => $request->nombres,
                'edad' => $request->edad,
                'dni' => $request->dni,
                'estado' => 1
            ]
        );
        if (!$cliente) {
            $data = [
                'message' => 'Error al crear el cliente',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Cliente creado correctamente',
            'cliente' => $cliente
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            $data = [
                'message' => 'No se encontro el cliente',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'cliente' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        if (!$clientes) {
            $data = [
                'message' => 'Cliente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $clientes->delete();
        $data = [
            'message' => 'Cliente eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $clientes = Cliente::find($id);
        if (!$clientes) {
            $data = [
                'message' => 'Cliente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'apellidos' => 'required',
            'nombres' => 'required',
            'edad' => 'required|numeric',
            'dni' => 'required|string|max:8'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('apellidos')) {
            $clientes->apellidos = $request->apellidos;
        }
        if ($request->has('nombres')) {
            $clientes->nombres = $request->nombres;
        }
        if ($request->has('edad')) {
            $clientes->edad = $request->edad;
        }
        if ($request->has('dni')) {
            $clientes->dni = $request->dni;
        }
        $clientes->save();
        $data = [
            'message' => 'Cliente actualizado correctamente',
            'cliente' => $clientes,
            'status' => '200'
        ];
        return response()->json($data, 200);
    }
    public function updatepartial(Request $request, $id)
    {
        $clientes = Cliente::find($id);
        if (!$clientes) {
            $data = [
                'message' => 'Cliente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'apellidos' => 'required',
            'nombres' => 'required',
            'edad' => 'required|numeric',
            'dni' => 'required|string|max:8'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('apellidos')) {
            $clientes->apellidos = $request->apellidos;
        }
        if ($request->has('nombres')) {
            $clientes->nombres = $request->nombres;
        }
        if ($request->has('edad')) {
            $clientes->edad = $request->edad;
        }
        if ($request->has('dni')) {
            $clientes->dni = $request->dni;
        }
        $clientes->save();
        $data = [
            'message' => 'Cliente actualizado correctamente',
            'cliente' => $clientes,
            'status' => '200'
        ];
        return response()->json($data, 200);
    }
}
