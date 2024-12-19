<?php

namespace PYB\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use PYB\Category\Http\Requests\CategoryRequest;
use PYB\Category\Repositories\CategoryRepo;
use PYB\Category\Services\CategoryService;

class CategoryController extends Controller
{
    public CategoryRepo $repo;
    public CategoryService $service;

    public function __construct(CategoryRepo $categoryRepo, CategoryService $categoryService)
    {
        $this->repo = $categoryRepo;
        $this->service = $categoryService;
    }

    public function index()
    {
        $categories = $this->repo->index()->paginate(10);
        return view('Category::index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->repo->index()->get();
        return view('Category::create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->service->store($request);
        return to_route('categories.index') ->with(['success_store' => 'دسته بندی ساخته شد.'])  ;
    }

    public function edit($id)
    {
        $category = $this->repo->findById($id);
        $categories = $this->repo->index()->where('id', '!=', $category->id)->get();
        return view('Category::edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->service->update($request, $id);
        return to_route('categories.index') ->with(['success_update' => 'دسته بندی بروزرسانی شد.'])  ;
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return to_route('categories.index')->with(['success_delete' => 'دسته بندی حذف شد.']);
    }
    public function changeStatus($id)
    {
        $category = $this->repo->findById($id);
        $this->repo->changeStatus($category);

        return back()->with(['success_message' => 'وضعیت دسته بندی با موفقیت تغییر کرد']);
    }
}
