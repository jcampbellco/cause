<template>
    <div id="app">
        <div class="heading">
            <h1>
                Contacts and People
                <a class="float-right" id="addNew" @click="create">
                    <font-awesome-icon icon="plus-square"></font-awesome-icon>
                </a>
            </h1>
        </div>
        <div :class="this.newContacts.length > 0 ? '' : 'd-none'">
            <add-component
                v-for="(contact, i) in newContacts"
                v-bind="contact"
                :contact-obj="contact"
                :key="i"
                @deleteNewContact="deleteNewContact"
            ></add-component>
            <h1>
                <a style="padding-left: 10px;" @click="submit">
                    <font-awesome-icon icon="save" />
                </a>
            </h1>
        </div>
        <div class="accordion">
            <people-component
                v-for="people in peopleCollection"
                v-bind="people"
                :key="people.id"
                @delete="del"
            ></people-component>
        </div>
    </div>
</template>

<style>
    .heading {
        padding: 3px 10px 20px 10px;
    }
    .accordion {
        margin: 10px;
    }
</style>

<script>
    function People({ id, emails, data, created, updated }) {
        this.id = id;
        this.emails = emails;
        this.data = data;
        this.created = created;
        this.updated = updated;
    }

    function Contact({ first_name, last_name, email, age, secret }) {
        this.first_name = first_name;
        this.last_name = last_name;
        this.email = email;
        this.age = age;
        this.secret = secret;
    }

    import PeopleComponent from './People.vue';
    import AddComponent from './Add.vue';

    import Axios from 'axios';

    export default {
        data() {
            return {
                peopleCollection: [],
                newContacts: []
            }
        },
        methods: {
            create() {
                this.newContacts.push(new Contact({}));
            },
            submit() {
                this.axios.post('/api/people', { data: this.newContacts }).then(( response ) => {
                    this.peopleCollection.push(response.data);
                    this.newContacts = [];
                });
            },
            read() {
                this.axios.get('/api/people').then(({ data }) => {
                    data.forEach(people => {
                        this.peopleCollection.push(new People(people));
                    });
                });
            },
            del(id) {
                this.axios.delete(`/api/people/${id}`).then(() => {
                    let index = this.peopleCollection.findIndex(people => people.id === id);
                    this.peopleCollection.splice(index, 1);
                });
            },
            deleteNewContact(index) {
                this.newContacts.splice(index, 1);
            }
        },
        components: {
            PeopleComponent,
            AddComponent
        },
        created() {
            this.axios = Axios;
            this.read();
        }
    }
</script>
