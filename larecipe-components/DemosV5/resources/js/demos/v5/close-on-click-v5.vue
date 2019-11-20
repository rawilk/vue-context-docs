<template>
    <div class="mt-4">
        <div class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="close-on-click" class="custom-control-input" v-model="closeOnClick">
                <label for="close-on-click" class="custom-control-label">
                    Close on Click
                </label>
            </div>
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
            <li>
                <a>
                    {{ closeOnClick ? 'I will close on click' : 'I will stay open on click' }}
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