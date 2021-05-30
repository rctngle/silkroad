export default function createHeader() {

	document.querySelector('.mobile-nav-toggle').addEventListener('click', e=>{
		document.querySelector('header').classList.toggle('open');
	});
}