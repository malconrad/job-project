// 
let firstBtn = document.querySelector('.file-upload-btn');

firstBtn.addEventListener('click', function(e){
    
    e.preventDefault();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        

        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();
            $('.file-upload-btn').hide();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    }


}

// error message

//  
