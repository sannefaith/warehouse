<template>
    <div class="container">
        <button class="btn btn-primary btn-sm" @click="switchView">Bookmarks</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
            switchView(){
                alert('switch');
            }
        }
    }
</script>
