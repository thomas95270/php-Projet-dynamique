"use strict";
// dashboard, evenement boutons=renoie vers pages
let gestion_membres = document.querySelector("#gestion_membres");
let gestion_vehicules = document.querySelector("#gestion_vehicules");
let gestion_agences = document.querySelector("#gestion_agences");

gestion_membres.addEventListener("click", function () {
	document.location.href = "membres.php";
});
gestion_vehicules.addEventListener("click", function () {
	document.location.href = "vehicules.php";
});
gestion_agences.addEventListener("click", function () {
	document.location.href = "agences.php";
});

