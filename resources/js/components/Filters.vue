<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Search & Filter</div>

                    <div class="card-body">
                        Shows:
                        <button class="btn btn-primary my-3" @click="changeShow(1)">Breaking Bad </button>
                        <button class="btn btn-primary my-3" @click="changeShow(2)">Better Call Saul</button>
                        <hr></hr>
                        Seasons:
                        <button class="btn btn-primary my-3" @click="changeSeason(1)">Season 1</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Filters",
        data(){
            return {
                show:1,
                season:["*"]
            }
        }
    }
</script>

<style scoped>

</style>