/*

		All Java script function are declared here.... 

*/


function regExpCharactersOnly(charactersOnly) {
  var regularExpression = /^[a-zA-Z]+$/;
  return regularExpression.test(charactersOnly);
}

function naijaMobileNumbers(charactersOnly) {
  var regularExpression = /^[0]\d{10}$/;
  return regularExpression.test(charactersOnly);
}

function regExpCharAndNumAndSpace(charAndNumAndSpace) {
  var regularExpression = /^[a-zA-Z0-9 _]*[a-zA-Z0-9][a-zA-Z0-9 _]*$/;
  return regularExpression.test(charAndNumAndSpace);
}

function regExpEmail(email){
  var regularExpression = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regularExpression.test(email);   
}

///
/// A Function to redirect or navigation to a new url
///

function loadnewpage(url){
	
	location.href = url;
		
}

///
/// A Function to generate current date
///

function today(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 

        today = mm + '/' + dd + '/' + yyyy;

        return today;
      }

///
/// A Function to generate current Time
///
      function time(){
        var today = new Date();
        var hr = today.getHours();
        var min = today.getMinutes(); 
        var sec = today.getSeconds(); 


        if(hr<10) {
            hr = '0'+hr;
        } 

        if(min<10) {
            min = '0'+min;
        } 

        if(sec<10) {
            sec = '0'+sec;
        } 

        return hr + ":" + min + ":" + sec;
      }