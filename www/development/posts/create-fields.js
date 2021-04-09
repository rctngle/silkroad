const fs = require('fs');
const puppeteer = require('puppeteer');

// 

async function savePosts(postIds) {
	const browser = await puppeteer.launch();
	const page = await browser.newPage();
	await page.setViewport({
		width: 1140,
		height: 900,
		deviceScaleFactor: 1,
	});

	await page.goto('http://silkroad.localhost/wp-login.php');

	await page.type('#user_login', 'Rectangle');
	await page.type('#user_pass', 'Q17wrGn9qsYIRIMBPt');

	await Promise.all([
		page.click('#wp-submit'),
		page.waitForNavigation({ waitUntil: 'networkidle0' }),
	]);


	for (const postId of postIds) {
		await page.goto('http://silkroad.localhost/wp-admin/post.php?post=' + postId + '&action=edit');

		await Promise.all([
			page.click('#publish'),
			page.waitForNavigation({ waitUntil: 'networkidle0' }),
		]);

		console.log('saved', postId)
		// await page.screenshot({ path: postId + '.png' });
	}

	await browser.close();

	
}

const postTypes = JSON.parse(fs.readFileSync('post-ids.json'));

const postIds = [];
for (let postType in postTypes) {
	postTypes[postType].forEach(postId => postIds.push(postId));
}

console.log(postIds);
savePosts(postIds);
