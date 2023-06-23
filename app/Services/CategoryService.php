<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getCategories(int $parentId = null)
    {
        return Category::query()
            ->select(['id', 'parent_id', 'title'])
            ->where('parent_id', $parentId)
            ->onlyEnabled()
            ->orderBy('sort_order')
            ->get()
            ->map(
                function (Category $category) {
                    return [
                        'category' => $category,
                        'children' => $this->getCategories($category->id),
                    ];
                }
            )
            ->all();
    }

    public function getCategoriesAsList(
        int $parentId = null,
        $prefix = '  ',
        $level = 0
    ) {
        return Category::query()
            ->where('parent_id', $parentId)
            ->orderBy('sort_order')
            ->get()
            ->reduce(
                function ($categories, Category $category) use ($prefix, $level) {
                    return $categories
                        + [$category->id => str_repeat($prefix, $level) . $category->title]
                        + $this->getCategoriesAsList($category->id, $prefix, $level + 1);
                },
                []
            );
    }

    public function listsByParent(
        $parent = null,
        $key = 'id'
    ) {
        $parents = $this->findParents();

        $result = $parents
            ->reduce(function ($carry, $category) use ($key) {
                if ($category->has_children) {
                    $key = $category->title;
                    $carry[$key] = $category
                        ->children()
                        ->pluck('title', 'id')
                        ->all();
                } else {
                    $key = $category->$key;
                    $carry[$key] = $category->title;
                }

                return $carry;
            });

        if (isset($result) && !empty($result)) {
            asort($result);
        }

        return $result;
    }

    public function findParents()
    {
        return Category::query()
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();
    }

    public function findByParent(
        $parent = null,
        $key = 'id'
    ) {
        $parentId = null;
        if (is_null($parent)) {
            $parentId = 0;
        } elseif (is_int($parent)) {
            $parentId = $parent;
        } else {
            $parentId = $parent->id;
        }

        return Category::query()
            ->when($parentId, function ($query, $parentId) {
                $query->where('parent_id', $parentId);
            })
            ->orderBy('sort_order')
            ->get();
    }

    public function lists(
        $key = 'id'
    ) {
        $parents = $this->findParents();

        $result = $parents
            ->reduce(function ($carry, $category) use ($key) {
                $key = $category->$key;
                $carry[$key] = $category->title;

                return $carry;
            });

        if (isset($result) && !empty($result)) {
            asort($result);
        }

        return $result;
    }

    public function getParentCategoriesAsList()
    {
        return Category::query()
            ->whereNull('parent_id')
            ->onlyEnabled()
            ->orderBy('title')
            ->get()
            ->pluck('title', 'id')
            ->all();
    }
}
