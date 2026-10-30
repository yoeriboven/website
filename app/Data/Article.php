<?php

namespace App\Data;

use Illuminate\Support\Carbon;

class Article
{
    public function __construct(
        public string $title,
        public string $meta_description,
        public string $slug,
        public Carbon $publish_date,
        public string $content,
    )
    {
    }
}
