@php $level = $level ?? 0; @endphp

<ul class="list-none my-0">
    @foreach ($items as $label => $item)
        @include('partials.menu-item')
    @endforeach
</ul>
