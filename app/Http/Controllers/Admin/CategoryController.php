<?php

namespace App\Http\Controllers;

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
        $_categories = resolve(CategoryService::class)->getCategoriesAsList(null, '-- ');
        return view('admin.categories.create', compact('_categories'));
    }

    public function edit(
        AbstractEntity $category
    ) {
        $_categories = resolve(CategoryService::class)->getCategoriesAsList(null, '-- ');
        return view("admin.categories.edit", compact('_categories', 'category'));
    }
}
