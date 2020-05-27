<?php

namespace App\Helpers;

class DocPages
{
    protected array $pages;

    protected string $currentUri;

    public function __construct(string $uri)
    {
        $this->currentUri = $uri;
        $this->pages = config('docs.nav');
    }

    public function all(): array
    {
        return $this->pages;
    }

    public function isActive(string $otherUri): bool
    {
        return $otherUri === $this->currentUri;
    }

    public function title(): ?string
    {
        return $this->findTitle($this->pages, $this->currentUri);
    }

    protected function findTitle(array $navigation, ?string $slug): ?string
    {
        foreach ($navigation as $title => $uri) {
            if (is_array($uri)) {
                $childTitle = $this->findTitle($uri, $slug);

                if ($childTitle) {
                    return $childTitle;
                }
            }

            if ($uri === $slug) {
                return $title;
            }
        }

        return null;
    }

    public function next()
    {
        $flattenedArrayOfPages = $this->getFlattenedArrayOfPages();

        $pathsByIndex = $flattenedArrayOfPages->pluck('path');

        $currentIndex = $pathsByIndex->search($this->currentUri);

        $nextIndex = $currentIndex + 1;

        return $flattenedArrayOfPages[$nextIndex] ?? null;
    }

    public function previous()
    {
        $flattenedArrayOfPages = $this->getFlattenedArrayOfPages();

        $pathsByIndex = $flattenedArrayOfPages->pluck('path');

        $currentIndex = $pathsByIndex->search($this->currentUri);

        $previousIndex = $currentIndex - 1;

        return $flattenedArrayOfPages[$previousIndex] ?? null;
    }

    protected function getFlattenedArrayOfPages(): \Illuminate\Support\Collection
    {
        return collect($this->pages)->map(static function ($value, $key) {
            $links = is_array($value) ? $value : [$key => $value];

            return collect($links)->map(fn($path, $label) => ['path' => $path, 'label' => $label]);
        })->flatten(1);
    }
}
