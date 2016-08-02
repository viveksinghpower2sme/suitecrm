
function checkpan(pan){
	
	if(pan == undefined){
	
		return true;	
	}
		pan.toString();
		pan = pan.toUpperCase();
		if(pan.length != 10)
        {
            return false;
        }

        if( !(pan[3]=='A' || pan[3]=='B' || pan[3]=='C' || pan[3]=='F' || pan[3]=='G' || pan[3]=='H' || pan[3]=='L' || pan[3]=='J' || pan[3]=='P' || pan[3]=='T' || pan[3]=='K' ))
        {
            return false;
        }
        if( !((pan[0]>='A' && pan[0]<='Z') && (pan[1]>='A' && pan[1]<='Z') && (pan[2]>='A' && pan[2]<='Z') && (pan[3]>='A' && pan[3]<='Z') && (pan[4]>='A' && pan[4]<='Z'))) 

        {
            return false;
        }
        if( !((pan[5]>=0 && pan[5]<=9) && (pan[6]>=0 && pan[6]<=9) && (pan[7]>=0 && pan[7]<=9) && (pan[8]>=0 && pan[8]<=9) )) 

        {
            return false;
        }
        if( !((pan[9]>='A' && pan[9]<='Z'))) 

        {
            return false;
        }
        
        return true;
}
function checkcin(cin){
	
		if(cin == undefined){
		return true;	
	}
		cin.toString();
		cin = cin.toUpperCase();
	    if(cin.length != 21)
        {
            return false;
        }

        if(!(cin[0] == 'U' || cin[0] == 'L'))
        {
            return false;
        }
        if( !((cin[1]>=0 && cin[1]<=9) && (cin[2]>=0 && cin[2]<=9) && (cin[3]>=0 && cin[3]<=9) && (cin[4]>=0 && cin[4]<=9) && (cin[5]>=0 && cin[5]<=9) )) 

        {
            return false;
        }
        
								if(!(cin[6]>='A' && cin[6]<='Z') || !(cin[7]>='A' && cin[7]<='Z'))
								{
										return false;
								}        
        
        if( !((cin[8]>=0 && cin[8]<=9) && (cin[9]>=0 && cin[9]<=9) && (cin[10]>=0 && cin[10]<=9) && (cin[11]>=0 && cin[11]<=9))) 
       {
            return false;
        }

        if( !( (cin[12]=='P' && cin[13]=='L' && cin[14]=='C') || (cin[12]=='P' && cin[13]=='T' && cin[14]=='C')) )

        {
            return false;
        }
        if( !((cin[15]>=0 && cin[15]<=9) && (cin[16]>=0 && cin[16]<=9) && (cin[17]>=0 && cin[17]<=9) && (cin[18]>=0 && cin[18]<=9) && (cin[19]>=0 && cin[19]<=9) && (cin[20]>=0 && cin[20]<=9) )) 

        {
            return false;
        }
        return true;
}
function checktin(tin){
		tin.toString();
		tin = tin.toUpperCase();
		if(tin.length != 11)
        {
            return false;
        }

        if( !((tin[0]>=0 && tin[0]<=9) && (tin[1]>=0 && tin[1]<=9) && (tin[2]>=0 && tin[2]<=9) && (tin[3]>=0 && tin[3]<=9) && (tin[4]>=0 && tin[4]<=9) && (tin[5]>=0 && tin[5]<=9) && (tin[6]>=0 && tin[6]<=9) && (tin[7]>=0 && tin[7]<=9) && (tin[8]>=0 && tin[8]<=9) && (tin[9]>=0 && tin[9]<=9) && (tin[10]>=0 && tin[10]<=9))) 
        {
            return false;
        }

        return true;
}

function checkecc(ecc){
		ecc.toString();
		ecc = ecc.toUpperCase();
		if(ecc.length != 15)
        {
            return false;
        }

        
        if( !(ecc[3]=='A' || ecc[3]=='B' || ecc[3]=='C' || ecc[3]=='F' || ecc[3]=='G' || ecc[3]=='H' || ecc[3]=='L' || ecc[3]=='J' || ecc[3]=='P' || ecc[3]=='T' || ecc[3]=='K' ))
        {
            return false;
        }
        if( !((ecc[0]>='A' && ecc[0]<='Z') && (ecc[1]>='A' && ecc[1]<='Z') && (ecc[2]>='A' && ecc[2]<='Z') && (ecc[3]>='A' && ecc[3]<='Z') && (ecc[4]>='A' && ecc[4]<='Z'))) 

        {
            return false;
        }
        if( !((ecc[5]>=0 && ecc[5]<=9) && (ecc[6]>=0 && ecc[6]<=9) && (ecc[7]>=0 && ecc[7]<=9) && (ecc[8]>=0 && ecc[8]<=9) )) 

        {
            return false;
        }
        if( !((ecc[9]>='A' && ecc[9]<='Z'))) 

        {
            return false;
        }
        //-----------pan check till now
        if( !((ecc[10]=='X' && ecc[11]=='D') || (ecc[10]=='X' && ecc[11]=='M'))) 

        {
            return false;
        }
        if( !((ecc[12]==0 && ecc[13]==0 && ecc[14]==1) || (ecc[12]==0 && ecc[13]==0 && ecc[14]==2) || (ecc[12]==0 && ecc[13]==0 && ecc[14]==3) )) 

        {
            return false;
        }
        return true;
}