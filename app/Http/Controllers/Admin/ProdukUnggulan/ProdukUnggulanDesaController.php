<?php

namespace App\Http\Controllers\Admin\ProdukUnggulan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukUnggulan;
use App\Http\Requests\ProdukUnggulanRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProdukUnggulanDesaController extends Controller
{
    public function index()
    {
        $produk = ProdukUnggulan::where('type', '=', "Desa")->paginate(3);
                                  
        return view('admin.produk-unggulan.desa.index', ['data' => $produk]);
    }

    public function create()
    {

        if (Gate::allows('admin')) {
            return view('admin.produk-unggulan.desa.create');
        }
    
        return view('admin.404');
    }

    public function store(ProdukUnggulanRequest $request)
    {
        $produk = ProdukUnggulan::create([
            'type' => $request->type,
            'foto' => $request->file('foto')->store('produk_unggulan_desa'),
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($produk) {
            return redirect('/admin/produk-unggulan-desa')->with('success','Data produk berhasil ditambahkan!');
        } else {
            return redirect('/admin/produk-unggulan-desa')->with('danger', 'Gagal menambahkan data produk.');
        }
    }

    public function show($id)
    {
        $produk = ProdukUnggulan::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $produk = ProdukUnggulan::find($id);

        if (Gate::allows('admin')) {
            return view('admin.produk-unggulan.desa.edit', compact('produk'));
        }
    
        return view('admin.404');
    }

    public function updated(ProdukUnggulanRequest $request, $id)
    {
        $this->authorize('admin');

        $produk = ProdukUnggulan::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($produk->foto != null) {
                Storage::delete($produk->foto);
            }
            
            $produk->update([
                'foto' => $request->file('foto')->store('produk_unggulan_desa'),
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($produk->wasChanged()) {
            return redirect('/admin/produk-unggulan-desa')->with('success', 'Data peoduk berhasil diupdate!');
        } else {
            return redirect('/admin/produk-unggulan-desa')->with('danger', 'Data peoduk gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $produk = ProdukUnggulan::find($id);

        if($produk) {
            if($produk->foto != null) {
                Storage::delete($produk->foto);
            }

            $produk->delete();
            return redirect('/admin/produk-unggulan-desa')->with('success','Data produk berhasil dihapus!');

        } else {
            return redirect('/admin/produk-unggulan-desa')->with('danger', 'Data produk gagal dihapus!');
        }
    }
}
