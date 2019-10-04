<template>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label>
                    First Name
                    <input v-model="first_name" placeholder="Joe" />
                </label>
            </div>
            <div class="col">
                <label>
                    Last Name
                    <input id="last_name" v-model="last_name" placeholder="Smith" />
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label>
                    Email
                    <input id="email" v-model="email" placeholder="joe.smith@email.com" />
                </label>
            </div>
            <div class="col">
                <label>
                    Age
                    <input id="age" v-model="age" placeholder="23" />
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="secret">
                    Secret
                    <input id="secret" v-model="secret" placeholder="ABC123" />
                </label>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                id: null,
                email: null,
                first_name: null,
                last_name: null,
                name: null,
                age: null,
                secret: null
            }
        },
        methods: {

        }
    }
</script>
