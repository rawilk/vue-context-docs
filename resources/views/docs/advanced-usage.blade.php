Explore more advanced topics of using the menu such as passing custom data to the menu or listening to
events emitted by the menu.

* [Scoped Slot](#scoped-slot) { .text-blue-800 }
* [Props Usage](#props-usage) { .text-blue-800 }
* [Event Usage](#event-usage) { .text-blue-800 }
* [Left Click](#left-click) { .text-blue-800 }
* [Nested Menus](#nested-menus) { .text-blue-800 }

<a name="scoped-slot"></a>
## Scoped Slot

To pass any data from the `contextmenu` event to your template, you can pass it as the second parameter of the `open` event
and access it within a [scoped slot](https://vuejs.org/v2/guide/components.html#Scoped-Slots) under the `data` property.
`$event` must be passed as the first parameter, otherwise the context menu will not function properly.

@component('components.code', ['lang' => 'html'])
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open($event, { foo: 'bar' })">
            Right click on me
        </p>

        <vue-context ref="menu">
            <template slot-scope="child">
                <li>
                    <a @click.prevent="onClick($event.target.innerText, child.data)">
                        Option 1
                    </a>
                </li>
                <li>
                    <a @click.prevent="onClick($event.target.innerText, child.data)">
                        Option 2
                    </a>
                </li>
            </template>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss'; // Alternatively import into a stylesheet instead

    export default {
        components: { VueContext },

        methods: {
            onClick (text, data) {
                alert(`You clicked "${text}"!`);
                console.log(data);
                // => { foo: 'bar' }
            }
        }
    };
</script>
@endcomponent

<a name="props-usage"></a>
## Props Usage

There are six props available on the context menu:

- `closeOnClick`
- `closeOnScroll`
- `lazy`
- `itemSelector`
- `role`
- `tag`

All props are optional. It is not recommended to use anything other than `ul` as a value
for the `tag` prop. If you use anything else, be sure update the the `itemSelector` prop
accordingly to ensure proper keyboard navigation can be used and the accessibility attributes
can be added to each menu item.

@component('components.code', ['lang' => 'html'])
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open($event)">
            Right click on me
        </p>

        <vue-context ref="menu"
                     :close-on-click="closeOnClick"
                     :close-on-scroll="closeOnScroll"
                     :lazy="lazy"
                     :role="role"
                     :tag="tag"
                     :item-selector="itemSelector"
        >
            <li>
                <a class="custom-item-class">Option 1</a>
            </li>
            <li>
                <a class="custom-item-class">Option 2</a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss'; // Alternatively import into a stylesheet instead

    export default {
        components: { VueContext },

        data () {
            return {
                // when set to true, the context  menu will close when clicked on
                closeOnClick: true,

                // when set to true, the context  menu will close when the window is scrolled
                closeOnScroll: true,

                // When false, the context menu is shown via v-show and will always be present in the DOM
                lazy: false,

                // The `role` attribute on the menu. Recommended to stay as `menu`
                role: 'menu',

                // The root html tag of the menu. Recommended to stay as `ul`
                tag: 'ul',

                // This is how the component is able to find each menu item. Useful if you use non-recommended markup
                itemSelector: ['.custom-item-class']
            };
        }
    };
</script>
@endcomponent

<a name="event-usage"></a>
## Event Usage

There are two events emitted by the context menu:

- `close`
- `open`

The `close` event receives no parameters and is emitted when the the context menu is closed.

The `open` event is emitted with the context menu is shown and receives the following parameters:
- `event`: The event that triggered the menu opening
- `data`: Any data passed to the menu from the trigger element
- `top`: The top (y) position of the menu
- `left`: The left (x) position of the menu

@component('components.code')
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open($event, { foo: 'bar' })">
            Right click on me
        </p>

        <vue-context ref="menu" @close="onClose" @open="onOpen">
            <li>
                <a>Option 1</a>
            </li>
            <li>
                <a>Option 2</a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss'; // Alternatively import into a stylesheet instead

    export default {
        components: { VueContext },

        methods: {
            onClose () {
                console.log('The context menu was closed');
            },

            onOpen (event, data, top, left) {
                console.log('The context menu was opened');
                console.log(event, data, top, left);
            }
        }
    };
</script>
@endcomponent

<a name="left-click"></a>
## Left Click

If you want to use a `left` click to open the menu instead, just replace `@contextmenu.prevent` with `@click.prevent`.
If you have issues with the menu closing right after you click on your target element, you just need to append the `stop`
modifier onto the click Event. See [issue #14](https://github.com/rawilk/vue-context/issues/14) for more information.

@component('components.code', ['lang' => 'html'])
<template>
    <div>
        <p @click.prevent="$refs.menu.open($event)">
            Right click on me
        </p>

        <vue-context ref="menu">
            <li>
                <a>Option 1</a>
            </li>
            <li>
                <a>Option 2</a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss'; // Alternatively import into a stylesheet instead

    export default {
        components: { VueContext }
    };
</script>
@endcomponent

<a name="nested-menus"></a>
## Nested Menus

Nested context menus are possible by adding the class `v-context__sub` to a child `<li>` element in the menu.
Inside the `v-context__sub` element a new container (e.g. a `<ul>` element) with the class `v-context` must be
created. The nested `v-context` container will be opened and positioned after the `v-context__sub` element
is hovered or the menu element is expanded by keyboard right click.

There is no limit on how far you can nest the menus, the only requirement is you use the proper classes on
each nested menu.

@component('components.code', ['lang' => 'html'])
<template>
    <div>
        <p @click.prevent="$refs.menu.open($event)">
            Right click on me
        </p>

        <vue-context ref="menu">
            <li>
                <a>Not nested</a>
            </li>
            <li class="v-context__sub">
                <a>Has nested menu</a>
                <ul class="v-context">
                    <li>
                        <a>Nested menu item</a>
                    </li>
                </ul>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss'; // Alternatively import into a stylesheet instead

    export default {
        components: { VueContext }
    };
</script>
@endcomponent
