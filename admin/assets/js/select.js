"use strict";
//vehicules.php = select agence

var getAgence;
console.log("tortue");
let returnIdAgence = () => {
	getAgence = document.querySelector("#id_agence").value;
	console.log(getAgence);
	return getAgence;
};

function getSelectedAgenceId(){
	return getAgence;
}