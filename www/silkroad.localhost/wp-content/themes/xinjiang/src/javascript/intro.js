//import typer from 'typer-js';

export default function createIntro(){

	// const element = document.querySelector('h1.main-title .upper');
	// element.innerText = '';
	// typer(element, 60).line('“Like we were enemies in a war”');
	setTimeout(e=>{
		document.querySelectorAll('.animate').forEach((el, i)=>{
			setTimeout(e=>{
				el.classList.add('on');
			}, el.dataset.delay);
		});		

	},0);

	setTimeout(e=>{
		document.querySelector('.hero img').classList.add('grow');
	}, 500);

}