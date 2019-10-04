<template>
    <div class="card" style="max-width: 18rem;">
        <div class="card-header">
            <span class="text-muted">Name</span>
            {{ this.name }}
        </div>
        <div class="card-body">
            <span class="text-muted">First Name</span>
            {{ this.first_name }}
            <br />
            <span class="text-muted">Last Name</span>
            {{ this.last_name }}
            <br />
            <span class="text-muted">Age</span>
            {{ this.age }}
            <br />
            <span class="text-muted">Secret</span>
            {{ this.secret }}
        </div>
    </div>
</template>
<script>
    export default {
        props: ['email', 'first_name', 'last_name', 'name', 'age', 'secret']
    }
</script>
