let Doggo = function(){
	let name = "Maisey";
	let age = 1;
	let breed = "Collie Mix";

	//ES6 shorthand syntax
	this.getName = ()=>name;
	this.getAge = ()=>age;
	this.getBreed = ()=>breed;

	this.setName = (new_name) => { name = new_name}
	this.setAge = (new_age) => { age = new_age}
	this.setBreed = (new_breed) => { breed = new_breed}

}

let my_pupper = new Doggo;

	// this property is inaccessible directly
	// console.log(my_pupper.name);

	//property is exposed by the getName function
	console.log(my_pupper.getName());
	my_pupper.setName("Lord Woofington");
	console.log(my_pupper.getName());