function validateGenInfoForm(pform) {
    console.log("form submitted");
    const firstname = pform.firstname.value;
    const lastname = pform.lastname.value;
    const fathersname = pform.fathersname.value;
    const mothersname = pform.mothersname.value;
    const gender = pform.gender.value;
    const bloodgroup = pform.bloodgroup.value;
    const religion = pform.religion.value;

    const firstnameErr = document.getElementById('firstnameErr');
    const lastnameErr = document.getElementById('lastnameErr');
    const fathersnameErr = document.getElementById('fathersnameErr');
    const mothersnameErr = document.getElementById('mothersnameErr');
    const genderErr = document.getElementById('genderErr');
    const bloodgroupErr = document.getElementById('bloodgroupErr');
    const religionErr = document.getElementById('religionErr');
    
    firstnameErr.innerHTML = "";
    lastnameErr.innerHTML = "";
    fathersnameErr.innerHTML = "";
    mothersnameErr.innerHTML = "";
    genderErr.innerHTML = "";
    bloodgroupErr.innerHTML = "";
    religionErr.innerHTML = "";
    let flag = true;
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
    return flag;
}

// console.log("Form submitted!");

