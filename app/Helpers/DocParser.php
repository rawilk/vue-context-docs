<?php

namespace App\Helpers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class DocParser implements Arrayable
{
    protected string $content;

    public function __construct(string $doc)
    {
        $this->content = file_get_contents(resource_path("docs/{$doc}.md"));
    }

    public static function parse(string $doc)
    {
        return new static($doc);
    }

    public function data(): array
    {
        return [
            'html' => $this->html(),
            'title' => $this->title(),
        ];
    }

    public function html(): string
    {
        return Markdown::convertToHtml($this->content);
    }

    public function title(): ?string
    {
        if (Str::startsWith($this->content, '#')) {
            $title = explode("\n", $this->content)[0];

            return trim(str_replace('#', '', $title));
        }

        return null;
    }

    public function toArray(): array
    {
        return $this->data();
    }
}
