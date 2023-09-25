<?php

namespace App\Http\Controllers\Admin\BUMDESMA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramKerja;
use App\Http\Requests\DataLembagaRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProgramKerjaBumdesmaController extends Controller
{
    public function index()
    {
        $item = ProgramKerja::where('type', "bumdesma")->paginate();

        return view('admin.bumdesma.program-kerja.index', ['data' => $item]);
    }

    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.bumdesma.program-kerja.create');
        }

        return view('admin.404');
    }

    public function store(DataLembagaRequest $request)
    {
        $item = ProgramKerja::create([
            'type' => $request->type,
            'foto' => $request->file('foto')->store('BUMDESMA/program-kerja'),
            'deskripsi' => $request->deskripsi,
        ]);

        if($item){
            return redirect('/admin/program-kerja-bumdesma')->with('success', 'Data program kerja berhasil ditambahkan!');
        } else {
            return redirect('/admin/program-kerja-bumdesma')->with('danger', 'Data program kerja gagal ditambahkan!');
        }
    }

    public function show($id)
    {
        $item = ProgramKerja::find($id);
    }
    
    public function edit($id)
    {
        $item = ProgramKerja::find($id);

        if(Gate::allows('admin')){
            return view('admin.bumdesma.program-kerja.edit', compact('item'));
        }
        
        return view('admin.404');
    }
    
    public function updated(DataLembagaRequest $request, $id)
    {
        $item = ProgramKerja::find($id);
        
        if($request->hasFile('foto')){
            if($item->foto != null){
                Storage::delete($item->foto);
            }
            
            $item->update([
                'foto' => $request->file('foto')->store('BUMDESMA/program-kerja'),
                'deskripsi' => $request->deskripsi,
            ]);
            
        } else {
            $item->update([
                'deskripsi' => $request->deskripsi,
            ]);
        }

        if ($item->wasChanged()) {
            return redirect('/admin/program-kerja-bumdesma')->with('success', 'Data program kerja berhasil diupdate!');
        } else {
            return redirect('/admin/program-kerja-bumdesma')->with('danger', 'Data program kerja gagal diupdate.');
        }
    }
    
    public function destroy($id)
    {
        $this->authorize('admin');

        $item = ProgramKerja::find($id);

        if($item){
            if($item->foto != null){
                Storage::delete($item->foto);
            }

            $item->delete();
            return redirect('admin/program-kerja-bumdesma')->with('success', 'Data program kerja berhasil dihapus!');
            
        } else {
            return redirect('admin/program-kerja-bumdesma')->with('danger', 'Data program kerja gagal dihapus!');
        }

    }
}
