@extends('layouts.app')

@section('content')
<v-container >
	<video-detail-page :video="{{json_encode($video)}}"></video-detail-page>
</v-container>
@endsection