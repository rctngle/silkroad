import mapboxgl from 'mapbox-gl';
import inView from 'in-view-modern';
import Swiper, { Navigation, Pagination } from 'swiper';
import 'swiper/swiper-bundle.css';

Swiper.use([Navigation, Pagination]);

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5lY2RvdGUxMDEiLCJhIjoiY2oxMGhjbmpsMDAyZzJ3a2V0ZTBsNThoMiJ9.1Ce55CnAaojzkqgfX70fAw'

let caseSwiper, navSwiper;

window.addEventListener('DOMContentLoaded', e=>{
	
	createCases();
	createFootnotes();
	if(document.querySelector('#mapbox-map')){
		appendMap();	
	}
	createTakeAction();
	document.querySelectorAll('.content-box h3').forEach(continueLink=>{
		continueLink.addEventListener('click',e=>{
			e.preventDefault();
			e.stopPropagation();
			const articleParent = continueLink.closest('article');
			if(articleParent.classList.contains('expanded')){
				articleParent.classList.remove('expanded');
			} else {
				articleParent.classList.add('expanded');	
			}			
		});
	});

	document.querySelectorAll('.content-type-legal-text .legal-text-title').forEach(legalText=>{
		legalText.addEventListener('click',e=>{
			e.preventDefault();
			e.stopPropagation();
			const articleParent = legalText.closest('article');
			if(articleParent.classList.contains('expanded')){
				articleParent.classList.remove('expanded');
			} else {
				articleParent.classList.add('expanded');	
			}
		});
	});
	// document.querySelectorAll('#report article').forEach(article=>{
	// 	article.addEventListener('click',e=>{
	// 		article.classList.add('expanded');
	// 	});
	// });



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

	createCaseSwiper();
	createNavSwiper();


	// document.querySelector('.button').addEventListener('click', e => {
	// 	console.log('next');
	// 	caseSwiper.slideNext()
	// })

});


function createTakeAction(){
	document.querySelectorAll('.take-action-button, .take-action').forEach(actionButton=>{
		actionButton.addEventListener('click', e=>{
			document.querySelector('#take-action').classList.add('display-iframe');
		});
	});
}


function createCaseSwiper() {

	const cases = document.querySelectorAll('#cases .swiper-wrapper .swiper-slide');
	
	caseSwiper = new Swiper('.swiper-container', {
		slidesPerView: 4.3,
		spaceBetween: 20,
		freeMode: true,
		preventClicks: false,
		slidesOffsetAfter: 40,
		slidesOffsetBefore: 40,
		grabCursor: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			renderBullet: function (index, className) {

				let face = cases[index].querySelector('.face-crop img');

				if(face === undefined || face === null){
					face = cases[index].querySelector('.slide img');
				}
				const imgSrc = face.getAttribute('src');
				const name = cases[index].querySelector('.case h3').textContent;
				return `
					<span class="${className}">
						<span class="image" style="background-image: url('${imgSrc}')"></span>
						<span class="name">${name}</span>
					</span>
				`;
			},

		}
	});
}

function createNavSwiper() {

	navSwiper = new Swiper('.report-nav-inner', {
		slidesPerView: 'auto',
		spaceBetween: 0,
		freeMode: true,
		preventClicks: true,
		grabCursor: true,
		setWrapperSize: true,
		centeredSlidesBounds: true,
		preventClicksPropagation: true,
		navigation: {
			nextEl: '.report-swiper-button-next',
			prevEl: '.report-swiper-button-prev',
		},
	});
}

function createFootnotes(){
	document.querySelectorAll('sup').forEach(sup=>{
		sup.addEventListener('click', e=>{
			e.preventDefault();
			document.querySelectorAll('sup').forEach(item=>{
				item.classList.remove('show');
			});
			sup.classList.add('show');
		});
	});
}

function updateReportNav(el) {
	const navItem = document.querySelector('.report-nav-inner > ul > li.reportid-'+el.dataset.rootparent);
	
	const nodes = Array.prototype.slice.call(document.querySelector('.report-nav-inner > ul').children);
	if (document.body.classList.contains('horizontal-nav')) {
		navSwiper.slideTo(nodes.indexOf(navItem)-1, 150);
	}

	if (!navItem.classList.contains('active')) {
		document.querySelectorAll('.report-nav-inner > ul > li.active').forEach(item => {
			item.classList.remove('active');
		});
		navItem.classList.add('active');
		// navItem.scrollIntoView({behavior: "smooth", inline: "center"});
	}

	const subNavItem = document.querySelector('.report-nav-inner > ul > li > ul > li.reportid-'+el.dataset.subparent);
	if (subNavItem && !subNavItem.classList.contains('active')) {
		document.querySelectorAll('.report-nav-inner ul > li > ul > li.active').forEach(item => {
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
		center: [ 88.9654,42.8186],
		zoom: [4.22513],
		attributionControl: false,
		zoomControl: false,
		interactive: true
	});

	map.on('zoom', e=>{
		console.log(map.getZoom());
	});
	map.on('move', e=>{
		console.log(map.getCenter());
	});

	

	map.on('load', function () {

		fetch('/wp-content/themes/silkroad/data/markers.geo.json')
		.then(response => response.json())
		.then(data => {
			console.log(data);
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
       					 "interpolate", ["linear"], ["get", "point_count"],
						5,8,
						50,20
					],
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

	// const cases = document.querySelector('.cases');
	// cases.addEventListener('scroll', e => {
	// 	if (cases.scrollLeft > 0) {
	// 		cases.classList.add('scrolled');
	// 	} else {
	// 		cases.classList.remove('scrolled');
	// 	}
	// })

	const cases = document.querySelector('#cases').querySelectorAll('article');
	if (cases.length > 0) {
		cases.forEach(article => {
			article.querySelector('.read-more').addEventListener('click', e=>{
				article.classList.add('expanded');
			});
		});

		document.querySelector('#cases').querySelectorAll('.slideshow').forEach(slideshow => {

			slideshow.dataset.idx = 0;
			slideshow.dataset.numarticles = slideshow.querySelectorAll('.slide').length;

			if(slideshow.querySelector('.controls')){
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
			}
			


		});
	}

	// setInterval(() => {
	// 	document.querySelectorAll('.slideshow').forEach(slideshow => {
	// 		let idx = parseInt(slideshow.dataset.idx) + 1;
	// 		if (idx >= parseInt(slideshow.dataset.numarticles)) {
	// 			idx = 0;
	// 		}
	// 		slideshow.dataset.idx = idx;			
	// 	});
	// }, 3000);



	// const swiper = new Swiper(, {
	// 	slidesPerView: 3,
	// 	spaceBetween: 30,
	// 	freeMode: true,
	// 		// pagination: {
	// 		// 	el: '.swiper-pagination',
	// 		// 	clickable: true,
	// 		// },
	// });
}