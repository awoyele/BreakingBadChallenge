<template>
    <a @click="goToProfile">
        <p>
            <span>Name:</span> {{character.name}}
        </p>
        <img :src="character.img" width="80px" class="ml-3">
    </a>
</template>

<script>
    export default {
        name: "Character",
        props:["character"],
        methods:{
            goToProfile: function(){
                location = "/profile/"+this.character.id
            }
        }
    }
</script>

<style scoped>

</style>