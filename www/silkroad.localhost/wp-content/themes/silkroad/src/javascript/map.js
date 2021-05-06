import mapboxgl from 'mapbox-gl';
mapboxgl.accessToken = 'pk.eyJ1IjoiYW5lY2RvdGUxMDEiLCJhIjoiY2oxMGhjbmpsMDAyZzJ3a2V0ZTBsNThoMiJ9.1Ce55CnAaojzkqgfX70fAw';

export default function createMap() {
	if(document.querySelector('#mapbox-map')){
		const map = new mapboxgl.Map({
			container: 'mapbox-map',
			style: 'mapbox://styles/anecdote101/cklkrw25g1nz617nnucz4id6p?fresh=true',
			center: [ 88.9654,42.8186],
			zoom: [4.22513],
			attributionControl: false,
			zoomControl: false,
			interactive: true
		});

		map.on('zoom', e=>{
			// console.log(map.getZoom());
		});

		map.on('move', e=>{
			// console.log(map.getCenter());
		});

		map.on('load', function () {

			fetch('/wp-content/themes/silkroad/data/markers.geo.json')
				.then(response => response.json())
				.then(data => {
					// console.log(data);
					const features = [];
					data.features.forEach(feature=>{
						if(feature.properties.type == 'camp'){
							features.push(feature);
						}

					});

					data.features = features;

					map.addSource('markers', {
						type: 'geojson',
						data: data,
						cluster: true,
						clusterMaxZoom: 14, // Max zoom to cluster points on
						clusterRadius: 50
					});

					map.addLayer({
						'id': 'population',
						'type': 'circle',
						'source': 'markers',
						'filter': ['has', 'point_count'],

						'paint': {
							// make circles larger as the user zooms from z12 to z22
							'circle-radius': [
								'interpolate', ['linear'], ['get', 'point_count'],
								5,8,
								50,20
							],
							'circle-color': '#000'
						}
					});

					map.addLayer({
						'id': 'population-unclustered',
						'type': 'circle',
						'source': 'markers',
						filter: ['!', ['has', 'point_count']],
						'paint': {
							// make circles larger as the user zooms from z12 to z22
							'circle-radius': 5,
							'circle-color': '#000'
						}
					});

					map.addLayer({
						id: 'cluster-count',
						type: 'symbol',
						source: 'markers',
						filter: ['has', 'point_count'],
						layout: {
							'text-field': '{point_count_abbreviated}',
							'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
							'text-size': 12
						},
						paint: {
							'text-color': '#FFF'
						}
					});
				});		
		});
	}
}

