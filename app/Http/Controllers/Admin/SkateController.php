<?php
// app/Http/Controllers/Admin/SkateController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skate;
use Illuminate\Http\Request;

class SkateController extends Controller
{
    public function index()
    {
        $skates = Skate::latest()->paginate(10);
        return view('admin.skates.index', compact('skates'));
    }

    public function create()
    {
        return view('admin.skates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|string|max:10',
            'quantity' => 'required|integer|min:0',
            'price_per_hour' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('skates', 'public');
            $validated['image'] = $path;
        }

        $validated['is_available'] = $request->has('is_available');

        Skate::create($validated);

        return redirect()->route('admin.skates.index')
            ->with('success', 'Коньки успешно добавлены');
    }

    public function edit(Skate $skate)
    {
        return view('admin.skates.edit', compact('skate'));
    }

    public function update(Request $request, Skate $skate)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|string|max:10',
            'quantity' => 'required|integer|min:0',
            'price_per_hour' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('skates', 'public');
            $validated['image'] = $path;
        }

        $validated['is_available'] = $request->has('is_available');

        $skate->update($validated);

        return redirect()->route('admin.skates.index')
            ->with('success', 'Коньки успешно обновлены');
    }

    public function destroy(Skate $skate)
    {
        $skate->delete();

        return redirect()->route('admin.skates.index')
            ->with('success', 'Коньки успешно удалены');
    }
}