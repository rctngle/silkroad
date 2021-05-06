import ScrollBooster from 'scrollbooster';

export default function createCases() {
	const cases = document.querySelector('#cases').querySelectorAll('article');

	const casesScroller = new ScrollBooster({ 
		viewport: document.querySelector('#cases-scroller .scroller-outer'),
		scrollMode: 'native', 
		direction: 'horizontal' 
	});

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

	document.querySelectorAll('.case-pager-link').forEach(pager => {
		pager.addEventListener('click', e => {

			document.querySelectorAll('.case-pager-link.active').forEach(p => {
				p.classList.remove('active');
			});

			pager.classList.add('active');
			const href = pager.getAttribute('href');
			const referenceCode = href.replace('#case-', '');
			
			const caseSlide = document.querySelector('.swiper-slide.case-'+referenceCode);
			const elementLeft = caseSlide.offsetLeft;
			const caseRect = caseSlide.getBoundingClientRect();


			const x = (elementLeft - (document.body.clientWidth / 2)) + (caseRect.width / 2);
			casesScroller.scrollTo({ x: x, y: 0 });
			
		});
	});
}