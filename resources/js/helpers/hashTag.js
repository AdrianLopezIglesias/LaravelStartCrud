import hash from 'hashtags'

export default {
	getHashTag(text) {
		let hashtags = hash(text);
		if (hashtags) return hashtags
		return [];
		// const hashTag = text.match(/#[a-zA-Z0-9_]+/g);
	},
	getSetedHashTag(text) {
		console.log(text.match(/(^|\s)(#[a-z\d-]+ )/ig))
		text = text.match(/(^|\s)(#[a-z\d-]+ )/ig)
		if (!text) return ''
		text = text[0]
		text = text.replace('#', '')
		text = text.replace(' ', '')
		console.log(text)
		return text;
	},
	colorHashTagHTMl(text) {
		text = text.join(' ')
		return text.replace(/(^|\s)(#[a-z\d-]+)/ig, "$1<span style='color: blue'>$2</span>");
	},
	removeHashTag(text) {
		if (Array.isArray(text)) {
			return text = text.join(' ')
		}
		return text.replace(/(^|\s)(#[a-z\d-]+)/ig, "");
	}
}