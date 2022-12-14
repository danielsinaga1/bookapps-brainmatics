<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        abort_if(Gate::denies('create-category'), 403, 'Anda tidak memiliki hak akses!');

        $data = [
            'categories' => Category::latest()->paginate(10)

        ];

        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {


        try {
            $category = new Category();
            $category->name = $request->name;
            return redirect()->route('category.index')->with('message-success', 'Category created successfully');
            $category->save();
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('message-fail', 'Category create Fail message ' . $e->getMessage());
        }
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
    public function edit(Category $category)
    {
        abort_if(Gate::denies('edit-category'), 403, 'Anda tidak memiliki hak akses!');
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {

        try {
            $category->name = $request->name;


            return redirect()->route('category.index')->with('message-success', 'Category update successfully');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('message-fail', 'Category update failure. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        abort_if(Gate::denies('delete-category'), 403, 'Anda tidak memiliki hak akses!');
        try {
            $category->delete();
            return redirect()
                ->route('category.index')
                ->with('message-success', 'Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()
                ->route('category.index')
                ->with('message-fail', 'Category delete failure. ' . $e->getMessage());
        }
    }
}
