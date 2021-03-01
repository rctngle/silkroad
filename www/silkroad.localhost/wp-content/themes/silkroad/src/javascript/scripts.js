import mapboxgl from 'mapbox-gl';
import inView from 'in-view-modern';

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

	inView('article.report').on('enter', el => {
		const navItem = document.querySelector('.report-nav > ul > li.reportid-'+el.dataset.rootparent);
		if (!navItem.classList.contains('active')) {
			document.querySelectorAll('.report-nav > ul > li.active').forEach(item => {
				item.classList.remove('active');
			});
			navItem.classList.add('active');
		}

		const subNavItem = document.querySelector('.report-nav > ul > ul > li.reportid-'+el.dataset.subparent);
		if (!subNavItem.classList.contains('active')) {
			document.querySelectorAll('.report-nav ul > ul > li.active').forEach(item => {
				item.classList.remove('active');
			});
			subNavItem.classList.add('active');
		}
	});
});

function appendMap(){
	const map = new mapboxgl.Map({
		container: 'mapbox-map',
		style: 'mapbox://styles/anecdote101/cklkrw25g1nz617nnucz4id6p?fresh=true',
		center: [105.3,32.25],
		zoom: [3.2],
		attributionControl: false,
		zoomControl: false,
//		interactive: false
	});
	map.on('zoom', e=>{
		console.log(map.getZoom());
	});
	map.on('move', e=>{
		console.log(map.getCenter());
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