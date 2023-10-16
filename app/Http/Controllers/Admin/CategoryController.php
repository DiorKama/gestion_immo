<?php

namespace App\Http\Controllers\Admin;

use App\Models\AbstractEntity;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends AbstractAdminController
{
    /**
     * @param Category $category
     */
    public function __construct(
        Category $category
    ) {
        parent::__construct($category);
        $this->middleware('auth');
    }

    public function create()
    {
        $_categoriesList = resolve(CategoryService::class)->getCategoriesAsList(null, '-- ');
        return view('admin.categories.create', compact('_categoriesList'));
    }

    public function edit(
        AbstractEntity $category
    ) {
        $_categoriesList = resolve(CategoryService::class)->getCategoriesAsList(null, '-- ');
        return view("admin.categories.edit", compact('_categoriesList', 'category'));
    }

    public function autocomplete(
        Request $request,
        CategoryService $searchService
    ) {
        return $searchService
            ->autocomplete(
                $request->get('q')
            );
    }
}
