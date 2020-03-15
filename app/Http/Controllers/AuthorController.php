<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorFormRequest;
use App\Models\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AuthorController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * @param AuthorFormRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(AuthorFormRequest $request)
    {
        Author::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);
        return redirect('authors');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        $author =  Author::with('books')->find($id);
        return view('author.show', compact('author'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $author = Author::with('books')->find($id);
        return view('author.edit', compact('author'));
    }

    /**
     * @param AuthorFormRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(AuthorFormRequest $request, $id)
    {
        Author::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);
        return redirect('authors');
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect('authors');
    }
}
