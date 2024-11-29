<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\TiposEquipamentos;
use Brian2694\Toastr\Facades\Toastr;
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
            try {
                $image = $request->file('imagem');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imagePath = 'images/' . $imageName;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['imagem' => 'Falha no upload da imagem. Tente novamente.']);
            }
        } else {
            return redirect()->back()->withErrors(['imagem' => 'Imagem não foi enviada corretamente.']);
        }

        try {
            $tipoEquipamento = TiposEquipamentos::create([
                'desc' => $request->input('equipamento'),
                'imagem' => $imagePath,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['equipamento' => 'Falha ao cadastrar o equipamento.']);
        }

        try {
            foreach ($request->input('problemas') as $problemaDesc) {
                Problema::create([
                    'desc' => $problemaDesc,
                    'tipo_equipamento_id' => $tipoEquipamento->id,
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['problemas' => 'Falha ao cadastrar os problemas.']);
        }

        Toastr::success('Equipamento cadastrado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
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
        Toastr::success('Equipamento atualizado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('lista.tipoequipamento')->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy($id)
{
    $tipoEquipamento = TiposEquipamentos::findOrFail($id);
    $tipoEquipamento->delete();

    return redirect()->route('lista.tipoequipamento')->with('success', 'Equipamento excluído com sucesso!');
}

public function historico()
{
    $equipamentos = Equipamentos::with('protocolos', 'tiposEquipamentos')
                                ->whereIn('id_status', [4, 5, 6])
                                ->get();

    return view('equipamentos.lista-equipamentos', compact('equipamentos'));
}


}
