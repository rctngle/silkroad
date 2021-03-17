import mapboxgl from 'mapbox-gl';
import inView from 'in-view-modern';

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5lY2RvdGUxMDEiLCJhIjoiY2oxMGhjbmpsMDAyZzJ3a2V0ZTBsNThoMiJ9.1Ce55CnAaojzkqgfX70fAw'

window.addEventListener('DOMContentLoaded', e=>{
	
	createCases();
	createFootnotes();
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


	let clickScrollInProgress = false;
	document.querySelectorAll('.report-nav-inner a').forEach(reportNavLink => {
		reportNavLink.addEventListener('click', e => {
			if (!clickScrollInProgress) {
				clickScrollInProgress = true;
				setTimeout(() => {
					clickScrollInProgress = false;
				}, 100);

				document.querySelectorAll('.report-nav-inner li').forEach(item => {
					item.classList.remove('active');
				});

				const slug = reportNavLink.getAttribute('href');
				const anchor = document.querySelector('article.report a[name="' + slug.replace('#', '') + '"]');
				updateReportNav(anchor.parentNode);;
				// const report = document.querySE
				// reportNavLink.parentNode.classList.add('active')
				
			}	
		});
	})

	inView('article.report').on('enter', el => {
		
		if (!clickScrollInProgress) {
			updateReportNav(el);
		}
	});
});

function createFootnotes(){
	document.querySelectorAll('sup').forEach(sup=>{
		sup.addEventListener('click', e=>{
			
			document.querySelectorAll('sup').forEach(item=>{
				item.classList.remove('show');
			});
			sup.classList.add('show');
		});
	});
}

function updateReportNav(el) {
	const navItem = document.querySelector('.report-nav-inner > ul > li.reportid-'+el.dataset.rootparent);
	if (!navItem.classList.contains('active')) {
		document.querySelectorAll('.report-nav-inner > ul > li.active').forEach(item => {
			item.classList.remove('active');
		});
		navItem.classList.add('active');

	}

	const subNavItem = document.querySelector('.report-nav-inner > ul > ul > li.reportid-'+el.dataset.subparent);
	if (subNavItem && !subNavItem.classList.contains('active')) {
		document.querySelectorAll('.report-nav-inner ul > ul > li.active').forEach(item => {
			item.classList.remove('active');
		});

		subNavItem.classList.add('active');
	}	
}

function locationHashChanged() {
}


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

function createCases() {
	const cases = document.querySelector('.cases');
	cases.addEventListener('scroll', e => {
		if (cases.scrollLeft > 0) {
			cases.classList.add('scrolled');
		} else {
			cases.classList.remove('scrolled');
		}
	})

	cases.querySelectorAll('article').forEach(article => {
		article.querySelector('.read-more').addEventListener('click', e=>{
			article.classList.add('expanded');
		});

	});

	cases.querySelectorAll('.slideshow').forEach(slideshow => {

		slideshow.dataset.idx = 0;
		slideshow.dataset.numarticles = slideshow.querySelectorAll('.slide').length;

		slideshow.querySelector('.prev').addEventListener('click', e => {
			let idx = parseInt(slideshow.dataset.idx) - 1;
			if (idx < 0) {
				idx = parseInt(slideshow.dataset.numarticles) - 1;
			}
			slideshow.dataset.idx = idx;
		});

		slideshow.querySelector('.next').addEventListener('click', e => {
			let idx = parseInt(slideshow.dataset.idx) + 1;
			if (idx > parseInt(slideshow.dataset.numarticles) - 1) {
				idx = 0;
			}
			slideshow.dataset.idx = idx;
		});
	});

	// setInterval(() => {
	// 	document.querySelectorAll('.slideshow').forEach(slideshow => {
	// 		let idx = parseInt(slideshow.dataset.idx) + 1;
	// 		if (idx >= parseInt(slideshow.dataset.numarticles)) {
	// 			idx = 0;
	// 		}
	// 		slideshow.dataset.idx = idx;			
	// 	});
	// }, 3000);

}