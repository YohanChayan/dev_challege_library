<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^([^0-9]*)$/',  //No Numbers
            'description' => 'required',
        ]);

        $newCategory = new Category( $request->except('_token') );
        $newCategory->save();

        Alert::toast('Nueva categoria agregada correctamente!', 'success');
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if(isset($category))
            return view('categories.create-edit')->with('category', $category);
        else{
            Alert::toast('Recurso no encontrado!', 'error');
            return redirect()->back();
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^([^0-9]*)$/', //No Numbers
            'description' => 'required',
        ]);

        $category = Category::find($id);

        if(isset($category)){

            $category->fill($request->except('_token') );
            $category->save();
            Alert::toast('Categoria actualizada correctamente!', 'success');

        }else
            Alert::toast('Recurso no encontrado!', 'error');
        
        return redirect('categories');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id)){
            $caregory = Category::find($id);
            $caregory->delete();
            Alert::toast('Categoria eliminada correctamente!', 'success');

        }else
            Alert::toast('Recurso no encontrado!', 'error');

        return redirect('categories');
            
    }
}
