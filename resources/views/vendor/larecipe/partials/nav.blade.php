<div class="fixed pin-t pin-x z-40">
    <div class="bg-gradient-primary text-white h-1"></div>
    
    <nav class="flex items-center justify-between text-black bg-navbar shadow-xs h-16">
        <div class="flex items-center flex-no-shrink">
            <a href="{{ url(config('larecipe.docs.route') . '/' . $currentVersion . '/overview') }}" class="flex items-center flex-no-shrink text-black mx-4">
                @include("larecipe::partials.logo")

                <p class="inline-block font-semibold ml-1 text-grey-dark">
                    {{ config('app.name') }}
                </p>
            </a>
            
            <div class="switch">
                <input type="checkbox" name="1" id="1" v-model="sidebar" class="switch-checkbox" />
                <label class="switch-label" for="1"></label>
            </div>
        </div>

        <div class="block mx-4 flex items-center">
            @if(config('larecipe.search.enabled'))
                <larecipe-button id="search-button"
                    :type="searchBox ? 'primary' : 'link'"
                    @click="searchBox = ! searchBox"
                    class="px-4">
                    <i class="fa fa-search"></i>
                </larecipe-button>
            @endif

            <larecipe-button tag="a" href="https://github.com/rawilk/vue-context" target="_blank" type="black" class="mx-2 px-4">
                <i class="fa fa-github"></i>
            </larecipe-button>

            {{-- versions dropdown --}}
            <larecipe-dropdown>
                <larecipe-button type="primary" class="flex">
                    {{ $currentVersion }} <i class="ml-1 fa fa-angle-down"></i>
                </larecipe-button>

                <template slot="list">
                    <ul class="list-reset">
                        @foreach ($versions as $version)
                            <li class="py-2 hover:bg-grey-lightest">
                                <a class="px-6 text-grey-darkest" href="{{ url(config('larecipe.docs.route') . '/' . $version . $currentSection) }}">{{ $version }}</a>
                            </li>
                        @endforeach
                    </ul>
                </template>
            </larecipe-dropdown>
            {{-- /versions dropdown --}}
        </div>
    </nav>
</div>