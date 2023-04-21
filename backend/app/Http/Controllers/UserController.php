<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private const ERROR_MESSAGE = ['error' => 'User not found'];

    public function getByParams(Request $request)
    {
        $query = User::query();

        if ($request->has('id'))
            $query->where('id', $request->input('id'));

        if ($request->has('name'))
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');

        if ($request->has('cpf'))
            $query->where('cpf', $request->input('cpf'));

        if ($request->has('email'))
            $query->where('email', 'LIKE', '%' . $request->input('email') . '%');

        if ($request->has('address'))
            $query->where('address', 'LIKE', '%' . $request->input('address') . '%');

        if ($request->has('cep'))
            $query->where('cep', $request->input('cep'));

        if ($request->has('permissions'))
            $query->where('permissions', $request->input('permissions'));

        $data = $query->get();

        return ($data->isEmpty())
            ? response(self::ERROR_MESSAGE, 404)
            : response()->json($data);
    }

    public function createUser(Request $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'cpf' => $request->input('cpf'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'cep' => $request->input('cep')
        ]);

        $user->setPassword($request->input('password'));
        $user->setPermissions($request->input('permissions'));

        $user->save();

        return response()->json($user, 201);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (is_null($user))
            return response()->json(self::ERROR_MESSAGE, 404);

        $user->name = $request->input('name');
        $user->cpf = $request->input('cpf');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->cep = $request->input('cep');

        $user->setPassword($request->input('password'));
        $user->setPermissions($request->input('permissions'));

        $user->save();

        return response()->json($user);
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);

        if (is_null($user))
            return response()->json(self::ERROR_MESSAGE, 404);

        $user->delete();

        return response()->noContent();
    }
}