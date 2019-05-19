<template>
    <div class="mt-4">
        <div class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="close-on-scroll" class="custom-control-input" v-model="closeOnScroll">
                <label for="close-on-scroll" class="custom-control-label">
                    Close on Scroll
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

        <vue-context ref="menu" :close-on-scroll="closeOnScroll">
            <li>
                <a>
                    {{ closeOnScroll ? 'I will hide when the window is scrolled' : 'I will stay visible when the window is scrolled' }}
                </a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';

    export default {
        components: { VueContext },

        data () {
            return {
                closeOnScroll: true,
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