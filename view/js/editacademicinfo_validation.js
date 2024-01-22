function validateAcInfoForm(pform) {
    let flag = true;
    console.log("form submitted");
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
    return flag;
}

// console.log("Form submitted!");

