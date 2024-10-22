<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\TiposEquipamentos;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function create()
    {

        return view('equipamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipamento' => 'required|string|max:255',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'problemas' => 'required|array',
            'problemas.*' => 'required|string|max:255',
        ]);

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        $tipoEquipamento = TiposEquipamentos::create([

            'desc' => $request->input('equipamento'),
            'imagem' => $imagePath,

        ]);

        foreach ($request->input('problemas') as $problemaDesc) {
            Problema::create([
                'desc' => $problemaDesc,
                'tipo_equipamento_id' => $tipoEquipamento->id,
            ]);
        }

        return redirect()->route('create.equipamento')->with('success', 'Equipamento e problemas cadastrados com sucesso!');
    }

    public function index()
    {
        $tipos = TiposEquipamentos::all();

        return view('equipamentos.lista', compact('tipos'));
    }

    public function edit($id)
    {
        $tipoEquipamento = TiposEquipamentos::with('problemas')->findOrFail($id);

        return view('equipamentos.edit', compact('tipoEquipamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'equipamento' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'problemas' => 'required|array',
            'problemas.*' => 'required|string|max:255',
        ]);

        $tipoEquipamento = TiposEquipamentos::findOrFail($id);

        $tipoEquipamento->desc = $request->input('equipamento');

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            $tipoEquipamento->imagem = $imagePath;
        }

        $tipoEquipamento->save();

        Problema::where('tipo_equipamento_id', $id)->delete();
        foreach ($request->input('problemas') as $problemaDesc) {
            Problema::create([
                'desc' => $problemaDesc,
                'tipo_equipamento_id' => $tipoEquipamento->id,
            ]);
        }

        return redirect()->route('lista.tipoequipamento')->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy($id)
{
    $tipoEquipamento = TiposEquipamentos::findOrFail($id);
    $tipoEquipamento->delete();

    return redirect()->route('lista.tipoequipamento')->with('success', 'Equipamento excluído com sucesso!');
}

}
