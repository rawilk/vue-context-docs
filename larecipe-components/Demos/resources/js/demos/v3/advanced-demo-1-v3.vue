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

        <vue-context ref="menu">
            <ul slot-scope="child" v-if="child.data">
                <li @click="alertName(child.data.name)">Alert name</li>
                <li @click="remove(child.data.index)">Delete "{{ child.data.name }}"</li>
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
            alertName (name) {
                alert(`You clicked on "${name}"!`);
            },

            remove (index) {
                this.$delete(this.items, index);
            }
        }
    };
</script>