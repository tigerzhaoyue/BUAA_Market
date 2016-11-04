var NowImg = 1;
var bStart = 0;
var bStop =0;

function fnToggle() 
{
	var next = NowImg + 1;

	if(next == MaxImg+1) 
	{
		NowImg = MaxImg;
		next = 1;
	}
	if(bStop!=1)
	{

		if(bStart == 0)
		{
			bStart = 1;		
			setTimeout('fnToggle()', 3000);
			return;
		}
		else
		{
			oTransContainer.filters[0].Apply();

			document.images['oDIV'+next].style.display = "";
			document.images['oDIV'+NowImg].style.display = "none"; 

			oTransContainer.filters[0].Play(duration=2);

			if(NowImg == MaxImg) 
				NowImg = 1;
			else
				NowImg++;
		}
		setTimeout('fnToggle()', 3000);
	}
}


function toggleTo(img)
{
	bStop=1;
	if(img==1)
	{
			document.images['oDIV1'].style.display = "";
			document.images['oDIV2'].style.display = "none"; 
			document.images['oDIV3'].style.display = "none"; 
			document.images['oDIV4'].style.display = "none"; 
	}
	else if(img==2)
	{
			document.images['oDIV2'].style.display = "";
			document.images['oDIV1'].style.display = "none"; 
			document.images['oDIV3'].style.display = "none"; 
			document.images['oDIV4'].style.display = "none"; 
	}
	else if(img==3)
	{
			document.images['oDIV3'].style.display = "";
			document.images['oDIV1'].style.display = "none"; 
			document.images['oDIV2'].style.display = "none"; 
			document.images['oDIV4'].style.display = "none"; 
	}
	else if(img==4)
	{
			document.images['oDIV4'].style.display = "";
			document.images['oDIV1'].style.display = "none"; 
			document.images['oDIV2'].style.display = "none"; 
			document.images['oDIV3'].style.display = "none"; 
	}

}