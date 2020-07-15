<?php

namespace App\Http\Controllers;

use App\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;

    /**
     * @var AuthorService
     */
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * @return Response
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors()) ;
    }

    /**
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthor($request->all(),Response::HTTP_CREATED)) ;

    }

    /**
     * @return Response
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author)) ;

    }

    /**
     * @return Response
     */
    public function update(Request $request,$author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(),$author)) ;

    }

    /**
     * @return Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author)) ;
    }


}
