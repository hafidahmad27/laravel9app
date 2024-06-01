<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::orderBy('id', 'DESC')->get();

        return view('sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        $imageName = time() . '.' . $request->Paraf->extension();
        $uploadedImage = $request->Paraf->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($sales = Sales::create($params)) {
            $sales->Paraf = $imagePath;
            $sales->save();

            return redirect(route('sales.index'))->with('success', 'Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = Sales::findOrFail($id);

        return view('sales.edit', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        $request->validate([
            'NamaSales' => 'required',
            'Aktif' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        if ($request->hasFile('Paraf')) {
            $image = $request->file('Paraf');
            $image->storeAs('public/images', $image->hashName());

            Storage::delete('public/images/' . $sales->Paraf);
            $sales->update([
                'NamaSales'     => $request->NamaSales,
                'Aktif'         => $request->Aktif,
                'Tanggal_Lahir' => $request->Tanggal_Lahir,
                'Paraf'         => $image->hashName()
            ]);
        } else {
            $sales->update([
                'NamaSales'     => $request->NamaSales,
                'Aktif'         => $request->Aktif,
                'Tanggal_Lahir' => $request->Tanggal_Lahir
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Sales Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);

        Storage::delete('public/images/' . $sales->Paraf);
        $sales->delete();

        return redirect()->route('sales.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
