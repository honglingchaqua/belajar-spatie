<?php  

namespace App\Http\Controllers;  

use App\Models\OrderItem;  
use App\Models\Divisi;  
use App\Models\Produk;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Validator;  

class OrderItemController extends Controller  
{  
    public function index()  
    {  
        $barangMasuk = OrderItem::with('produk', 'produk.divisi')  
            ->latest()  
            ->paginate(10);  
        
        $divisis = Divisi::all();  

        return view('barang_masuk', [  
            'barangMasuk' => $barangMasuk,  
            'divisis' => $divisis  
        ]);  
    }  

    public function create()  
    {  
        $divisis = Divisi::all();  
        $produks = Produk::all();  

        return view('barang_masuk_create', [  
            'divisis' => $divisis,  
            'produks' => $produks  
        ]);  
    }  

    public function store(Request $request)  
    {  
        $validator = Validator::make($request->all(), [  
            'nama_lengkap' => 'required|string|max:255',  
            'divisi' => 'required|exists:divisis,nama_divisi',  
            'produk_id' => 'required|exists:produks,id',  
            'quantity' => 'required|integer|min:1'  
        ]);  

        if ($validator->fails()) {  
            return redirect()  
                ->back()  
                ->withErrors($validator)  
                ->withInput();  
        }  

        OrderItem::create([  
            'nama_lengkap' => $request->nama_lengkap,  
            'divisi' => $request->divisi,  
            'produk_id' => $request->produk_id,  
            'quantity' => $request->quantity  
        ]);  

        return redirect()  
            ->route('barang-masuk.index')  
            ->with('success', 'Barang masuk berhasil ditambahkan');  
    }  

    public function edit($id)  
    {  
        $barangMasuk = OrderItem::findOrFail($id);  
        $divisis = Divisi::all();  
        $produks = Produk::all();  

        return view('barang_masuk_edit', [  
            'barangMasuk' => $barangMasuk,  
            'divisis' => $divisis,  
            'produks' => $produks  
        ]);  
    }  

    public function update(Request $request, $id)  
    {  
        $validator = Validator::make($request->all(), [  
            'nama_lengkap' => 'required|string|max:255',  
            'divisi' => 'required|exists:divisis,nama_divisi',  
            'produk_id' => 'required|exists:produks,id',  
            'quantity' => 'required|integer|min:1'  
        ]);  

        if ($validator->fails()) {  
            return redirect()  
                ->back()  
                ->withErrors($validator)  
                ->withInput();  
        }  

        $barangMasuk = OrderItem::findOrFail($id);  
        $barangMasuk->update([  
            'nama_lengkap' => $request->nama_lengkap,  
            'divisi' => $request->divisi,  
            'produk_id' => $request->produk_id,  
            'quantity' => $request->quantity  
        ]);  

        return redirect()  
            ->route('barang-masuk.index')  
            ->with('success', 'Barang masuk berhasil diupdate');  
    }  

    public function destroy($id)  
    {  
        $barangMasuk = OrderItem::findOrFail($id);  
        $barangMasuk->delete();  

        return redirect()  
            ->route('barang-masuk.index')  
            ->with('success', 'Barang masuk berhasil dihapus');  
    }  
}