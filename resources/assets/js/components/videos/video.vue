<template>
	<div>
	   	<div class='video-title'>
	   		<span>{{this.video.title}}</span>
		</div>
		<div class="video-detail-info">
			<div class="row">
				<div class="col-xs-6">
					<img v-bind:src="'http://image.tmdb.org/t/p/w185' + this.video.poster_path" />
				</div>
				<div class="col-xs-6 nopadding">
					<div class="row">
						<div class="col-xs-12 year">
							<span>
								{{ this.video.release_year }}
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 runtime">
							<span>
								{{ this.video.runtime }} min
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 vote-average">
							<span>
								{{ this.video.vote_average }}/10
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 ">
							<div class="fav-box">
								MARK AS FAVORITE
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-xs-12 overview">
					{{this.video.overview}}
				</div>
			</div>
			<hr>
			<div class="trailers">
				<div class="row title">
					<div class="col-xs-12">
						Trailers:
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 trailers_item">
						<i class="fa fa-play" aria-hidden="true"></i>
						<span >Trailer 1</span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12 trailers_item">
						<i class="fa fa-play" aria-hidden="true"></i>
						<span >Trailer 2</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	data() {
		return {
        	dialog: true
      	}
	},
	props:['video'],
	ready() {
        this.prepareComponent();
    },
    mounted() {
    	this.prepareComponent();
    },
	methods: {
		prepareComponent() {
	           console.log(this.video)
	    },
	}
}
</script>