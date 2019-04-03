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
        
        <v-context ref="menu">
            <ul>
                <li @click="onClick($event.target.innerText)">Option 1</li>
                <li @click="onClick($event.target.innerText)">Option 2</li>
            </ul>
        </v-context>
    </div>
</template>

<script>
    import vContext from 'vue-context';
    
    export default {
        components: { vContext },
        
        methods: {
            onClick (text) {
                alert(`You clicked "${text}"!`);
            }
        }        
    };
</script>
```