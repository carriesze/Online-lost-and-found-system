function verifySignIn(){
    let userID = document.getElementById("userID").value;
    let password = document.getElementById("password").value;
    if(userID == ""){
        alert("Please fill in User ID field!");
    } else if(password == ""){
        alert("Please fill in Password field!");
    } else{
        document.getElementById('formSignIn').submit();
    }
}

function verifySignUp(){
    let userID = document.getElementById("userID").value;
    let password = document.getElementById("password").value;
    let passwordC = document.getElementById("passwordC").value;
    let nickname = document.getElementById("nickname").value;
    let email = document.getElementById("email").value;
    let gender = document.getElementById("gender").value;
    let img = document.getElementById("imageUpload").value;
    let birthday = document.getElementById("birthday").value;
    let date = Date.now();
    let d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    let today = [year, month, day].join('-');
    if(userID == ""){
        alert("Please fill in User ID field!");
    } else if(password == ""){
        alert("Please fill in Password field!");
    } else if(passwordC == ""){
        alert("Please fill in Confirm Password field!");
    } else if(nickname == ""){
        alert("Please fill in Nickname field!");
    } else if(email == ""){
        alert("Please fill in Email field!");
    } else if(gender == ""){
        alert("Please fill in Gender field!");
    } else if(img == ""){
        alert("Please fill in Profile Image field!");
    } else if(birthday >= today || birthday < "1900-1-1"){
        alert("Please fill in valid Birthday field!");
    } else if(password != passwordC){
        alert("Password and Confirm Password do not match!");
    } else if(password.length < 8){
        alert("Password must have at least 8 characters!");
    } else{
        document.getElementById('formSignUp').submit();
    }
}

function verifyCreateNotice(){
    let type = document.getElementById("type").value;
    let venue = document.getElementById("venue").value;
    let contact = document.getElementById("contact").value;
    let description = document.getElementById("description").value;
    let img = document.getElementById("imageUpload").value;
    let date = document.getElementById("date").value;
    let now = Date.now();
    let d = new Date(now),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    let today = [year, month, day].join('-');
    
    if(type == ""){
        alert("Please fill in Type field!");
    } else if(date > today || date == ""){
        alert("Please fill in valid date field!");
    } else if(venue == ""){
        alert("Please fill in Venue field!");
    } else if(contact == ""){
        alert("Please fill in Contact field!");
    } else if(description == ""){
        alert("Please fill in Description field!");
    } else if(img == ""){
        alert("Please fill in Profile Image field!");
    } else{
        document.getElementById('formCreateNotice').submit();
    }
}

function verifyForgotPW(){
    let userID = document.getElementById("userID").value;
    let email = document.getElementById("email").value;
    let birthday = document.getElementById("birthday").value;
    let date = Date.now();
    let d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    let today = [year, month, day].join('-');
    if(userID == ""){
        alert("Please fill in User ID field!");
    } else if(email == ""){
        alert("Please fill in Email field!");
    } else if(birthday >= today || birthday < "1900-1-1"){
        alert("Please fill in valid Birthday field!");
    } else{
		document.cookie = "resetID=" + userID + "; path=/";
        document.getElementById('formForgotPW').submit();
    }
}

function verifyResetPW(){
    let password = document.getElementById("password").value;
    let passwordC = document.getElementById("passwordC").value;
    if(password == ""){
        alert("Please fill in New Password field!");
    } else if(passwordC == ""){
        alert("Please fill in New Confirm Password field!");
    } else if(password != passwordC){
        alert("Password and Confirm Password do not match!");
    } else if(password.length < 8){
        alert("Password must have at least 8 characters!");
    } else{
        document.getElementById('formResetPW').submit();
    }
}

function verifyRespondNotice(){
    let noticeNo = document.getElementById("noticeNo").value;
    let respondMsg = document.getElementById("respondMsg").value;
	if(respondMsg == ""){
        alert("Please fill in respond field!");
    } else {
	document.getElementById('formCreateNotice').submit();
    }
}
