// <script src="../Scripts/inscription.js"></script>
//affichage
function verifMdp(){
	var mdpField1 = document.getElementById("mdp_field_1");
	var mdpField2 = document.getElementById("mdp_field_2");
	if(mdpField1.value == mdpField2.value){
		mdpField2.setCustomValidity('');
	}else{
		mdpField2.setCustomValidity("Le mot de passe doit etre le meme");
	}
}

onload = function(){
	var mdpField2 = document.getElementById("mdp_field_2");
	mdpField2.setCustomValidity("Le mot de passe doit etre le meme");
	verifMdp();
};