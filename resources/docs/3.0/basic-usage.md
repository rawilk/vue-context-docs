# Basic Usage

Using the menu requires very little setup as shown below.

---

To use the context menu, you need to import it into your component and then create a trigger element to open
the context menu on.

```html
<template>
    <div>
        <p @contextmenu.prevent="$refs.menu.open">
            Right click on me
        </p>    
        
        <vue-context ref="menu">
            <ul>
                <li @click="onClick($event.target.innerText)">Option 1</li>
                <li @click="onClick($event.target.innerText)">Option 2</li>
            </ul>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';
    
    export default {
        components: { VueContext },
        
        methods: {
            onClick (text) {
                alert(`You clicked "${text}"!`);
            }
        }        
    };
</script>
```