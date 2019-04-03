<template>
    <div class="mt-4">
        <div class="mb-4">
            <label>
                <input type="checkbox" v-model="closeOnScroll">
                Close on Scroll
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

        <vue-context ref="menu" :close-on-scroll="closeOnScroll">
            <ul>
                <li>
                    {{ closeOnScroll ? 'I will hide when the window is scrolled' : 'I will stay visible when the window is scrolled' }}
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