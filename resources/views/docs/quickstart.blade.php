Installing `vue-context` is quick and simple. Follow these instructions to have your own context menus in minutes.

* [Install](#install) { .text-blue-800 }
* [Usage](#usage) { .text-blue-800 }

<a name="install"></a>
## Install

Install via npm

@component('components.code', ['lang' => 'bash'])
npm i vue-context
@endcomponent

<a name="usage"></a>
## Usage

Import the component and use it in your app.

@component('components.code', ['lang' => 'js'])
import Vue from 'vue';
import VueContext from 'vue-context';

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
@endcomponent

For styling, you will need to import the component's styles into your own stylesheets, or into your javascript.
It's recommended to import into a stylesheet, however. If you're using sass, you can do the following:

@component('components.code', ['lang' => 'sass'])
@import '~vue-context/src/sass/vue-context';

// Or
// @import '~vue-context/dist/css/vue-context.css';
@endcomponent

Next add an element to the page that will trigger the context menu to appear, and also add the context menu to the page.

@component('components.code')
<div id="app">

    <div>
        <p @contextmenu.prevent="$refs.menu.open">
            Right click on me
        </p>
    </div>

    <vue-context ref="menu">
        <li>
            <a @click.prevent="onClick($event.target.innerText)">Option 1</a>
        </li>
        <li>
            <a @click.prevent="onClick($event.target.innerText)">Option 2</a>
        </li>
    </vue-context>

</div>
@endcomponent

`@contextmenu.prevent` is the event listener needed to open the context menu. It is using `.prevent` as a modifier to prevent
the default behavior. In this example, it has a ref of `menu`, which is what `$refs.menu` is referring to. When each item is clicked on, the text of
the item is sent to the `onClick` method on the Vue instance, which is then shown in an alert.

@component('components.tip')
The context menu defaults to a <code>&lt;ul&gt;</code> tag. For best results, make each menu item
an <code>&lt;a&gt;</code> tag wrapped inside of an <code>&lt;li&gt;</code> tag.
@endcomponent
