export default function createFootnotes(){
	document.querySelectorAll('sup').forEach(sup=>{
		sup.addEventListener('click', e => {
			if (e.target.tagName !== 'A') {
				e.preventDefault();
			} else {
				if(sup.classList.contains('show')){
					sup.classList.remove('show');
				} else {
					document.querySelectorAll('sup').forEach(item=>{
						item.classList.remove('show');
					});
					sup.classList.add('show');	
					const bbox = sup.getBoundingClientRect();
					if(bbox.x > window.innerWidth * 0.6){
						sup.classList.add('show-right');
					}
				}
			}
		});
	});
}
