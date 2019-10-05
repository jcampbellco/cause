<template>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label>
                    First Name
                    <input v-model="$props.contactObj.first_name" placeholder="Joe" />
                </label>
            </div>
            <div class="col">
                <label>
                    Last Name
                    <input id="last_name" v-model="$props.contactObj.last_name" placeholder="Smith" />
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label>
                    Email
                    <input id="email" v-model="$props.contactObj.email" placeholder="joe.smith@email.com" />
                </label>
            </div>
            <div class="col">
                <label>
                    Age
                    <input id="age" v-model="$props.contactObj.age" placeholder="23" />
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="secret">
                    Secret
                    <input id="secret" v-model="$props.contactObj.secret" placeholder="ABC123" />
                </label>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'AddComponent',
        props:{
            contactObj: {
                type: Object,
                required: true
            }
        }
    }
</script>
