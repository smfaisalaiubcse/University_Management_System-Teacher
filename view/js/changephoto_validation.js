function validateChangePhotoForm(pform) {
    console.log("ok");
    const fileName = pform.photo.value;
    const photoErr = document.getElementById('photoErr');
    photoErr.innerHTML = "";

    if (!fileName) {
        photoErr.innerHTML = 'Upload your photo!';
        photoErr.style.color = "orange";
        return false;
    }

    const allowedFileTypes = ['jpg', 'jpeg', 'png'];
    const fileType = fileName.split('.').pop().toLowerCase();
    if (!allowedFileTypes.includes(fileType)) {
        photoErr.innerHTML = 'Invalid file type. Please upload a JPG or PNG file.';
        photoErr.style.color = "red";
        return false;
    }

    const maxSizeMB = 1;
    const fileSize = pform.photo.files[0].size / 1024 / 1024; // in MB
    if (fileSize > maxSizeMB) {
        photoErr.innerHTML = `File size exceeds ${maxSizeMB} MB. Please upload a smaller file.`;
        photoErr.style.color = "red";
        return false;
    }

    return true;
}
