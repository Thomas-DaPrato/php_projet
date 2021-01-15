// <script src="scripts/inscription.js"></script> 

function verifMdp(){
	var mdpField1 = document.getElementById("mdp_field_1");
	var mdpField2 = document.getElementById("mdp_field_2");
	var submitButton = document.getElementById("submit_button");
	if(mdpField1.value == mdpField2.value){
		submitButton.disabled = false;
	}else{
		submitButton.disabled = true;
	}
}