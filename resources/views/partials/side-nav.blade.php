<nav class="nav-menu hidden lg:block">
    <ul class="list-none my-0">
        @foreach (config('docs.nav') as $label => $url)
            <li class="pl-4">
                @if (is_string($url))
                    <a href="{{ $url }}"
                       class="lvl0 {{ request()->is(Str::after($url, '/')) ? 'active font-semibold text-blue-600' : '' }} nav-menu__item hover:text-blue-600"
                    >
                        {{ $label }}
                    </a>
                @else
                    <p class="font-bold nav-menu__item text-gray-500 text-xs tracking-wider uppercase pt-2">
                        {{ $label }}
                    </p>
                    <ul class="list-none my-0">
                        @foreach ($url as $childLabel => $childUrl)
                            <li class="pl-4">
                                <a href="{{ $childUrl }}" class="lvl0 {{ request()->is(Str::after($childUrl, '/')) ? 'active font-semibold text-blue-600' : '' }} nav-menu__item hover:text-blue-600">
                                    {{ $childLabel }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
