var email = document.getElementById("email");

email.addEventListener("input", function (event) {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I expect an e-mail, darling!");
  } else {
    email.setCustomValidity("");
  }
});

var mainfieldsLogin= 0;
var mainfieldsPassw= 0;
var mainfieldsPassw2= 0;
var mainfieldsEmail= 0;
var mainfieldsMob= 0;
var mainfieldsFirstName= 0;
var mainfieldsLastName= 0;

function loadbooks(catid, path){
	//alert(catid+' '+path);
	var http = new XMLHttpRequest();
		var url = '../loadbooks.php';
		var params = 'catid='+catid+'&path='+path;
		http.open('POST', url, true);

		//Send the proper header information along with the request
		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		http.onreadystatechange = function() {//Call a function when the state changes.
		    if(http.readyState == 4 && http.status == 200) {
		      //  alert(http.responseText);
		        $(".rowbooks").html(http.responseText);
		    }
		}
		http.send(params);

		
}

function checkLogin(){

 var isexist = false; 
 var login = document.getElementById("login").value;
 //alert(login);
 var l = login.length;
 
 if ( l ==0 ) {
			document.getElementById("login").className = "nomessage";
			document.getElementById("regbuttondisabled").style.display = "block";
			document.getElementById("regbuttonenabled").style.display = "none";
			mainfieldsLogin = 0;
			return false;
} else if ( l <= 2 ) {
			document.getElementById("login").className = "errormessage";
			document.getElementById("regbuttondisabled").style.display = "block";
			document.getElementById("regbuttonenabled").style.display = "none";
			mainfieldsLogin = 0;
			return false;
 } else {
			 
			if (l>=15) {
					document.getElementById("login").className = "errormessage";
					document.getElementById("regbuttondisabled").style.display = "block";
					document.getElementById("regbuttonenabled").style.display = "none";
					mainfieldsLogin = 0;
					return false;
			}

			$.ajax({
				method: "POST",
				url: "../checkifusernameisexist.php",
				data: { username: login }
		}).done(function( msg ) {
			//alert(msg);
			 if (msg > 0) {
				isexist = true;
				document.getElementById("login").className = "errormessage";
				document.getElementById("regbuttondisabled").style.display = "block";
				document.getElementById("regbuttonenabled").style.display = "none";
				mainfieldsLogin = 0;
				return false;
				
		   }

		});

			document.getElementById("login").className = "successmessage"; 
			mainfieldsLogin = 1;
			//alert(checkfirstname());
			if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1  && mainfieldsFirstName==1 && mainfieldsLastName==1) {
			document.getElementById("regbuttonenabled").style.display = "block";
			document.getElementById("regbuttondisabled").style.display = "none";
		  }
			return true;
 }

}



function checkpassw(){

	pass1 = document.getElementById("password").value;
	 
	var l = pass1.length;

	
	if ( l ==0 ) {
			 document.getElementById("password").className = "nomessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsPassw = 0;	 
			 return false;
 } else if ( l < 6 ) {
			 document.getElementById("password").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsPassw = 0;
			 return false;
	} else {
				
			 if (l>=15) {
					 document.getElementById("password").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";	
					 mainfieldsPassw = 0;	 
					 return false;
			 }
 
			
 
			 document.getElementById("password").className = "successmessage"; 
			 mainfieldsPassw = 1;
			 if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1 && mainfieldsFirstName==1 && mainfieldsLastName==1) {
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			 }
			 return true;
			 
	}
 
 }


 function checkpassw2(pass2){

	pass1 = document.getElementById("password").value;
	pass2 = document.getElementById("repassword").value;
	//alert(pass1); 
	var l = pass2.length;

	
	if ( l ==0 ) {
			 document.getElementById("repassword").className = "nomessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";	 
			 mainfieldsPassw2 = 0;
			 return false;
 } else if ( l < 6 ) {
			 document.getElementById("repassword").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsPassw2 = 0;
			 return false;
	} else {
		
		//alert(pass1+'   '+pass2);

			 if (l>=15) {
					 document.getElementById("repassword").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";	
					 mainfieldsPassw2 = 0;	 
					 return false;
			 }
 
			 if (pass1 != pass2) {
				document.getElementById("repassword").className = "errormessage";
				document.getElementById("regbuttondisabled").style.display = "block";
				document.getElementById("regbuttonenabled").style.display = "none";		
				mainfieldsPassw2 = 0; 
				return false;
		}
 
			 document.getElementById("repassword").className = "successmessage"; 
			 mainfieldsPassw2 = 1;
			 if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1 && mainfieldsFirstName==1 && mainfieldsLastName==1) {
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			 }
			 return true;
	}
 
 }


 function isPossiblyValidEmail(txt) {
	return txt.length > 5 && txt.indexOf('@')>0;
}

 function checkemail(){

	email = document.getElementById("email").value;
	 
	var l = email.length;

	
	if ( l ==0 ) {
			 document.getElementById("email").className = "nomessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsEmail = 0;	 
			 return false;
 } else if ( l < 6 ) {
			 document.getElementById("email").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsEmail = 0;
			 return false;
	} else {
				
			 if (l>=35) {
					 document.getElementById("email").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";		
					 mainfieldsEmail = 0; 
					 return false;
			 }
 
			
			 // pattern check
			 if (!isPossiblyValidEmail(email) ){
				document.getElementById("email").className = "errormessage";
				document.getElementById("regbuttondisabled").style.display = "block";
				document.getElementById("regbuttonenabled").style.display = "none";		
				mainfieldsEmail = 0; 
				return false;
			 }


		$.ajax({
				method: "POST",
				url: "../checkifemailisexist.php",
				data: { emailcheck: email }
		}).done(function( msg ) {
			//alert(msg);
			 if (msg > 0) {
				isexist = true;
				document.getElementById("email").className = "errormessage";
				document.getElementById("regbuttondisabled").style.display = "block";
				document.getElementById("regbuttonenabled").style.display = "none";
				mainfieldsEmail = 0;
				return false;
				
		   }

		});
 
			 document.getElementById("email").className = "successmessage"; 
			 mainfieldsEmail = 1;
			 if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1 && mainfieldsFirstName==1 && mainfieldsLastName==1) {
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			 }
			 return true;
	}
 
 }

 function isNum(obj, strict) {
	var strict = strict === true ? true : false;
	if (strict) {
			return !isNaN(obj) && obj instanceof Number ? true : false;
	} else {
			return !isNaN(obj - parseFloat(obj));
	}
}

 function checkmob(){

	mob = document.getElementById("mob").value;
	 
	var l = mob.length;

	
	if ( l ==0 ) {
			 document.getElementById("mob").className = "nomessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";	
			 mainfieldsMob = 0; 
			 return false;
 } else if ( l < 9 ) {
			 document.getElementById("mob").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsMob = 0;
			 return false;
	} else {
				
			 if (l>=14) {
					 document.getElementById("mob").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";	
					 mainfieldsMob = 0;	 
					 return false;
			 }
 
			
			 // pattern check
			 if (!isNum(mob)) {
				   document.getElementById("mob").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";	
					 mainfieldsMob = 0;	 
					 return false;
		   }
 
			 document.getElementById("mob").className = "successmessage"; 
			 mainfieldsMob = 1;
			 if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1 && mainfieldsFirstName==1 && mainfieldsLastName==1) {
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			 }
			 return true;
	}
 
 }



 function checkfirstname(){

	fname = document.getElementById("fname").value;
	 
	var l = fname.length;

	
	if ( l ==0 ) {
			 document.getElementById("fname").className = "nomessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsFirstName = 0;	 
			 return false;
 } else if ( l < 4 ) {
			 document.getElementById("fname").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsFirstName = 0;
			 return false;
	} else {
				
			 if (l>=15) {
					 document.getElementById("fname").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";
					 mainfieldsFirstName = 0;		 
					 return false;
			 }
 
			
 
			 document.getElementById("fname").className = "successmessage"; 
			 mainfieldsFirstName = 1;
			 if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1 && mainfieldsFirstName==1 && mainfieldsLastName==1) {
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			 }
			 return true;
	}
 
 }



 function checklastname(){

	lname = document.getElementById("lname").value;
	 
	var l = lname.length;

	
	if ( l ==0 ) {
			 document.getElementById("lname").className = "nomessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsLastName = 0;	 
			 return false;
 } else if ( l < 4 ) {
			 document.getElementById("lname").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 mainfieldsLastName = 0;	 
			 return false;
	} else {
				
			 if (l>=15) {
					 document.getElementById("lname").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";
					 mainfieldsLastName = 0;	 		 
					 return false;
			 }
 
			
 
			 document.getElementById("lname").className = "successmessage"; 
			 mainfieldsLastName = 1;	 

			 if (mainfieldsLogin==1 && mainfieldsPassw==1 && mainfieldsPassw2==1 && mainfieldsEmail==1 &&  mainfieldsFirstName==1 && mainfieldsLastName==1) {
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			 }
			 
			 
			 return true;
	}
 
 }


 function checkPromo(){
  
	
	var promokod = document.getElementById("promokod").value;
	var l = promokod.length;
    console.log(l);
	
    if ( ( l > 0 ) && ( l < 10 )) {
			 document.getElementById("promokod").className = "errormessage";
			 document.getElementById("regbuttondisabled").style.display = "block";
			 document.getElementById("regbuttonenabled").style.display = "none";
			 
			 return false;
	} else if (l>10) {
					 document.getElementById("promokod").className = "errormessage";
					 document.getElementById("regbuttondisabled").style.display = "block";
					 document.getElementById("regbuttonenabled").style.display = "none";		
					 
					 return false;
			
	}
    else {	



		$.ajax({
				method: "POST",
				url: "../checkifpromokodisexist.php",
				data: { promokodcheck: promokod }
		}).done(function( msg ) {
			//alert(msg);
			 if (!(msg > 0)) {
				isexist = true;
				document.getElementById("promokod").className = "errormessage";
				document.getElementById("regbuttondisabled").style.display = "block";
				document.getElementById("regbuttonenabled").style.display = "none";
				
				return false;
				
		   }

		});
 
			 document.getElementById("promokod").className = "successmessage"; 
			 
			 
			 document.getElementById("regbuttonenabled").style.display = "block";
			 document.getElementById("regbuttondisabled").style.display = "none";
			
			 return true;
	}
 
 }
