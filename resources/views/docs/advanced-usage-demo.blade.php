* [Demo 1](#demo-1) { .text-blue-800 }
* [Demo 2](#demo-2) { .text-blue-800 }
* [Nested Menus](#nested-menus) { .text-blue-800 }

<a name="demo-1"></a>
## Demo 1

@component('components.tip')
    Right click on each item to see a more customized context menu appear for each item.
@endcomponent

<advanced-1></advanced-1>

<div v-pre>
@component('components.code', ['lang' => 'html'])
@verbatim
<template>
    <div>
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul>
                <li>
                    <a href="#"
                       class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out"
                       :class="{ 'border-t border-gray-200': index > 0 }"
                       v-for="(item, index) in items"
                       :key="index"
                       @contextmenu.prevent="$refs.menu.open($event, { name: item, index })"
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

        <div class="my-4 text-right" v-show="showReset">
            <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150"
                    @click="reset"
            >
                Reset Demo
            </button>
        </div>

        <vue-context ref="menu">
            <template slot-scope="child" v-if="child.data">
                <li>
                    <a @click.prevent="alertName(child.data.name)">
                        Alert name
                    </a>
                </li>
                <li>
                    <a @click.prevent="remove(child.data.index)">
                        Delete "{{ child.data.name }}"
                    </a>
                </li>
            </template>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss';

    const items = [
        'Cras justo odio',
        'Dapibus ac facilisis in',
        'Morbi leo risus',
        'Porta ac consectetur ac',
        'Vestibulum at eros'
    ];

    export default {
        components: { VueContext },

        computed: {
            showReset () {
                return this.items.length < items.length;
            }
        },

        data () {
            return {
                items: [...items]
            };
        },

        methods: {
            alertName (name) {
                alert(`You clicked on "${name}"!`);
            },

            remove (index) {
                this.$delete(this.items, index);
            },

            reset () {
                this.items = [...items];
            }
        }
    };
</script>
@endverbatim
@endcomponent
</div>

<a name="demo-2"></a>
## Demo 2

@component('components.tip')
    Right click on each of the colors to have a context menu appear
    to allow you to add or remove the color from the array of selected colors.
@endcomponent

<advanced-2></advanced-2>

<div v-pre>
@component('components.code', ['lang' => 'html'])
@verbatim
<template>
    <div class="mt-5">
        <div class="flex flex-wrap">
            <div class="color-box"
                 :class="{ selected: hasColor(color.hex) }"
                 v-for="(color, index) in colors"
                 :key="index"
                 :style="{ 'background-color': color.hex }"
                 @contextmenu.prevent="$refs.menu.open($event, color)"
            >
                &nbsp;
            </div>
        </div>

        <h5 class="my-4">
            Selected colors:
        </h5>
        <code class="mb-3">{{ selectedColors }}</code>

        <vue-context ref="menu">
            <template slot-scope="child" v-if="child.data">
                <li>
                    <a href="#" @click.prevent="toggle(child.data)">
                        {{ hasColor(child.data.hex) ? 'Remove Color' : 'Select Color' }}
                    </a>
                </li>
            </template>
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
                colors: [
                    { name: 'red', hex: '#f44336' },
                    { name: 'blue', hex: '#2196F3' },
                    { name: 'cyan', hex: '#00BCD4' },
                    { name: 'green', hex: '#4CAF50' },
                    { name: 'orange', hex: '#FF9800' }
                ],
                selectedColors: []
            };
        },

        methods: {
            colorIndex (hex) {
                return this.selectedColors.findIndex(color => color.hex === hex);
            },

            hasColor (hex) {
                return this.colorIndex(hex) > -1;
            },

            toggle (color) {
                const index = this.colorIndex(color.hex);

                if (index > -1) {
                    this.$delete(this.selectedColors, index);
                } else {
                    this.selectedColors.push(color);
                }
            }
        }
    };
</script>

<style lang="scss" scoped>
    .color-box {
        width: 100px;
        height: 100px;
        margin-right: 10px;
        border-radius: 4px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
        opacity: .6;

        &.selected {
            opacity: 1;
        }

        &:last-child {
            margin-right: 0;
        }
    }
</style>
@endverbatim
@endcomponent
</div>

<a name="nested-menus"></a>
## Nested Menus

<nested-menus></nested-menus>

<div v-pre>
@component('components.code', ['lang' => 'html'])
@verbatim
<template>
    <div>
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

        <vue-context ref="menu">
            <li>
                <a @click.prevent="alertText($event.target.innerText)">Not nested</a>
            </li>
            <li class="v-context__sub">
                <a @click.prevent="alertText($event.target.innerText)">Has sub menu</a>
                <ul class="v-context">
                    <li>
                        <a @click.prevent="alertText($event.target.innerText)">Nested child</a>
                    </li>
                    <li class="v-context__sub">
                        <a @click.prevent="alertText($event.target.innerText)">Another nested menu</a>
                        <ul class="v-context">
                            <li>
                                <a @click.prevent="alertText($event.target.innerText)">Another level deep</a>
                            </li>
                            <li>
                                <a @click.prevent="alertText($event.target.innerText)">There is no limit</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a @click.prevent="alertText($event.target.text)">Also not nested</a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss';

    export default {
        components: { VueContext },

        data() {
            return {
                items: [
                    'Cras justo odio',
                    'Dapibus ac facilisis in',
                    'Morbi leo risus',
                    'Porta ac consectetur ac',
                    'Vestibulum at eros'
                ]
            };
        },

        methods: {
            alertText(text) {
                alert(`You clicked: ${text}`);
            }
        }
    };
</script>
@endverbatim
@endcomponent
</div>


