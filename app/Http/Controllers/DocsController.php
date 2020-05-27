<?php

namespace App\Http\Controllers;

use App\Helpers\DocPages;
use Illuminate\Support\Facades\View;
use Michelf\MarkdownExtra;

class DocsController
{
    public function __invoke($doc)
    {
        abort_unless($this->docExists($doc), 404);

        $pages = new DocPages($doc);
        $content = MarkdownExtra::defaultTransform(
            View::file($this->docPath($doc))->render()
        );

        return view('docs', [
            'title' => $pages->title(),
            'slug' => $doc,
            'pages' => $pages,
            'content' => $content,
        ]);
    }

    protected function docExists($doc): bool
    {
        return file_exists($this->docPath($doc));
    }

    protected function docPath($doc): string
    {
        return resource_path("views/docs/{$doc}.blade.php");
    }
}
