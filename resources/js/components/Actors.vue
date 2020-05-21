<template>
    <div>
        <h1>List Of Characters</h1>
        <div class="row" v-if="characters.length > 0">
            <character  v-for="character in characters" class="pl-5 p-3 col-6" :character="character" :key="character.char_id"></character>
        </div>
    </div>

</template>

<script>
    import character from './Character'
    export default {
        name: "Actors",
        components:[character],
        data:()=>({'characters':[]}),
        methods:{
            getCharacters: function(){
                axios.get('/api/characters')
                    .then(res => this.characters = res.data)
            }
        },
        mounted(){
            this.getCharacters();
        }
    }
</script>

<style scoped>
character{

}
</style>