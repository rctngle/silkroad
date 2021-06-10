import animateScrollTo from 'animated-scroll-to';

export default function createHeader() {

	document.querySelector('.mobile-nav-toggle').addEventListener('click', e => {
		document.querySelector('header').classList.toggle('open');
	});

	document.querySelectorAll('header nav a').forEach(navLink=>{
		navLink.addEventListener('click', e => {
			document.querySelector('header').classList.remove('open');
		});
	});
	document.querySelector('.scroll-down-continue').addEventListener('click', e => {
		e.preventDefault();
		animateScrollTo(document.querySelector('#report-list'), {
			verticalOffset: -200,
		});
	});
}