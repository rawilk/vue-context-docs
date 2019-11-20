# Installation

Installing `vue-context` is quick and simple. Follow these instructions to have your own context menus in minutes.

---

- [Install](#install)
- [Usage](#usage)

<a name="install"></a>
## Install

Install via npm

```bash
npm i vue-context@3.4.2
```

<a name="usage"></a>
## Usage

Import the component and use it in your app.

```js
import Vue from 'vue';
import { VueContext } from 'vue-context';

new Vue({
    components: {
        VueContext
    },
    
    methods: {
        onClick (text) {
            alert(`You clicked ${text}!`);
        }
    }
}).$mount('#app');
```

<br>
Next add an element to the page that will trigger the context menu to appear, and also add the context menu to the page.

```html
<div id="app">

    <div>
        <p @contextmenu.prevent="$refs.menu.open">
            Right click on me
        </p>    
    </div>
    
    <vue-context ref="menu">
        <ul>
            <li @click="onClick($event.target.innerText)">Option 1</li>
            <li @click="onClick($event.target.innerText)">Option 2</li>
        </ul>
    </vue-context>
    
</div>
```

<br>
`@contextmenu.prevent` is the event listener needed to open the context menu. It is using `.prevent` as a modifier to prevent
the default behavior. In this example, it has a ref of `menu`, which is what `$refs.menu` is referring to. When each item is clicked on, the text of
the item is sent to the `onClick` method on the Vue instance, which is then shown in an alert.