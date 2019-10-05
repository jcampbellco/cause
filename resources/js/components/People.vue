<template>
    <div class="card">
        <div class="card-header" @click="toggleExpand">
            <h5>
                <a class="btn btn-link">
                    <font-awesome-icon :icon="'chevron-' + (this.isExpanded ? 'down' : 'right')"></font-awesome-icon>
                    {{ this.emails | json }}
                </a>
                <a class="btn btn-danger float-right" @click="del">
                    <font-awesome-icon icon="trash" />
                </a>
            </h5>
        </div>
        <div :class="(!this.isExpanded ? 'd-none' : '')">
            <div class="card-body">
                <div class="card-columns">
                    <contacts-component
                        v-for="contact in this.data"
                        v-bind="contact"
                        :key="contact.email"
                    ></contacts-component>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import ContactsComponent from './Contacts.vue'

    export default {
        data() {
            return {
                isExpanded: false
            }
        },
        methods: {
            del() {
                this.$emit('delete', this.id);
            },
            toggleExpand() {
                this.isExpanded = !this.isExpanded;
            }
        },
        props: ['id', 'emails', 'ip', 'data'],
        filters: {
            properCase(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            json(string) {
                return JSON.parse(string).join(', ');
            }
        },
        components: {
            ContactsComponent
        }
    }
</script>
