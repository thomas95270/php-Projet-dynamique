"use strict";
//vehicules.php = select agence

let getAgence = document.querySelector("#id_agence");
console.log(getAgence);
let getAgenceValue;
console.log(getAgenceValue);
getAgence.addEventListener("change"),
	(event) => {
		getAgenceValue = document.querySelector("#agence").value;
		console.log(getAgenceValue);
		return getAgenceValue;
	};
