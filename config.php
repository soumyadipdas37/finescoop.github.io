<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://finescoop.com',
    'production' => false,
    'siteName' => 'FineScoop',
    'siteDescription' => 'Breaking news',

    // collections
    'collections' => [
        'posts' => [
            'sort' => '-date',
            'path' => '/articles/{-title}',
        ],
        'categories' => [
            'path' => '/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
    ],
    // helpers
    'allCategories' => function ($page, $posts) {
        return $page->pluck('categories')->flatten()->unique();
    },
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'isActive' => function ($page, $section) {
        return Str::contains($page->getPath(), $section);
    },
];
