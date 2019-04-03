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

        <v-context ref="menu">
            <ul>
                <li @click="onClick($event.target.innerText)">Do something</li>
                <li @click="onClick($event.target.innerText)">Do something else</li>
            </ul>
        </v-context>
    </div>
</template>

<script>
    import vContext from 'vue-context';

    export default {
        components: { vContext },

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