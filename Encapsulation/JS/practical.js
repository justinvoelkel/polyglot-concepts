let Session = function(id, username, token, expires){
	// getters
	this.getId = ()=>id;
	this.getUsername = ()=>username;
	this.getToken = ()=>token;
	this.getExpires = ()=>expires;

	// setters
	this.setToken = (new_token)=>{token = new_token}
	this.setExipres = (new_expires)=>{expires = new_expires}
}

// an array for the active user sessions
let sessions = [];

// some users that we want to track sessions for
let users_payload = [
	{
		id: 1,
		username: "maisey",
		token: "7dqapkcrck",
		expires: "1520985600"
	},
	{
		id: 2,
		username: "lrdwoofer",
		token: "z47ah6f46u",
		expires: "1532476800"
	},
]

users_payload.forEach(function(user){
	//ES6 destructuring to indv values to pass to new session
	let {id, username, token, expires} = user;
	sessions.push(new Session(id, username, token, expires))
})

// user data is sensitive and shouldn't be exposed unless we specfically say it should be
// result is undefined
// console.log(sessions[0].id);

// this private data can be exposed explicitly through our getters
// result is 1
// console.log(sessions[0].getId());

// User maisey's initial token
// console.log(sessions[0].getToken());


// maybe we have some sort of keep-alive logic built into the app that updates the users session
// we don't want to touch the evergreen 'id' and 'username' properties
// so we just expose the editable properties 'token' and 'expires'

// simulate the update response from an api - out of order intentionally
let update_payload = [
	{
		id:2,
		token: "p7lpcwi5ww",
		expires: "1564012800"
	},
	{
		id:1,
		token: "yip0lm5tzm",
		expires: "1552521600"
	}
]
update_payload.forEach(function(update){
	let {id, token, expires} = update;
	user_session = sessions.find((s)=>{
		return s.getId() == id
	})
	// Update the appropriate values with our new updated token and expires time
	user_session.setToken(token);
	user_session.setExipres(expires);
});

// User maisey's updated token
// console.log(sessions[0].getToken());

