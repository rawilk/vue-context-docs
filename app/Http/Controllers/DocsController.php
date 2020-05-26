<?php

namespace App\Http\Controllers;

use App\Helpers\DocParser;

class DocsController
{
    public function __invoke($doc)
    {
        abort_unless($this->docExists($doc), 404);

        return view('doc', DocParser::parse($doc));
    }

    protected function docExists($doc): bool
    {
        return file_exists($this->docPath($doc));
    }

    protected function docPath($doc): string
    {
        return resource_path("docs/{$doc}.md");
    }
}
