<template>
    <div class="container">
        <h1 class="mt-5"> {{character.name}}</h1>
        <div class="row">
            <div class="col-8">
                <p><span class="h5">Occupation:</span> {{character.occupation.map(oc =>oc.occupation).join(", ")}}</p>
                <p><span class="h5">Nickname:</span> {{character.nickname}}</p>
                <p><span class="h5">Dead/Alive:</span> {{character.status}}</p>
                <p><span class="h5">Series:</span> {{character.shows.map(show =>show.name).join(", ")}}</p>
                <img :src="character.img" :alt="character.name +' image'" width="300px">
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Profile",
        props: ["character"]
    }
</script>

<style scoped>

</style>