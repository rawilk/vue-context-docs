<template>
    <div>
        <table class="table-left border-collapse shadow-none">
            <tbody>
                <tr v-for="(item, index) in items"
                    :key="index"
                    @contextmenu.prevent="$refs.menu.open($event, { name: item, index })"
                >
                    <td v-text="item"></td>
                </tr>
            </tbody>
        </table>

        <div class="my-4 text-right" v-show="showReset">
            <button type="button"
                    @click="reset"
                    class="button is-info rounded-full text-base"
            >
                Reset Demo
            </button>
        </div>

        <vue-context ref="menu">
            <template slot-scope="child" v-if="child.data">
                <li>
                    <a href="#" @click.prevent="alertName(child.data.name)">
                        Alert name
                    </a>
                </li>
                <li>
                    <a href="#" @click.prevent="remove(child.data.index)">
                        Delete "{{ child.data.name }}"
                    </a>
                </li>
            </template>
        </vue-context>
    </div>
</template>

<script>
    import { VueContext } from 'vue-context';

    const items = [
        'Cras justo odio',
        'Dapibus ac facilisis in',
        'Morbi leo risus',
        'Porta ac consectetur ac',
        'Vestibulum at eros'
    ];

    export default {
        components: { VueContext },

        computed: {
            showReset () {
                return this.items.length < items.length;
            }
        },

        data () {
            return {
                items: [...items]
            };
        },

        methods: {
            alertName (name) {
                alert(`You clicked on "${name}"!`);
            },

            remove (index) {
                this.$delete(this.items, index);
            },

            reset () {
                this.items = [...items];
            }
        }
    };
</script>