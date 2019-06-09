<template>
    <div class="invoice-form" @submit.prevent="submit">
        <form enctype="multipart/form-data">
            <file-upload></file-upload>
        </form>
    </div>
</template>

<script>
    export default {
        data: () => ({
            form: {
                file: null
            }
        }),
        mounted() {
        },

        methods: {
        }
    }
</script>
