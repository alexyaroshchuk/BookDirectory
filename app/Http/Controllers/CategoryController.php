<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @param CategoryFormRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CategoryFormRequest $request)
    {
        Category::create([
           'title' => $request->title
        ]);
        return redirect('categories');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        $category = Category::with('books')->find($id);
        return view('category.show', compact('category'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $category = Category::with('books')->find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * @param CategoryFormRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(CategoryFormRequest $request, $id)
    {
        Category::find($id)->update([
            'title' => $request->title
        ]);
        return redirect('categories');
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('categories');
    }
}
