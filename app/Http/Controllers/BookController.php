<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * @var BookService
     */

    public $bookService;

    /**
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService , AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * @return Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks()) ;
    }

    /**
     * @return Response
     */
    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);

        return $this->successResponse($this->bookService->createBook($request->all(),Response::HTTP_CREATED)) ;

    }

    /**
     * @return Response
     */
    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book)) ;

    }

    /**
     * @return Response
     */
    public function update(Request $request,$book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(),$book)) ;

    }

    /**
     * @return Response
     */
    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book)) ;
    }

}
