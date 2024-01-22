function validateSqForm(pform) {
    console.log("form submitted");
    const sq1 = pform.sq1.value;
    const sq2 = pform.sq2.value;
    const sq3 = pform.sq3.value;
    const sq4 = pform.sq4.value;
    const sq5 = pform.sq5.value;
    const sq6 = pform.sq6.value;
    let flag = true;
    const sqErr = document.getElementById('sqErr');
    sqErr.innerHTML = "";
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
    return flag;
}

