const succuss = document.querySelector(".session-feed-success");
const warning = document.querySelector(".session-feed-warning");
const errorFeed = document.querySelector(".session-feed-error");
window.addEventListener("load", (e) => {
    setTimeout(alartFun, 3000);
})

function alartFun() {
    if (succuss) {
        succuss.style.display = "none";
    } else if (warning) {
        warning.style.display = "none";
    } else {
        if(errorFeed){
            errorFeed.style.display = "none";
    }
        }
        

}
const child = document.querySelector(".pagelink").children;

for (let i = 0; i <= 3; i++) {
    if(child[i]){
        child[i].addEventListener('blur', () => {
            child[i].classList.add("active")
        });
    }

    
  

}

const tipModal = document.querySelector('.tip-modal');
const tipBtn = document.querySelector('#tip-btn');
const tipClose = document.querySelector('.tip-close');

// add addEventListener
if(tipBtn)
tipBtn.addEventListener("click",()=>{
 
    tipModal.style.display="block";

});
if(tipClose)
tipClose.addEventListener('click',()=>{
    tipModal.style.display='none';
})
window.addEventListener('click',(e)=>{
    if(e.target==tipModal){
        tipModal.style.display='none';

    }
})
const State = document.querySelector(".state");
const previous = document.getElementById('prev');
const next = document.getElementById('next');
const first = document.querySelector('.first');

var words = ['Lorem ipsum dolor sit amet consectetur adipisicing elit.','ipsum dolor sit amet consectetur','voluptatum fugiat vero recusandae exercitationem','Quos officia fugiat rerum repellendus quam','dolor sit amet consectetur adipisicing elit'];

let k = 0;
if(previous)
previous.addEventListener('click',()=>{
    first.style.display ="none";

    if(k <= 0) k = words.length;
        
         k--
        
        return setWords();
    
});
if(next)
next.addEventListener('click',()=>{
    first.style.display ="none";
    if(k >= words.length -1)
        k = -1;
        k++;
        return setWords();
    

} )

function setWords(){
    State.style.display = "block";
    State.textContent = words[k];

}











// edit image

// edit image
// const fileEdit = document.getElementById('fileEdit');
// const buttonEdit = document.getElementById('editButton');
// const img1 = document.querySelector('.post1');
// const textEdit = document.getElementById('custom-text2');
// const imgEdit = document.querySelector('.post2');

// //button click
// if (buttonEdit) {
//     buttonEdit.addEventListener('click', editImage);

//     function editImage() {
//         console.log('buttonclick');
//         fileEdit.click();
//         img1.style.display = "none";
//         imgEdit.style.display = "block";
//     };

// }
// //match value

// fileEdit.addEventListener('change', editFile);

// function editFile() {
//     if (fileEdit.value) {
//         textEdit.textContent = fileEdit.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
//     } else {
//         textEdit.textContent = "No file edited, yet";
//     }
// };
// //display edited image
// function previewEdit(event) {
//     const readerEdit = new FileReader();
//     const imageEdit = document.getElementById('imageEdit');
//     readerEdit.onload = function() {
//         if (readerEdit.readyState == 2) {
//             imageEdit.src = readerEdit.result;

//         }
//     }
//     readerEdit.readAsDataURL(event.target.files[0]);


// }


