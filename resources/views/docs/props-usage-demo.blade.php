Further control the behavior of the menu through its props.

* [closeOnClick](#close-on-click) { .text-blue-800 }
* [closeOnScroll](#close-on-scroll) { .text-blue-800 }

<a name="close-on-click"></a>
## Close On Click

@component('components.tip')
<code>closeOnClick</code> is set to <code>false</code>, the context menu will not automatically close when clicked on.
You can toggle this feature on and off in this demo by using the checkbox below.
@endcomponent

<close-on-click></close-on-click>

<div v-pre>
@component('components.code', ['lang' => 'html'])
@verbatim
<template>
    <div class="mt-4">
        <div class="mb-4">
            <div class="flex items-center">
                <input id="toggle-close"
                       type="checkbox"
                       class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                       v-model="closeOnClick"
                >
                <label for="toggle-close" class="ml-2 block text-sm leading-5 text-gray-900">
                    Close on Click
                </label>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul>
                <li>
                    <a href="#"
                       class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out"
                       :class="{ 'border-t border-gray-200': index > 0 }"
                       v-for="(item, index) in items"
                       :key="index"
                       @contextmenu.prevent="$refs.menu.open"
                    >
                        <div class="flex items-center px-4 py-4 sm:px-6"
                             :class="{ 'pt-0': index === 0, 'pb-0': index + 1 === items.length }"
                        >
                            <div class="min-w-0 flex-1 md:grid md:grid-cols-2 md:gap-4">
                                <div class="text-sm leading-5 font-medium text-gray-600 truncate" v-text="item"></div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <vue-context ref="menu" :close-on-click="closeOnClick">
            <li>
                <a>
                    {{ closeOnClick ? 'I will close on click' : 'I will stay open on click' }}
                </a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss';

    export default {
        components: { VueContext },

        data () {
            return {
                closeOnClick: false,
                items: [
                    'Cras justo odio',
                    'Dapibus ac facilisis in',
                    'Morbi leo risus',
                    'Porta ac consectetur ac',
                    'Vestibulum at eros'
                ]
            };
        }
    };
</script>
@endverbatim
@endcomponent
</div>

<a name="close-on-scroll"></a>
## Close On Scroll

@component('components.tip', ['lang' => 'html'])
If <code>closeOnScroll</code> is set to <code>true</code>, the context menu will close automatically when the window
is scrolled. You can toggle this feature on and off in this demo by using the checkbox below.
@endcomponent

<close-on-scroll></close-on-scroll>

<div v-pre>
@component('components.code', ['lang' => 'html'])
@verbatim
<template>
    <div class="mt-4">
        <div class="mb-4">
            <div class="flex items-center">
                <input id="toggle-scroll"
                       type="checkbox"
                       class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                       v-model="closeOnScroll"
                >
                <label for="toggle-scroll" class="ml-2 block text-sm leading-5 text-gray-900">
                    Close on Scroll
                </label>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul>
                <li>
                    <a href="#"
                       class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out"
                       :class="{ 'border-t border-gray-200': index > 0 }"
                       v-for="(item, index) in items"
                       :key="index"
                       @contextmenu.prevent="$refs.menu.open"
                    >
                        <div class="flex items-center px-4 py-4 sm:px-6"
                             :class="{ 'pt-0': index === 0, 'pb-0': index + 1 === items.length }"
                        >
                            <div class="min-w-0 flex-1 md:grid md:grid-cols-2 md:gap-4">
                                <div class="text-sm leading-5 font-medium text-gray-600 truncate" v-text="item"></div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <vue-context ref="menu" :close-on-scroll="closeOnScroll">
            <li>
                <a>
                    {{ closeOnScroll ? 'I will hide when the window is scrolled' : 'I will stay visible when the window is scrolled' }}
                </a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss';

    export default {
        components: { VueContext },

        data () {
            return {
                closeOnScroll: true,
                items: [
                    'Cras justo odio',
                    'Dapibus ac facilisis in',
                    'Morbi leo risus',
                    'Porta ac consectetur ac',
                    'Vestibulum at eros'
                ]
            };
        }
    };
</script>
@endverbatim
@endcomponent
</div>
