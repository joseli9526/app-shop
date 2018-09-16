<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //Listado
    }

    public function create(){
        return view('admin.categories.create'); //Formulario de registro
    }

    public function store(Request $request){
        //Validar
        $this->validate($request,Category::$rules,Category::$messages);

        //Registrar nuevo producto a la base de datos
        //dd($request->all());
        Category::create($request->all());


        return redirect('/admin/categories');
    }

    public function edit(Category $category){

        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category){
        //Validar
        $this->validate($request,Category::$rules,Category::$messages);

        $category->update($request->all());

        return redirect('/admin/categories');
    }

    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
