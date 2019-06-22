# Advanced Usage Demo

See demos of some more advanced usage of the context menu.

---

- [Demo 1](#demo-1)
- [Demo 2](#demo-2)

<a name="demo-1"></a>
## Demo 1

> {info} Right click on each item to see a more customized context menu appear for each item.

<div class="old-v-context">
    <advanced-demo-1-v3></advanced-demo-1-v3>
</div>

```html
<template>
    <div>
        <table class="table-left border-collapse shadow-none">
            <tbody>
                <tr v-for="(item, index) in items"
                    :key="index"
                    @contextmenu.prevent="$refs.menu.open($event, { name: item, index })"
                >
                    <td v-text="item"></td>
                </tr>
            </tbody>
        </table>

        <div class="my-4 text-right" v-show="showReset">
            <button type="button"
                    @click="reset"
                    class="button is-info rounded-full text-base"
            >
                Reset Demo
            </button>
        </div>

        <vue-context ref="menu">
            <ul slot-scope="child" v-if="child.data">
                <li @click="alertName(child.data.name)">Alert name</li>
                <li @click="remove(child.data.index)">Delete "@{{ child.data.name }}"</li>
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';

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
```

<a name="demo-2"></a>
## Demo 2

> {info} Right click on each of the colors to have a context menu appear
to allow you to add or remove the color from the array of selected colors.

<div class="old-v-context">
    <advanced-demo-2-v3></advanced-demo-2-v3>
</div>

<br>

```html
<template>
    <div class="mt-5">
        <div class="flex flex-wrap">
            <div class="color-box"
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
        <code class="d-block mb-3" style="line-height:35px">@{{ selectedColors }}</code>

        <vue-context ref="menu">
            <ul slot-scope="child" v-if="child.data">
                <li @click="toggle(child.data)">
                    @{{ hasColor(child.data.hex) ? 'Remove Color' : 'Select Color' }}
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

        &:last-child {
            margin-right: 0;
        }
    }
</style>
```