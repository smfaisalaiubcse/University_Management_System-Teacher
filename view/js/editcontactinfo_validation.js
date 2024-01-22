function validateConInfoForm(pform) {
    console.log("form submitted");
    const email = pform.email.value;
    const phone = pform.phone.value;
    const website = pform.website.value;
    const country = pform.country.value;
    const division = pform.division.value;
    const rsc = pform.rsc.value;
    const postcode = pform.postcode.value;

    const emailErr = document.getElementById('emailErr');
    const phoneErr = document.getElementById('phoneErr');
    const websiteErr = document.getElementById('websiteErr');
    const countryErr = document.getElementById('countryErr');
    const divisionErr = document.getElementById('divisionErr');
    const rscErr = document.getElementById('rscErr');
    const postcodeErr = document.getElementById('postcodeErr');

    emailErr.innerHTML = "";
    phoneErr.innerHTML = "";
    websiteErr.innerHTML = "";
    countryErr.innerHTML = "";
    divisionErr.innerHTML = "";
    rscErr.innerHTML = "";
    postcodeErr.innerHTML = "";

    let flag = true;
    if (email === "") {
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
    return flag;
}

// console.log("Form submitted!");

