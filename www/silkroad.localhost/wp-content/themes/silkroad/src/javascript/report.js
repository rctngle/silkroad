import ScrollBooster from 'scrollbooster';
import inView from 'in-view-modern';

export default function createReport() {


	const reportScroller = new ScrollBooster({ 
		viewport: document.querySelector('#report-nav-scroller .scroller-outer'),
		scrollMode: 'native', 
		direction: 'horizontal' 
	});


	document.querySelector('#report-nav-scroller .scroller-prev').addEventListener('click', e => {
		const scrollAmount = (document.body.clientWidth / 2);
		const scrollLeft = document.querySelector('#report-nav-scroller .scroller-outer').scrollLeft;
		reportScroller.scrollTo({ x: scrollLeft - scrollAmount, y: 0 });
	});

	document.querySelector('#report-nav-scroller .scroller-next').addEventListener('click', e => {
		const scrollAmount = (document.body.clientWidth / 2);
		const scrollLeft = document.querySelector('#report-nav-scroller .scroller-outer').scrollLeft;
		reportScroller.scrollTo({ x: scrollLeft + scrollAmount, y: 0 });
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

	const whatIsMarkup = document.querySelector('#report > .what-is-the-report');
	document.querySelector('#what-is-the-report').appendChild(whatIsMarkup);

	document.querySelectorAll('#report .insert').forEach(insert=>{
		document.querySelector('article[data-rootparent="'+insert.dataset.root+'"] .anchor').after(insert);
	});


	const callOut = document.querySelector('#report > .call-out');
	document.querySelector('#call-out').appendChild(callOut);

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
		activateNavItem(navItem);
	});
}

function activateNavItem(navItem) {
	document.querySelectorAll('#report-nav-scroller .swiper-slide').forEach(item => {
		item.classList.remove('active');
	});
	navItem.classList.add('active');	
}