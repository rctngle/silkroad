const fs = require('fs');
const util = require('util');
const jsdom = require('jsdom');
const { JSDOM } = jsdom;
const striptags = require('striptags');

let content = fs.readFileSync(__dirname + '/report-in.html', 'utf8').toString();
let dom = new JSDOM(content);
let doc = dom.window.document;

let structure = {}
let chapter = 0;
let section = 0
let current

doc.querySelectorAll('a.footnote-ref').forEach(a => {
	const sup = a.querySelector('sup');
	const num = parseInt(sup.textContent)
	if (num > 0) {
		const footnote = doc.querySelector('li#fn'+num);
		const footnoteBack = footnote.querySelector('.footnote-back');
		footnoteBack.parentNode.removeChild(footnoteBack)

		const footnoteLinks = footnote.querySelectorAll('a');

		const numFootnoteLinks = footnoteLinks.length;
		footnoteLinks.forEach(footnoteLink => {
			const footnoteLinkHREF = footnoteLink.getAttribute('href');
			const footnoteLinkA = doc.createElement('a');
			footnoteLinkA.setAttribute('class', 'fn-ext-link');
			footnoteLinkA.setAttribute('target', '_blank');
			footnoteLinkA.setAttribute('href', footnoteLinkHREF);
			footnoteLinkA.innerHTML = '&rarr;'

			footnoteLink.parentNode.insertBefore(footnoteLinkA, footnoteLink);

			// '<a class="fn-link" href="' + footnoteLinkHREF + '"></a>';
			// if (numFootnoteLinks == 1) {
			// 	footnote.appendChild(footnoteLinkA);
			// } else {
			// }
		})

		footnoteLinks.forEach(footnoteLink => {
			footnoteLink.parentNode.removeChild(footnoteLink);
		});


		const footnoteP = footnote.querySelector('p');
		if (!footnoteP) {
		}


		let footenoteContent = footnote.innerHTML.replace(/\s\s+/g, ' ')
			.replace(/, <a/g, ' <a')
			.replace(/ ;/g, ';')
			.trim();
		footenoteContent = striptags(footenoteContent, ['a', 'sup', 'em', 'br']);

		console.log(footenoteContent); 

		a.insertAdjacentHTML('afterend', ' [[[' + footenoteContent + ']]]');
		a.parentNode.removeChild(a)
	}
})


const html = doc.documentElement.outerHTML;
fs.writeFileSync('report-out.html', html);

content = fs.readFileSync(__dirname + '/report-out.html', 'utf8').toString();
dom = new JSDOM(content);
doc = dom.window.document;

function getTitle(str) {
	const words = str.split(' ');
	const firstWord = words[0];
	const firstLetter = firstWord.substr(0, 1);
	if (isNaN(parseInt(firstLetter))) {
		return str;
	} else {
		words.shift()
		const title = words.join(' ');
		return title
	}
}

let rootType = 'introduction';

for (let i in doc.querySelector('body').children) {
	const el = doc.querySelector('body').children[i]


	if (el.tagName == 'H1' && el.textContent != 'Contents' && el.textContent != 'Methodology') {
		chapter++;
		const title = getTitle(el.textContent);
		
		if (title === 'Conclusion') {
			rootType = 'conclusion';
		}
		
		structure['chapter_' + chapter] = {
			type: rootType,
			title: title,
			content: '',
			sections: {},
		}

		current = structure['chapter_' + chapter]
		section = 0;

		if (title === 'Executive Summary') {
			rootType = 'chapter';
		}

	} else if (el.tagName == 'H2' || el.tagName == 'H3' || el.textContent == 'Methodology') {
		section++;
		let title = getTitle(el.textContent);
		
		let type = 'section';
		if (title.toUpperCase().indexOf('NON-LEGAL TEXT BOX:') >= 0) {
			type = 'text-box';
			title = title.replace(/NON-LEGAL TEXT BOX:?/, '').trim();
		} else if (title.toUpperCase().indexOf('NON-LEGAL TEXT BOX') >= 0) {
			type = 'text-box';
			title = title.replace(/NON-LEGAL TEXT BOX:?/, '').trim();
		} else if (title.toUpperCase().indexOf('LEGAL TEXT BOX') >= 0) {
			type = 'legal-text';
			title = title.replace(/LEGAL TEXT BOX:?/, '').trim();
		} else if (title.toUpperCase().indexOf('TEXT BOX') >= 0) {
			type = 'legal-text';
			title = title.replace(/TEXT BOX:?/, '').trim();
		}

		structure['chapter_' + chapter].sections['section_' + section] = {
			type: type,
			title: title,
			content: '',			
		};

		current = structure['chapter_' + chapter].sections['section_' + section]

	} else if (chapter > 0) {
		if (el.tagName !== 'SECTION' && el.outerHTML) {
			const content = el.outerHTML;

			if (el.querySelector('strong') && el.textContent.substr(0, 1) == '“') {
				current.content += '<blockquote>' + el.innerHTML + '</blockquote>';
			} else {
				current.content += el.outerHTML;
			}
		}
	}
}

fs.writeFileSync('report-out.json', JSON.stringify(structure));
