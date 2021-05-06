export default function createTakeAction(){
	document.querySelectorAll('.take-action-button, .take-action').forEach(actionButton=>{
		actionButton.addEventListener('click', e=>{
			document.querySelector('#take-action').classList.add('display-iframe');
		});
	});
}

