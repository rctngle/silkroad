//import typer from 'typer-js';

export default function createIntro(){	
	tryCreateIntro();
}

function tryCreateIntro() {
	
	if (document.querySelector('.hero img')) {

		setTimeout(e=>{
			document.querySelectorAll('.animate').forEach((el, i)=>{
				setTimeout(e=>{
					el.classList.add('on');
				}, el.dataset.delay);
			});		

		},0);

		setTimeout(e=>{
			document.querySelector('.hero img').classList.add('grow');
		}, 400);
	} else {
		setTimeout(() => {
			tryCreateIntro();			
		}, 100);
	}

}