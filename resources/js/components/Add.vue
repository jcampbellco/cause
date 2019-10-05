<template>
    <div class="form-group jumbotron">
        <div class="form-row">
            <div class="col-6">
                <label>
                    First Name
                    <small v-if="$props.errors && $props.errors.first_name" class="invalid-feedback d-inline">
                        {{ $props.errors.first_name.join('; ') }}
                    </small>
                </label>
                <input v-model="$props.contactObj.first_name" :class="['form-control', $props.errors && $props.errors.first_name ? 'is-invalid' : '']" placeholder="Joe" />
            </div>
            <div class="col-6">
                <label>
                    Last Name
                    <small v-if="$props.errors && $props.errors.last_name" class="invalid-feedback d-inline">
                        {{ $props.errors.last_name.join('; ') }}
                    </small>
                </label>
                <input v-model="$props.contactObj.last_name" :class="['form-control', $props.errors && $props.errors.last_name ? 'is-invalid' : '']" placeholder="Smith" />
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label>
                    Email
                    <small v-if="$props.errors && $props.errors.email" class="invalid-feedback d-inline">
                        {{ $props.errors.email.join('; ') }}
                    </small>
                </label>
                <input id="email" v-model="$props.contactObj.email" :class="['form-control',  $props.errors && $props.errors.email ? 'is-invalid' : '']" placeholder="joe.smith@email.com" />
            </div>
            <div class="col">
                <label>
                    Age
                    <small v-if="$props.errors && $props.errors.age" class="invalid-feedback d-inline">
                        {{ $props.errors.age.join('; ') }}
                    </small>
                </label>
                <input id="age" v-model="$props.contactObj.age" :class="['form-control', $props.errors && $props.errors.age ? 'is-invalid' : '']" placeholder="23" />
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="secret">
                    Secret
                    <small v-if="$props.errors && $props.errors.secret" class="invalid-feedback d-inline">
                        {{ $props.errors.secret.join('; ') }}
                    </small>
                </label>
                <input id="secret" v-model="$props.contactObj.secret" :class="['form-control', $props.errors && $props.errors.secret ? 'is-invalid' : '']" placeholder="ABC123" />
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <a class="btn btn-danger float-right" @click="deleteRow($vnode.key)">
                    <font-awesome-icon icon="trash" />
                </a>
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
            },
            errors: {
                type: Object,
                required: false
            }
        },
        methods: {
            deleteRow(key) {
                this.$emit('deleteNewContact', key);
            }
        }
    }
</script>
<style>
    .jumbotron {
        padding: 2rem;
    }
    .form-row {
        padding-top: 5px;
    }
</style>
