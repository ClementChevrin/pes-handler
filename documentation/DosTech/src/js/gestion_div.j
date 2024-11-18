function afficheId(baliseId)
{
  if (document.getElementById && document.getElementById(baliseId) != null)
  {
	  document.getElementById(baliseId).style.visibility='visible';
	  document.getElementById(baliseId).style.display='block';
  }
}

function afficheLigneId(baliseId)
{
  if (document.getElementById && document.getElementById(baliseId) != null)
  {
	  document.getElementById(baliseId).style.visibility='visible';
	  document.getElementById(baliseId).style.display='';
  }
}

function cacheId(baliseId)
{
  if (document.getElementById && document.getElementById(baliseId) != null)
  {
    document.getElementById(baliseId).style.visibility='hidden';
    document.getElementById(baliseId).style.display='none';
  }
}

function isHidden(baliseId)
{
	if (document.getElementById && document.getElementById(baliseId) != null)
	{
		  return (document.getElementById(baliseId).style.visibility == 'hidden'
			  || document.getElementById(baliseId).style.display == 'none');
	}
	return false;
}

function afficherLignes(indiceFin)
{		
	for (var int = indiceMax; int >=indiceFin ; int--)
	{
		afficheLigneId('ligne'+int);
	}
	if (indiceFin <= 1)
	{
		cacheId('plusinfos');
		afficheId('plusinfosespace');
	}
	afficheLigneId('moinsinfos');
	cacheId('moinsinfosespace');
}

function masquerLignes(indiceDebut)
{
	if (indiceDebut >= indiceMax - 1)
	{
		indiceDebut = indiceMax - 1;
	}
	for (var int = indiceDebut; int >=1 ; int--)
	{
		cacheId('ligne'+int);
	}
	if (indiceDebut == indiceMax-1)
	{
		cacheId('moinsinfos');
		afficheId('moinsinfosespace');
	}
	afficheLigneId('plusinfos');
	cacheId('plusinfosespace');
	
}

function indiceMaxLigneAAfficher()
{
	var indice = 0;
	for (var int = indiceMax; int >=1 ; int--)
	{
		if (isHidden('ligne'+int))
		{
			indice = int;
			break;
		}
	}
	return indice;
}

function indiceMinLigneACacher()
{
	var indice = 0;
	for (var int = 1; int <=indiceMax ; int++)
	{
		if (!isHidden('ligne'+int))
		{
			indice = int;
			break;
		}
	}
	return indice;
}
