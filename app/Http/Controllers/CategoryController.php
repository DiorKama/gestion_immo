<?php

namespace App\Http\Controllers;

use App\Models\AbstractEntity;
use App\Models\Category;
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
        $parents = Category::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('parents'));
    }

    public function edit(
        AbstractEntity $category
    ) {
        $parents = Category::whereNull('parent_id')->get();
        return view("admin.categories.edit", compact('parents', 'category'));
    }
}
