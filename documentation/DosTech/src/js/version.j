
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}


function afficherDateMAJ()
{
  var derniereModif = document.lastModified;
  var dateModif = new Date(derniereModif);
  var jour = dateModif.getDate();
  var mois = dateModif.getMonth()+1;
  var annee = dateModif.getFullYear();
  var heures = dateModif.getHours();
  var minutes = dateModif.getMinutes();
  var secondes = dateModif.getSeconds();
  var sortie_heure = ((heures < 10) ? "0" + heures : heures);
  var sortie_minute = ((minutes < 10) ? "0" + minutes : minutes);
  var sortie_seconde = ((secondes < 10) ? "0" + secondes : secondes);

  document.write("mis a jour le "+jour+" / "+mois+" / "+annee+" a� "+sortie_heure+":"+sortie_minute+":"+sortie_seconde);
}

function afficherVersion(p_numero_version)
{
  document.write("version "+p_numero_version);
}

function afficherVersionEtDateMAJ(p_numero_version)
{
  afficherVersion(p_numero_version);
  document.write(" - ")
  afficherDateMAJ();
}

//version du document
createCookie('v_doc','7.24',0);
createCookie('hd_maj','25/10/2022',0);
createCookie('v_helios','V5.19',0);