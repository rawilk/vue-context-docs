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
                <a @click.prevent="onClick($event.target.innerText)">
                    Do something
                </a>
            </li>
            <li>
                <a @click.prevent="onClick($event.target.innerText)">
                    Do something else
                </a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss';

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