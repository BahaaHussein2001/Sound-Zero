document.getElementById("MyForm").addEventListener("submit",sendEmail);

function sendEmail(e){
    e.preventDefault();
    let firstname = document.getElementById("fname").value;
    let lastname = document.getElementById("lname").value;
    let country = document.getElementById("country").value;
    let subject = document.getElementById("subject").value;
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "fatema.elyan36@gmail.com",
        Password : "FF380A0A8836B62B908D516F3B4D4D349360",
        To : 'tchestnutjr@gmail.com,bahaahussein777@gmail.com',
        From : "fatema.elyan36@gmail.com",
        Subject : "This is the subject",
        Body : firstname + " " + lastname + "; " + country + ": <br>" + subject
    }).then(
      message => alert(message)
    );
    }