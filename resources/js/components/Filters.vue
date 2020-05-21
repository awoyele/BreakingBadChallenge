<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Search & Filter</div>

                    <div class="card-body">
                        <input class="form-control" name="search" @input="$emit('search',$event)" placeholder="Search for a character"/>
                        Shows:
                        <button class="btn btn-primary my-3" @click="$emit('changeShow',1)">Breaking Bad </button>
                        <button class="btn btn-primary my-3" @click="$emit('changeShow',2)">Better Call Saul</button>
                        <hr></hr>
                        Seasons:
                        <button v-if="seasons" v-for="season in seasons" class="btn btn-primary my-3 mx-1" @click="$emit('changeSeason',season)">Season {{season}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Filters",
        props:["seasons"],
        data(){
            return {
                show:1
            }
        }
    }
</script>

<style scoped>

</style>