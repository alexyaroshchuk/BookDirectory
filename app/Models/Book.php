<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Intervention\Image\Facades\Image;

class Book extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'photo'
    ];

    /**
     * @return BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_book');
    }

    /**
     * Create book
     *
     * @param $request
     * @return mixed
     */

    public function store($request)
    {
        $filename = null;
        if($request->file() != null){
            foreach ($request->file() as $f) {
                $filename = time() . '.' . $f->getClientOriginalName();
                $location = public_path('../storage/app/public/images/' . $filename);
                Image::make($f)->save($location);
            }
        }

        foreach ($request->file() as $f) {
            $filename = time() . '.' . $f->getClientOriginalName();
            $location = public_path('../storage/app/public/images/' . $filename);
            Image::make($f)->save($location);
        }

        $book = $this->create([
            'title' => $request->title,
            'photo' => $filename
        ]);


        $book->authors()->sync($request->author_id);
        $book->categories()->sync($request->category_id);
        return $book;
    }

    /**
     * Update book
     *
     * @param $book
     * @param $request
     * @return mixed
     */
    public function updateBook($book, $request)
    {
        $filename = $book->photo;
        if($request->file() !== null){
            foreach ($request->file() as $f) {
                $filename = time() . '.' . $f->getClientOriginalName();
                $location = public_path('../storage/app/public/images/' . $filename);
                Image::make($f)->save($location);
            }
        }

        $book->update([
            'title' => $request->title ? $request->title : $book->title,
            'photo' => $filename
        ]);

        $book->authors()->sync($request->author_id);
        $book->categories()->sync($request->category_id);
        return $book;
    }
}
