<template>
	<div class="row row-movie">
		<div v-for="(row,key) in rows">
			<div v-for="movie in row">
				<a v-bind:href="'moviedetail/' + movie.id" >
					<div class='nopadding col-xs-6 col-lg-2 poster' v-bind:id="'movie_' + movie.id">
						<img class='poster' v-bind:src="'http://image.tmdb.org/t/p/w185' + movie.poster_path" />
					</div>
				</a>
			</div>
		</div>
		<div class='col-xs-12 loadmore'><button class='btn' v-on:click="getVideos(lastPage +1)">Load More</button></div>
	</div>
</template>
<script>
export default{
	data() {
		return {
			videos:[],
			lastPage:null,
			currentMovie:{},
			rows:[],
		};
	},
	ready() {
        this.prepareComponent();
    },
    mounted() {
        this.prepareComponent();
    },
    methods: {
    	prepareComponent() {
            this.getVideos(1);
        },
        processRows() {
        	var i=1;
        	var rows = [];
        	rows[i] = [];
        	this.videos.forEach(function(videosList){
        		videosList.results.forEach(function(video){
            		rows[i].push(video);
            		if(rows[i].length == 6) {
            			i++;
            			rows[i]=[];
            		}        			
        		}) ;
        		
        	})   
        	this.rows = rows;
        	console.log()
        },
        getVideos(page) {
        	if(page == null){
        		page = 1;
        	}
        	axios.get('api/movie/list/popular/' + page)
            .then(response => {
                this.videos.push(response.data);
                this.processRows();
                this.lastPage = page;
            });
        }
    }
}
</script>