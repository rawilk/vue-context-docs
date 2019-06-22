# Props Usage Demo

Further control the behavior of the menu through its props.

---

- [closeOnClick](#close-on-click)
- [closeOnScroll](#close-on-scroll)

<a name="close-on-click"></a>
## Close On Click

> {info} If `closeOnClick` is set to `false`, the context menu will not automatically close when clicked on.
You can toggle this feature on and off in this demo by using the checkbox below.

<div class="old-v-context">
    <close-on-click-v3></close-on-click-v3>
</div>

```html
<template>
    <div class="mt-4">
        <div class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="close-on-click" class="custom-control-input" v-model="closeOnClick">
                <label for="close-on-click" class="custom-control-label">
                    Close on Click
                </label>
            </div>
        </div>

        <table class="table-left border-collapse shadow-none">
            <tbody>
                <tr v-for="(item, index) in items"
                    :key="index"
                    @contextmenu.prevent="$refs.menu.open"
                >
                    <td v-text="item"></td>
                </tr>
            </tbody>
        </table>

        <vue-context ref="menu" :close-on-click="closeOnClick">
            <ul>
                <li>
                    @{{ closeOnClick ? 'I will close on click' : 'I will stay open on click' }}
                </li>
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';

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
```

<a name="close-on-scroll"></a>
## Close On Scroll

> {info} If `closeOnScroll` is set to `true`, the context menu will close automatically when the window
is scrolled. You can toggle this feature on and off in this demo by using the checkbox below.

<div class="old-v-context">
    <close-on-scroll-v3></close-on-scroll-v3>
</div>

```html
<template>
    <div class="mt-4">
        <div class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="close-on-scroll" class="custom-control-input" v-model="closeOnScroll">
                <label for="close-on-scroll" class="custom-control-label">
                    Close on Scroll
                </label>
            </div>
        </div>

        <table class="table-left border-collapse shadow-none">
            <tbody>
                <tr v-for="(item, index) in items"
                    :key="index"
                    @contextmenu.prevent="$refs.menu.open"
                >
                    <td v-text="item"></td>
                </tr>
            </tbody>
        </table>

        <vue-context ref="menu" :close-on-scroll="closeOnScroll">
            <ul>
                <li>
                    @{{ closeOnScroll ? 'I will hide when the window is scrolled' : 'I will stay visible when the window is scrolled' }}
                </li>
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';

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
```