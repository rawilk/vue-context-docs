<meta name="description" content="{{ $description ?? config('docs.meta.description') }}">

<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ $title ? strip_tags($title) . ' | ' : '' }}{{ config('app.name') }}">
<meta property="og:description" content="{{ $description ?? config('docs.meta.description') }}">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:type" content="{{ config('docs.meta.og:type') }}">

<meta name="twitter:card" content="summary">
