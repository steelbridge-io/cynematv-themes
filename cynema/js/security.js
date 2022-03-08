const jwt = require('jsonwebtoken');
const Time = new Date();

const API_SECRET = 'uNbqQG5YaepxwaLGZ0DjB8NK';

/**
	* Generatea a URL with signature.
	* @param {string} path
	* @param {string} host
	* @returns {string} signed URL
	*/
function jwt_signed_url(path, host = 'https://cdn.jwplayer.com') {
	const token = jwt.sign(
		{
			exp: Math.ceil((Time.getTime() + 3600) / 300) * 300,
			resource: path,
		},
		API_SECRET
	);
	
	return `${host}${path}?token=${token}`;
}

const media_id = 'jfhE61HP';
const path = `/v2/media/${media_id}`;
const url = jwt_signed_url(path);

console.log(url);
