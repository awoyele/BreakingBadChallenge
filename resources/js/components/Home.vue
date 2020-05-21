<template>
    <div>
        <Filters v-if="seasons" @changeShow="changeShow" @search="search" @changeSeason="changeSeason" :seasons="seasons"></Filters>
        <Actors :characters="characters"></Actors>
    </div>
</template>

<script>
    import Filters from './Filters'
    import Actors from './Actors'
    export default {
        name: "Home",
        components:{Filters,Actors},
        data: ()=>({
            characters:{},seasons:[],show:1
        }),
        methods:{
            search(event){
                let show = this.show
                axios.get("/api/search",{
                    params: {show, search:event.target.value}
                }).then(res => {this.characters = res.data.characters; this.seasons = res.data.seasons})
            },
            changeShow(show){
                this.show = show
                axios.get("/api/characters",{
                    params: {show}
                }).then(res => {this.characters = res.data.characters; this.seasons = res.data.seasons})
            },
            changeSeason(season){
                let show = this.show
                axios.get("/api/characters",{
                    params: {season,show}
                }).then(res => {this.characters = res.data.characters; this.seasons = res.data.seasons})
            }
        },
        mounted(){
                this.changeShow(1);
            }
    }
</script>

<style scoped>

</style>