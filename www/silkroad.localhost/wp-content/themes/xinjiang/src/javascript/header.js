import animateScrollTo from 'animated-scroll-to';

export default function createHeader() {

	document.querySelector('.mobile-nav-toggle').addEventListener('click', e => {
		document.querySelector('header').classList.toggle('open');
	});

	document.querySelector('#report-list-link').addEventListener('click', e => {
		e.preventDefault();
		animateScrollTo(document.querySelector('#introduction'), {
			verticalOffset: -200,
		});
	});
}