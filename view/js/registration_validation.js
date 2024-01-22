function validateRegForm(pform) {
    let flag = true;
    const check = pform.submitAction.value;
    if (check == 'registration') {
        console.log("ok");
        //first part
        //general information
        const firstname = pform.firstname.value;
        const lastname = pform.lastname.value;
        const fathersname = pform.fathersname.value;
        const mothersname = pform.mothersname.value;
        const gender = pform.gender.value;
        const bloodgroup = pform.bloodgroup.value;
        const religion = pform.religion.value;

        //contact information
        const Email = pform.Email.value;
        const phone = pform.phone.value;
        const website = pform.website.value;
        const country = pform.country.value;
        const division = pform.division.value;
        const rsc = pform.rsc.value;
        const postcode = pform.postcode.value;

        //academic information
        const SSCScName = pform.SSCScName.value;
        const SSCGPA = pform.SSCGPA.value;
        const SSCPY = pform.SSCPY.value;

        const HSCClgName = pform.HSCClgName.value;
        const HSCGPA = pform.HSCGPA.value;
        const HSCPY = pform.HSCPY.value;

        const BScUnName = pform.BScUnName.value;
        const BScCGPA = pform.BScCGPA.value;
        const BScPY = pform.BScPY.value;

        const MScUnName = pform.MScUnName.value;
        const MScCGPA = pform.MScCGPA.value;
        const MScPY = pform.MScPY.value;

        //security questions
        const sq1 = pform.sq1.value;
        const sq2 = pform.sq2.value;
        const sq3 = pform.sq3.value;
        const sq4 = pform.sq4.value;
        const sq5 = pform.sq5.value;
        const sq6 = pform.sq6.value;

        //account information
        const username = pform.username.value;
        const password = pform.password.value;
        const confirm_password = pform.confirm_password.value;

        //second part
        //general information
        const firstnameErr = document.getElementById('firstnameErr');
        const lastnameErr = document.getElementById('lastnameErr');
        const fathersnameErr = document.getElementById('fathersnameErr');
        const mothersnameErr = document.getElementById('mothersnameErr');
        const genderErr = document.getElementById('genderErr');
        const bloodgroupErr = document.getElementById('bloodgroupErr');
        const religionErr = document.getElementById('religionErr');

        //contact information
        const emailErr = document.getElementById('emailErr');
        const phoneErr = document.getElementById('phoneErr');
        const websiteErr = document.getElementById('websiteErr');
        const countryErr = document.getElementById('countryErr');
        const divisionErr = document.getElementById('divisionErr');
        const rscErr = document.getElementById('rscErr');
        const postcodeErr = document.getElementById('postcodeErr');

        //academic information
        const SSCScNameErr = document.getElementById('SSCScNameErr');
        const SSCGPAErr = document.getElementById('SSCGPAErr');
        const SSCPYErr = document.getElementById('SSCPYErr');

        const HSCClgNameErr = document.getElementById('HSCClgNameErr');
        const HSCGPAErr = document.getElementById('HSCGPAErr');
        const HSCPYErr = document.getElementById('HSCPYErr');

        const BScUnNameErr = document.getElementById('BScUnNameErr');
        const BScCGPAErr = document.getElementById('BScCGPAErr');
        const BScPYErr = document.getElementById('BScPYErr');

        const MScUnNameErr = document.getElementById('MScUnNameErr');
        const MScCGPAErr = document.getElementById('MScCGPAErr');
        const MScPYErr = document.getElementById('MScPYErr');

        //security questions
        const sqErr = document.getElementById('sqErr');

        //account information
        const usernameErr = document.getElementById('usernameErr');
        const passwordErr = document.getElementById('passwordErr');
        const confirmpasswordErr = document.getElementById('confirmpasswordErr');

        //third part
        //genral information
        firstnameErr.innerHTML = "";
        lastnameErr.innerHTML = "";
        fathersnameErr.innerHTML = "";
        mothersnameErr.innerHTML = "";
        genderErr.innerHTML = "";
        bloodgroupErr.innerHTML = "";
        religionErr.innerHTML = "";

        //contact information
        emailErr.innerHTML = "";
        phoneErr.innerHTML = "";
        websiteErr.innerHTML = "";
        countryErr.innerHTML = "";
        divisionErr.innerHTML = "";
        rscErr.innerHTML = "";
        postcodeErr.innerHTML = "";

        //academic information
        SSCScNameErr.innerHTML = "";
        SSCGPAErr.innerHTML = "";
        SSCPYErr.innerHTML = "";
        HSCClgNameErr.innerHTML = "";
        HSCGPAErr.innerHTML = "";
        HSCPYErr.innerHTML = "";
        BScUnNameErr.innerHTML = "";
        BScCGPAErr.innerHTML = "";
        BScPYErr.innerHTML = "";
        MScUnNameErr.innerHTML = "";
        MScCGPAErr.innerHTML = "";
        MScPYErr.innerHTML = "";

        //security question
        sqErr.innerHTML = "";

        //account information
        usernameErr.innerHTML = "";
        confirmpasswordErr.innerHTML = "";
        passwordErr.innerHTML = "";

        if (firstname === "") {
            firstnameErr.innerHTML = 'Please enter a firstname.';
            firstnameErr.style.color = "orange";
            flag = false;
        }
        if (lastname === "") {
            lastnameErr.innerHTML = 'Please enter a lastname.';
            lastnameErr.style.color = "orange";
            flag = false;
        }
        if (fathersname === "") {
            fathersnameErr.innerHTML = 'Please enter a fathersname.';
            fathersnameErr.style.color = "orange";
            flag = false;
        }

        if (mothersname === "") {
            mothersnameErr.innerHTML = 'Please enter a mothersnamename.';
            mothersnameErr.style.color = "orange";
            flag = false;
        }
        if (gender === "") {
            genderErr.innerHTML = 'Please enter a gender.';
            genderErr.style.color = "orange";
            flag = false;
        }

        if (bloodgroup === "") {
            bloodgroupErr.innerHTML = 'Please enter a bloodgroup.';
            bloodgroupErr.style.color = "orange";
            flag = false;
        }
        if (religion === "") {
            religionErr.innerHTML = 'Please enter a religion.';
            religionErr.style.color = "orange";
            flag = false;
        }

        //contact information
        if (Email === "") {
            emailErr.innerHTML = 'Please enter a email.';
            emailErr.style.color = "orange";
            flag = false;
        } else {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(Email)) {
                emailErr.innerHTML = 'Please enter a valid email address.';
                emailErr.style.color = "orange";
                flag = false;
            }
        }

        if (phone === "") {
            phoneErr.innerHTML = 'Please enter a phone.';
            phoneErr.style.color = "orange";
            flag = false;
        }
        if (country === "") {
            countryErr.innerHTML = 'Please enter a country.';
            countryErr.style.color = "orange";
            flag = false;
        }
        if (division === "") {
            divisionErr.innerHTML = 'Please enter a division.';
            divisionErr.style.color = "orange";
            flag = false;
        }

        const urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;
        if (website != "" && !urlRegex.test(website)) {
            websiteErr.innerHTML = 'Please enter a valid website URL.';
            websiteErr.style.color = "orange";
            flag = false;
        }

        if (rsc === "") {
            rscErr.innerHTML = 'Please enter a rsc.';
            rscErr.style.color = "orange";
            flag = false;
        }
        if (postcode === "") {
            postcodeErr.innerHTML = 'Please enter a postcode.';
            postcodeErr.style.color = "orange";
            flag = false;
        }

        //academic 
        //ssc
        if (SSCScName === "") {
            SSCScNameErr.innerHTML = 'Please enter a SSCScName.';
            SSCScNameErr.style.color = "orange";
            flag = false;
        }
        if (SSCGPA === "") {
            SSCGPAErr.innerHTML = 'Please enter a SSCGPA.';
            SSCGPAErr.style.color = "orange";
            flag = false;
        }
        if (SSCPY === "") {
            SSCPYErr.innerHTML = 'Please enter a SSCPY.';
            SSCPYErr.style.color = "orange";
            flag = false;
        }
        //hsc
        if (HSCClgName === "") {
            HSCClgNameErr.innerHTML = 'Please enter a HSCClgName.';
            HSCClgNameErr.style.color = "orange";
            flag = false;
        }
        if (HSCGPA === "") {
            HSCGPAErr.innerHTML = 'Please enter a HSCGPA.';
            HSCGPAErr.style.color = "orange";
            flag = false;
        }
        if (HSCPY === "") {
            HSCPYErr.innerHTML = 'Please enter a HSCPY.';
            HSCPYErr.style.color = "orange";
            flag = false;
        }

        //BSc
        if (BScUnName === "") {
            BScUnNameErr.innerHTML = 'Please enter a BScUnName.';
            BScUnNameErr.style.color = "orange";
            flag = false;
        }
        if (BScCGPA === "") {
            BScCGPAErr.innerHTML = 'Please enter a BScCGPA.';
            BScCGPAErr.style.color = "orange";
            flag = false;
        }
        if (BScPY === "") {
            BScPYErr.innerHTML = 'Please enter a BScPY.';
            BScPYErr.style.color = "orange";
            flag = false;
        }
        //MSc
        if (MScUnName === "") {
            MScUnNameErr.innerHTML = 'Please enter a MScUnName.';
            MScUnNameErr.style.color = "orange";
            flag = false;
        }
        if (MScCGPA === "") {
            MScCGPAErr.innerHTML = 'Please enter a MScCGPA.';
            MScCGPAErr.style.color = "orange";
            flag = false;
        }
        if (MScPY === "") {
            MScPYErr.innerHTML = 'Please enter a MScPY.';
            MScPYErr.style.color = "orange";
            flag = false;
        }

        //Security Questions
        let count = 0;
        if (sq1 === "") count++;
        if (sq2 === "") count++;
        if (sq3 === "") count++;
        if (sq4 === "") count++;
        if (sq5 === "") count++;
        if (sq6 === "") count++;
        if (count > 3) {
            sqErr.innerHTML = "*You have to answer atleast 3 questions and also you have to answer all the questions you setted when you registered!";
            sqErr.style.color = "red";
            flag = false;
        }

        //acount information
        if (username === "") {
            usernameErr.innerHTML = 'Please enter a username.';
            usernameErr.style.color = "orange";
            flag = false;
        }

        if (password === "") {
            passwordErr.innerHTML = 'Please enter a password.';
            passwordErr.style.color = "orange";
            flag = false;
        } else if (password.length < 8) {
            passwordErr.innerHTML = 'Password must be at least 8 characters long.';
            passwordErr.style.color = "red";
            flag = false;
        }

        if (confirm_password === "") {
            confirmpasswordErr.innerHTML = 'Please enter confirm a password.';
            confirmpasswordErr.style.color = "orange";
            flag = false;
        } else if (password !== confirm_password) {
            confirmpasswordErr.innerHTML = 'Passwords do not match.';
            confirmpasswordErr.style.color = "orange";
            flag = false;
        }

        const fileName = pform.photo.value;
        const photoErr = document.getElementById('photoErr');
        photoErr.innerHTML = "";
        if (!fileName) {
            photoErr.innerHTML = 'Upload your photo!';
            photoErr.style.color = "orange";
            flag = false;
        }
    }
    return flag;
}

// console.log("Form submitted!");

