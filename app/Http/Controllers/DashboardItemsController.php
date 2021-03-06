<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.pages.items.index', [
            'title' => 'list lodging',
            'items' => Item::paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Item::with(['category', 'activity'])->get());
        return view('dashboardAdmin.pages.items.create', [
            'title' => 'add lodging',
            'items' => Item::with(['category'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'price' => 'required|integer',
            'category_id' => 'required',
            // 'activity_id' => 'required',
            'description' => 'required'

        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Item::create($validatedData);
        return redirect()->route('list-item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::with(['gallery'])->find($id);
        // dd($item);
        return view('dashboardAdmin.pages.items.detailsComponent', [
            'title' => $item->name,
            'items' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Item::findOrFail($id);
        return view('dashboardAdmin.pages.items.update', [
            'title' => 'Ubah Items',
            'item' => $data,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'price' => 'required|integer',
            'category_id' => 'required',
            // 'activity_id' => 'required',
            'description' => 'required'
        ]);
        //
        $item->where('id', $item->id)
            ->update($validatedData);
        // $airplane->findOrFail($id);
        return redirect()->route('list-item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();
        return redirect()->route('list-item.index');
    }
}
