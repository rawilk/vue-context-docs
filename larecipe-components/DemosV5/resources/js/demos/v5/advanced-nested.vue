<template>
    <div>
        <table class="table-left border-collapse shadow-none">
            <tbody>
                <tr v-for="(item, index) in items"
                    :key="index"
                    @contextmenu.prevent="$refs.menu.open($event)"
                >
                    <td v-text="item"></td>
                </tr>
            </tbody>
        </table>

        <vue-context ref="menu">
            <li>
                <a @click.prevent="alertText($event.target.innerText)">Not nested</a>
            </li>
            <li class="v-context__sub">
                <a @click.prevent="alertText($event.target.innerText)">Has sub menu</a>
                <ul class="v-context">
                    <li>
                        <a @click.prevent="alertText($event.target.innerText)">Nested child</a>
                    </li>
                    <li class="v-context__sub">
                        <a @click.prevent="alertText($event.target.innerText)">Another nested menu</a>
                        <ul class="v-context">
                            <li>
                                <a @click.prevent="alertText($event.target.innerText)">Another level deep</a>
                            </li>
                            <li>
                                <a @click.prevent="alertText($event.target.innerText)">There is no limit</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a @click.prevent="alertText($event.target.text)">Also not nested</a>
            </li>
        </vue-context>
    </div>
</template>

<script>
    import VueContext from 'vue-context';
    import 'vue-context/src/sass/vue-context.scss';

    export default {
        components: { VueContext },

        data() {
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
            alertText(text) {
                alert(`You clicked: ${text}`);
            }
        }
    };
</script>