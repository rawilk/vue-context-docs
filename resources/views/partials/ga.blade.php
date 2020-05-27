@if (! config('app.debug'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag.js?id={{ config('docs.googleAnalyticsId') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('docs.googleAnalyticsId') }}');
    </script>
@endif
