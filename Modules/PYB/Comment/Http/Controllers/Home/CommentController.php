<?php

namespace PYB\Comment\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use PYB\Comment\Http\Requests\CommentRequest;
use PYB\Comment\Services\CommentService;
use PYB\Share\Repositories\ShareRepo;

class CommentController extends Controller
{
    public function store(CommentRequest $request, CommentService $commentService)
    {
        $commentService->store($request);

        ShareRepo::successMessage('نظر شما پس از تایید در سایت نمایش داده میشود');
        return back();
    }
}
