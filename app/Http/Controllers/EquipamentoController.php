<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\TiposEquipamentos;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function create () {

        return view('equipamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipamento' => 'required|string|max:255',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'problemas' => 'required|string|max:255',
        ]);

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Caminho relativo para armazenar no banco ou exibir na view
            $imagePath = 'images/' . $imageName;
        }

        $tipoEquipamento = TiposEquipamentos::create([
            'desc' => $request->input('equipamento'),
            'imagem' => $imagePath,
        ]);

        Problema::create([
            'desc' => $request->input('problemas'),
            'tipo_equipamento_id' => $tipoEquipamento->id,
        ]);



        return redirect()->route('create.equipamento')->with('success', 'Equipamento e problema cadastrados com sucesso!');
    }


}
