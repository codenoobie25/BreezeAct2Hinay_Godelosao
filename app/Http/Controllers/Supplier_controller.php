<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class Supplier_controller extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();

        return view('Supplier_view', compact('suppliers'));
    }

    public function create()
    {
        $suppliers = Supplier::latest()->get();

        return view('Supplier_view', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_name' => ['required', 'string', 'max:255'],
            'contact_info' => ['required', 'string', 'max:255'],
            'supplier_address' => ['required', 'string', 'max:255'],
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }

    public function edit(Supplier $supplier)
    {
        $suppliers = Supplier::latest()->get();

        return view('Supplier_view', [
            'suppliers' => $suppliers,
            'editingSupplier' => $supplier,
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'supplier_name' => ['required', 'string', 'max:255'],
            'contact_info' => ['required', 'string', 'max:255'],
            'supplier_address' => ['required', 'string', 'max:255'],
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
