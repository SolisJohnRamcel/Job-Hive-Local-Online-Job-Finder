function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const imageId = input.id === 'Cover_Photo' ? 'Cover_Photo' : 'profile_image';
            const imgElement = input.closest('.position-relative').querySelector('img');
            imgElement.src = e.target.result;
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
