<template>
	<div class="row">
		<div  v-for="page in videos">
			<div v-for="movie in page.results">
				<div class='col-xs-6 col-sm-3 col-md-3 col-lg-2' v-bind:id="'movie_' + movie.id">
					<img class='' style="max-width:185px" v-bind:src="'http://image.tmdb.org/t/p/w185' + movie.poster_path"/>
				</div>
			</div>
		</div>
		<div class='loadMore col-xs-12 col-sm-3 col-md-3 col-lg-2'> <button class='' v-on:click="getVideos(lastPage +1)">Load More</button></div>
	</div>
</template>
<script>
export default{
	data() {
		return {
			videos:[],
			lastPage:null
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
        getVideos(page) {
        	if(page == null){
        		page = 1;
        	}
        	axios.get('api/movie/list/popular/' + page)
            .then(response => {
                this.videos.push(response.data);
                this.lastPage = page;
            });
        }
    }
}
</script>