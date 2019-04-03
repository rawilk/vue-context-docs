# Advanced Usage

Explore more advanced topics of using the menu such as passing custom data to the menu or listening to
events emitted by the menu.

---

- [Scoped Slot](#scoped-slot)
- [Props Usage](#props-usage)
- [Event Usage](#event-usage)
- [Left Click](#left-click)

<a name="scoped-slot"></a>
## Scoped Slot

To pass any data from the `contextmenu` event to your template, you can pass it as the second parameter of the `open` event
and access it within a [scoped slot](https://vuejs.org/v2/guide/components.html#Scoped-Slots) under the `data` property.
`$event` must be passed as the first parameter, otherwise the context menu will not function properly.

```html
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open($event, { foo: 'bar' }">
            Right click on me
        </p>
        
        <vue-context ref="menu">
            <ul slot-scope="child">
                <li @click="onClick($event.target.innerText, child.data)">Option 1</li>
                <li @click="onClick($event.target.innerText, child.data)">Option 2</li>            
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';
    
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
```

<a name="props-usage"></a>
## Props Usage

There are two props available on the context menu:
- closeOnClick
- closeOnScroll

Both props are optional and when used control when the context menu is allowed to close. 

```html
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open($event)">
            Right click on me
        </p>
        
        <vue-context ref="menu" :close-on-click="closeOnClick" :close-on-scroll="closeOnScroll">
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
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
                // when set to true, the context  menu will close when clicked on
                closeOnClick: true,
                
                // when set to true, the context  menu will close when the window is scrolled
                closeOnScroll: true
            };
        }
    };
</script>
```

<a name="event-usage"></a>
## Event Usage

There are two events emitted by the context menu:
- close
- open

The `close` event receives no parameters and is emitted when the the context menu is closed. 

The `open` event is emitted with the context menu is shown and receives the following parameters:
- `event`: The event that triggered the menu opening
- `data`: Any data passed to the menu from the trigger element
- `top`: The top (y) position of the menu
- `left`: The left (x) position of the menu

```html
<template>
    <div>
        <p @click.prevent="$refs.menu.open($event, { foo: 'bar' })">
            Right click on me
        </p>
        
        <vue-context ref="menu" @close="onClose" @open="onOpen">
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';
    
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
        
        <vue-context ref="menu">
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';
    
    export default {
        components: { VueContext }
    };
</script>
```