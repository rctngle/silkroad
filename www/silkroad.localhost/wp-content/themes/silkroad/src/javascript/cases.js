import ScrollBooster from 'scrollbooster';

export default function createCases() {
	const cases = document.querySelector('#cases').querySelectorAll('article');

	const checkScrollMax = (state) => {
		const scrollLeft = document.querySelector('#cases-scroller .scroller-outer').scrollLeft;
		const scrollWidth = document.querySelector('#cases-scroller .scroller-outer').scrollWidth;
		const bodyWidth = document.body.clientWidth;

		if (scrollLeft <= 100) {
			document.querySelector('#cases-scroller').classList.remove('max-right');
			document.querySelector('#cases-scroller').classList.add('max-left');
		} else if (scrollLeft + bodyWidth + 100 >= scrollWidth) {
			document.querySelector('#cases-scroller').classList.remove('max-left');	
			document.querySelector('#cases-scroller').classList.add('max-right');	
		} else {			
			document.querySelector('#cases-scroller').classList.remove('max-right');	
			document.querySelector('#cases-scroller').classList.remove('max-left');	
		}
	};

	const casesScroller = new ScrollBooster({ 
		viewport: document.querySelector('#cases-scroller .scroller-outer'),
		scrollMode: 'native', 
		direction: 'horizontal',
		onUpdate: state => {
			checkScrollMax(state);
		},
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

			slideshow.querySelectorAll('img').forEach(image=>{
				image.addEventListener('click', e => {
					let idx = parseInt(slideshow.dataset.idx) + 1;
					if (idx > parseInt(slideshow.dataset.numarticles) - 1) {
						idx = 0;
					}
					slideshow.dataset.idx = idx;
				});
			});
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
			document.querySelectorAll('#cases-scroller .swiper-slide').forEach(c => {
				c.classList.remove('active');
			});
			caseSlide.classList.add('active');


			const elementLeft = caseSlide.offsetLeft;
			const caseRect = caseSlide.getBoundingClientRect();


			const x = (elementLeft - (document.body.clientWidth / 2)) + (caseRect.width / 2);
			casesScroller.scrollTo({ x: x, y: 0 });
		});
	});


	document.querySelector('#cases-scroller .scroller-prev').addEventListener('click', e => {
		const scrollAmount = (document.body.clientWidth / 2);
		const scrollLeft = document.querySelector('#cases-scroller .scroller-outer').scrollLeft;		
		casesScroller.scrollTo({ x: scrollLeft - scrollAmount, y: 0 });
		checkScrollMax();
	});

	document.querySelector('#cases-scroller .scroller-next').addEventListener('click', e => {
		const scrollAmount = (document.body.clientWidth / 2);
		const scrollLeft = document.querySelector('#cases-scroller .scroller-outer').scrollLeft;		
		casesScroller.scrollTo({ x: scrollLeft + scrollAmount, y: 0 });
		checkScrollMax();
	});

	checkScrollMax();
}