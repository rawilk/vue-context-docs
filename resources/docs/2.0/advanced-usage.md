# Advanced Usage

Explore more advanced topics of using the menu such as passing custom data to the menu or listening to
events emitted by the menu.

---

- [Scoped Slot](#scoped-slot)
- [Left Click](#left-click)

<a name="scoped-slot"></a>
## Scoped Slot

To pass any data from the `contextmenu` event to your template, you can pass it as the second parameter of the `open` event
and access it within a [scoped slot](https://vuejs.org/v2/guide/components.html#Scoped-Slots) under the `userData` property.
`$event` must be passed as the first parameter, otherwise the context menu will not function properly.

```html
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open($event, { foo: 'bar' }">
            Right click on me
        </p>
        
        <v-context ref="menu">
            <ul slot-scope="child">
                <li @click="onClick($event.target.innerText, child.userData)">Option 1</li>
                <li @click="onClick($event.target.innerText, child.userData)">Option 2</li>            
            </ul>
        </v-context>
    </div>
</template>

<script>
    import vContext from 'vue-context';
    
    export default {
        components: { vContext },
        
        methods: {
            onClick (text, userData) {
                alert(`You clicked "${text}"!`);
                console.log(userData);
                // => { foo: 'bar' }
            }
        }        
    };
</script>
```

<a name="left-click"></a>
## Left Click

If you want to use a `left` click to open the menu instead, just replace `@contextmenu.prevent` with `@click.prevent`.
If you have issues with the menu closing right after you click on your target element, you just need to append the `stop`
modifier onto the click Event. See [issue #14](https://github.com/rawilk/vue-context/issues/14) for more information.

```html
<template>
    <div>
        <p @click.prevent="$refs.menu.open($event)">
            Right click on me
        </p>
        
        <v-context ref="menu">
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
            </ul>
        </v-context>
    </div>
</template>

<script>
    import vContext from 'vue-context';
    
    export default {
        components: { vContext }
    };
</script>
```