import mapboxgl from 'mapbox-gl';
mapboxgl.accessToken = 'pk.eyJ1IjoiYW5lY2RvdGUxMDEiLCJhIjoiY2oxMGhjbmpsMDAyZzJ3a2V0ZTBsNThoMiJ9.1Ce55CnAaojzkqgfX70fAw'

window.addEventListener('DOMContentLoaded', e=>{
	
	if(document.querySelector('#mapbox-map')){
		appendMap();	
	}

	// document.querySelectorAll('.continue').forEach(continueLink=>{

	// 	continueLink.addEventListener('click',e=>{
	// 		e.preventDefault();
	// 		const articleParent = continueLink.closest('article');
	// 		articleParent.classList.remove('concatenate');
	// 	});
	// });

	document.querySelectorAll('.expand').forEach(continueLink=>{

		continueLink.addEventListener('click',e=>{
			e.preventDefault();
			const articleParent = continueLink.closest('article');
			articleParent.classList.toggle('expanded');
		});
	});
	
});

function appendMap(){
	const map = new mapboxgl.Map({
		container: 'mapbox-map',
		style: 'mapbox://styles/anecdote101/cklkrw25g1nz617nnucz4id6p?fresh=true',
		center: [85.1275,41.47332],
		zoom: [4.541],
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
}




if (window.Element && !Element.prototype.closest) {
	Element.prototype.closest =
	function(s) {
		var matches = (this.document || this.ownerDocument).querySelectorAll(s),
			i,
			el = this;
		do {
			i = matches.length;
			while (--i >= 0 && matches.item(i) !== el) {};
		} while ((i < 0) && (el = el.parentElement));
		return el;
	};
}