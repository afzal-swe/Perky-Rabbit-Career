<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //-- Query Builder --//
        // $category=DB::table('categories')->get();

        //-- Eleoquent ORM --//
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|unique:categories|max:255',

        ]);

        //-- Save Method ORM --//
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->category_slug = Str::of($request->category_name)->slug('-');
        // $category->save();

        //-- insert Method ORM --//
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //-- Query Builder --//
        $category = DB::table('categories')->where('id', $id)->first();

        // $category = Category::find($id);
        return view('admin.category.update', compact('category'));
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
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',

        ]);

        $data = array(
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        );

        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
