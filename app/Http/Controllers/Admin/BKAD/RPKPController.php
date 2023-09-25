<?php

namespace App\Http\Controllers\Admin\BKAD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RpkpBKAD;
use App\Http\Requests\RPKPRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RPKPController extends Controller
{
    public function index()
    {
        $item = RpkpBKAD::all();

        return view('admin.bkad.rpkp.index', ['data' => $item]);
    }

    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.bkad.rpkp.create');
        }

        return view('admin.404');
    }

    public function store(RPKPRequest $request)
    {
        $item = RpkpBKAD::create([
            'foto' => $request->file('foto')->store('BKAD/rpkp'),
            'deskripsi' => $request->deskripsi,
        ]);

        if($item){
            return redirect('/admin/rpkp-bkad')->with('success', 'Data RPKP berhasil ditambahkan!');
        } else {
            return redirect('/admin/rpkp-bkad')->with('danger', 'Data RPKP gagal ditambahkan!');
        }
    }

    public function show($id)
    {
        $item = RpkpBKAD::find($id);
    }
    
    public function edit($id)
    {
        $item = RpkpBKAD::find($id);

        if(Gate::allows('admin')){
            return view('admin.bkad.rpkp.edit', compact('item'));
        }
        
        return view('admin.404');
    }
    
    public function updated(RPKPRequest $request, $id)
    {
        $item = RpkpBKAD::find($id);
        
        if($request->hasFile('foto')){
            if($item->foto != null){
                Storage::delete($item->foto);
            }
            
            $item->update([
                'foto' => $request->file('foto')->store('BKAD/rpkp'),
                'deskripsi' => $request->deskripsi,
            ]);
            
        } else {
            $item->update([
                'deskripsi' => $request->deskripsi,
            ]);
        }

        if ($item->wasChanged()) {
            return redirect('/admin/rpkp-bkad')->with('success', 'Data RPKP berhasil diupdate!');
        } else {
            return redirect('/admin/rpkp-bkad')->with('danger', 'Data RPKP gagal diupdate.');
        }
    }
    
    public function destroy($id)
    {
        $this->authorize('admin');

        $item = RpkpBKAD::find($id);

        if($item){
            if($item->foto != null){
                Storage::delete($item->foto);
            }

            $item->delete();
            return redirect('admin/rpkp-bkad')->with('success', 'Data RPKP berhasil dihapus!');
            
        } else {
            return redirect('admin/rpkp-bkad')->with('danger', 'Data RPKP gagal dihapus!');
        }

    }
}
