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
        <div :class="this.newPeople.length > 0 ? '' : 'd-none'">
            <add-component
                v-for="people in newPeople"
                v-bind="people"
                :key="_uid"
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
    function People({ id, emails, data, created, updated}) {
        this.id = id;
        this.emails = emails;
        this.data = data;
        this.created = created;
        this.updated = updated;
    }

    import PeopleComponent from './People.vue';
    import AddComponent from './Add.vue';

    import Axios from 'axios';

    export default {
        data() {
            return {
                peopleCollection: [],
                newPeople: [],
                working: false
            }
        },
        methods: {
            create() {
                this.newPeople.push({});
            },
            submit() {
                console.log(this.$refs.form, this.$refs.add, this.newPeople);
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
            }
        },
        watch: {

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
