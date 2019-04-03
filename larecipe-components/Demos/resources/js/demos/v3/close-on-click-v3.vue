<template>
    <div class="mt-4">
        <div class="mb-4">
            <label>
                <input type="checkbox" v-model="closeOnClick">
                Close on Click
            </label>
        </div>

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

        <vue-context ref="menu" :close-on-click="closeOnClick">
            <ul>
                <li>
                    {{ closeOnClick ? 'I will close on click' : 'I will stay open on click' }}
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
                closeOnClick: false,
                items: [
                    'Cras justo odio',
                    'Dapibus ac facilisis in',
                    'Morbi leo risus',
                    'Porta ac consectetur ac',
                    'Vestibulum at eros'
                ]
            };
        }
    };
</script>