# Basic Usage Demo

Explore the basics of the context menu through this basic usage demo.

---

- [Basic Usage](#basic-usage)

<a name="basic-usage"></a>
## Basic Usage

> {info} Right click on each item to open the context menu.

<basic-usage-v4></basic-usage-v4>

> {info} Try using the up and down arrows as well to navigate the menu.

```html
<template>
    <div>
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

        <vue-context ref="menu">
            <li>
                <a href="#" @click.prevent="onClick($event.target.innerText)">
                    Do something
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="onClick($event.target.innerText)">
                    Do something else
                </a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';

    export default {
        components: { VueContext },

        data () {
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
            onClick (text) {
                alert(`You clicked on: "${text}"`);
            }
        }
    };
</script>
```