export default function createFootnotes(){
	document.querySelectorAll('sup').forEach(sup=>{
		sup.addEventListener('click', e=>{
			e.preventDefault();
			document.querySelectorAll('sup').forEach(item=>{
				item.classList.remove('show');
			});
			sup.classList.add('show');
		});
	});
}
