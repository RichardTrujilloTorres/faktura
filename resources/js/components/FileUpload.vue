<template>
    <div class="file-upload">
        <vue-dropzone
            id="invoice-files"
            ref="invoice-files"
            :options="options"
            @vdropzone-complete="complete"
        >
        </vue-dropzone>
    </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    name: 'file-upload',
    components: {
        vueDropzone: vue2Dropzone
    },
    methods: {
        complete(res) {
            console.log('complete')
            console.log(res)
        }
    },
    created() {
    },
    data: () => ({
        options: {
            url: '/invoices',
            thumbnailWidth: 150,
            maxFilesize: 0.5,
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            }
        }
    }),
}

</script>
