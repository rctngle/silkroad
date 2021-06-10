window.onload = () => {
	setTimeout(() => {
		const iframes = document.querySelectorAll('.uyghur iframe');
		iframes.forEach(iframe => {
			iframe.contentWindow.document.body.style.direction = 'RTL';
		});
		
	}, 1000);
};

