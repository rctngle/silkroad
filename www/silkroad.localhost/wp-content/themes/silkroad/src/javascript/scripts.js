import mapboxgl from 'mapbox-gl';
mapboxgl.accessToken = 'pk.eyJ1IjoiYW5lY2RvdGUxMDEiLCJhIjoiY2oxMGhjbmpsMDAyZzJ3a2V0ZTBsNThoMiJ9.1Ce55CnAaojzkqgfX70fAw'

window.addEventListener('DOMContentLoaded', e=>{
	
	if(document.querySelector('#mapbox-map')){
		appendMap();	
	}
	
});

function appendMap(){
	const map = new mapboxgl.Map({
		container: 'mapbox-map',
		style: 'mapbox://styles/anecdote101/cklkrw25g1nz617nnucz4id6p?fresh=true',
		center: [83.208,41.031],
		zoom: [7],
		attributionControl: false,
		zoomControl: false,
		interactive: true
	});

}