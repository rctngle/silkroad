import ScrollBooster from './scroll-booster';
import inView from 'in-view-modern';
import animateScrollTo from 'animated-scroll-to';

export default function createReport() {

	const reportScrollerEl = document.querySelector('#report-nav-scroller .scroller-outer');
	new ScrollBooster({ 
		viewport: reportScrollerEl,
		scrollMode: 'native', 
		direction: 'horizontal' 
	});


	document.querySelector('#report-nav-scroller .scroller-prev').addEventListener('click', e => {
		const scrollAmount = (document.body.clientWidth / 2);
		const scrollLeft = document.querySelector('#report-nav-scroller .scroller-outer').scrollLeft;
		animateScrollTo([scrollLeft - scrollAmount, null], {
			cancelOnUserAction: true,
			elementToScroll: reportScrollerEl,
		});
	});

	document.querySelector('#report-nav-scroller .scroller-next').addEventListener('click', e => {
		const scrollAmount = (document.body.clientWidth / 2);
		const scrollLeft = document.querySelector('#report-nav-scroller .scroller-outer').scrollLeft;
		animateScrollTo([scrollLeft + scrollAmount, null], {
			cancelOnUserAction: true,
			elementToScroll: reportScrollerEl,
		});
	});


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
	document.querySelectorAll('.caption').forEach(caption=>{

		caption.addEventListener('click', e=>{
			
			caption.classList.toggle('show-caption');
		});
	});

	


	

	// document.querySelectorAll('#report .insert').forEach(insert=>{
	// 	if(document.querySelector('article[data-rootparent="'+insert.dataset.root+'"] .anchor')){
	// 		document.querySelector('article[data-rootparent="'+insert.dataset.root+'"] .anchor').after(insert);	
	// 	}
	// });

	const callOut = document.querySelector('#report > .call-out');
	if (document.querySelector('#call-out')) {
		document.querySelector('#call-out').appendChild(callOut);
	}

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

	inView('article.report').on('enter', el => {
		const rootId = parseInt(el.dataset.rootparent);
		const navItem = document.querySelector('#report-nav-scroller .reportid-'+rootId);

		document.querySelectorAll('#report-nav-scroller .swiper-slide').forEach(item => {
			item.classList.remove('active');
		});
		navItem.classList.add('active');	

		const elementLeft = navItem.offsetLeft;
		const navItemRect = navItem.getBoundingClientRect();

		const x = (elementLeft - (document.body.clientWidth / 2)) + (navItemRect.width / 2);
		// reportScroller.scrollTo({ x: x, y: 0 });
		animateScrollTo([x, null], {
			cancelOnUserAction: true,
			elementToScroll: reportScrollerEl,
		});



	});
}
