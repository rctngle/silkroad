import mapboxgl from 'mapbox-gl';
import inView from 'in-view-modern';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5lY2RvdGUxMDEiLCJhIjoiY2oxMGhjbmpsMDAyZzJ3a2V0ZTBsNThoMiJ9.1Ce55CnAaojzkqgfX70fAw'

let caseSwiper, navSwiper;

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

	createCaseSwiper();
	createNavSwiper();


});

window.onload = function() {
}

window.addEventListener('keydown', e=>{
	if(e.key == '1'){
		createNavSwiper();
		document.body.classList.remove('horizontal-nav');
		document.body.classList.add('vertical-nav');
	} else if (e.key == '2'){
		destroyNavSwiper();
		document.body.classList.add('horizontal-nav');
		document.body.classList.remove('vertical-nav');
	}
});

function createCaseSwiper() {

	caseSwiper = new Swiper('.swiper-container', {
		slidesPerView: 'auto',
		spaceBetween: 20,
		freeMode: true,
		preventClicks: false,
		slidesOffsetAfter: 40,
		slidesOffsetBefore: 40,
		grabCursor: true
	});
}

function createNavSwiper() {

	navSwiper = new Swiper('.report-nav-inner', {
		slidesPerView: 'auto',
		spaceBetween: 0,
		freeMode: true,
		preventClicks: false,
		grabCursor: true,
		setWrapperSize: true,
		// centeredSlidesBounds: true,
	});
}

function destroyNavSwiper() {
	navSwiper.destroy();
}


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
	
	const nodes = Array.prototype.slice.call(document.querySelector('.report-nav-inner > ul').children);
	navSwiper.slideTo(nodes.indexOf(navItem), 50);

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
		center: [105.3,32.25],
		zoom: [3.2],
		attributionControl: false,
		zoomControl: false,
		interactive: false
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

	// const cases = document.querySelector('.cases');
	// cases.addEventListener('scroll', e => {
	// 	if (cases.scrollLeft > 0) {
	// 		cases.classList.add('scrolled');
	// 	} else {
	// 		cases.classList.remove('scrolled');
	// 	}
	// })

	document.querySelector('#cases').querySelectorAll('article').forEach(article => {
		article.querySelector('.read-more').addEventListener('click', e=>{
			article.classList.add('expanded');
		});
	});

	document.querySelector('#cases').querySelectorAll('.slideshow').forEach(slideshow => {

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