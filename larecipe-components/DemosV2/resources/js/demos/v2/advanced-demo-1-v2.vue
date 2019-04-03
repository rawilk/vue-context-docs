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

        <v-context ref="menu">
            <ul slot-scope="child" v-if="child.userData">
                <li @click="alertName(child.userData.name)">Alert name</li>
                <li @click="remove(child.userData.index)">Delete "{{ child.userData.name }}"</li>
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
            alertName (name) {
                alert(`You clicked on "${name}"!`);
            },

            remove (index) {
                this.$delete(this.items, index);
            }
        }
    };
</script>