export default function createTakeAction(){
	document.querySelectorAll('.take-action-container').forEach(container => {
		container.querySelectorAll('.take-action-button, .take-action').forEach(actionButton=>{
			actionButton.addEventListener('click', e=>{
				// container.classList.add('display-iframe');
			});
		});
	});
}

