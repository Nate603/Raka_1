<template>
    <div class="container" style="margin-top: 5vh;">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1><b>Super Awesome Game Results</b></h1>
            </div>
        </div>

         <div class="row justify-content-center" style="margin-top: 5vh;">
            <div class="col-md-12 text-center">
                <h5><b>Here are your results from your last mission.</b></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <!-- Sats -->
         <div class="row justify-content-center" style="height: auto; margin-bottom: 5vh;">
            <div v-if="avg_stats_color && avg_stats_value"  class="col-5 col-md-4 text-center" style="margin-top: 5vh; border: 1px solid rgb(230, 230, 230);">
                <div style="margin-top: 2vh;"><b><p>Combined Average Score</p></b></div>
                    <div class="justify-content-center" style="padding-left: 5vw; padding-bottom: 2vh;">
                        <average-score
                            :color=avg_stats_color
                            :value=avg_stats_value
                        ></average-score>
                    </div>
            </div>
             <div v-if="results" class="col-9 col-md-7 offset-md-1 text-center" style="margin-top: 5vh; border: 1px solid rgb(230, 230, 230);">
                 <div style="margin-top: 2vh;"><b><p>Score Breakdown</p></b></div>
                    <div v-for="stats in results" v-bind:key="stats.title" style="margin-top: 1vh;margin-bottom: 1vh;">
                        <score-breakdown-bar
                            :title=stats.title
                            :value=stats.value
                            :color=stats.color
                        ></score-breakdown-bar>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ScoreBreakdownBar from './ScoreBreakdownBar.vue'
    import AverageScore from './AverageScore.vue'

    export default {
        components: {
            'score-breakdown-bar': ScoreBreakdownBar,
            'average-score': AverageScore
        },
        data() {
            return {
                results: [],
                avg_stats_color: false,
                avg_stats_value: false,
            }
        },
        methods: {
            getData() {
                axios.get('/getGameData')
                .then(response => {
                    this.results = response.data.game_stats;
                    this.avg_stats_color = response.data.avg_stats.color;
                    this.avg_stats_value = response.data.avg_stats.value;
                })
                .catch(error => {
                    console.log(error);
                })
            }
        },
        created() {
            this.getData();
        }
    }
</script>
