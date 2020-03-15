<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $books =  Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('book.create', compact('categories', 'authors'));
    }

    /**
     * @param BookFormRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(BookFormRequest $request)
    {
        $book = new Book();
        $book = $book->store($request);
        return redirect('books');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        $book = Book::with('authors', 'categories')->find($id);
        return view('book.show', compact('book'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $authors = Author::all();
        $categories = Category::all();
        $book = Book::with('authors', 'categories')->find($id);
        $arrayCategoriesId = $this->prepareData($book->categories);
        $arrayAuthorsId = $this->prepareData($book->authors);

        return view('book.edit', compact('book', 'authors', 'categories', 'arrayCategoriesId', 'arrayAuthorsId'));
    }

    /**
     * @param BookFormRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(BookFormRequest $request, $id)
    {
        $book = Book::find($id);
        $book->updateBook($book, $request);
        return redirect('books');
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('books');
    }

    /**
     * @param $objects
     * @return array
     */
    private function prepareData($objects)
    {
        $result = [];
        if(!is_null($objects)){
            foreach ($objects as $object){
                $result[] += $object->id;
            }
        }
        return $result;
    }
}
