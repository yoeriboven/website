<?php

namespace App\Services;

use Statamic\Entries\EntryCollection;
use Statamic\Extensions\Pagination\LengthAwarePaginator;
use Statamic\Facades\Entry;
use Statamic\Facades\Form;

class Statamic
{
    public function getArticleBySlug(string $slug): ?\Statamic\Entries\Entry
    {
        return Entry::query()
            ->select(['id', 'published', 'title', 'slug', 'content', 'meta_description', 'publish_date', 'last_modified'])
            ->where('slug', $slug)
            ->first();
    }

    public function getLatestArticles(int $take = 10): LengthAwarePaginator
    {
        return Entry::query()
            ->select(['id', 'title', 'slug', 'excerpt', 'publish_date'])
            ->where('collection', 'articles')
            ->when(! auth()->user(), function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('publish_date', 'desc')
            ->paginate($take);
    }

    public function getAllProjects(): EntryCollection
    {
        return Entry::query()
            ->select(['id', 'title', 'content', 'repo', 'link'])
            ->where('collection', 'projects')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function storeContactSubmission(array $data): void
    {
        $form = Form::all()->first();

        $submission = $form->makeSubmission();

        $submission->data($data);

        $submission->save();
    }
}
