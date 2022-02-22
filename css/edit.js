//edit 
const uploadButton = document.getElementById('upload-button');
const defaultBtn = document.getElementById('default-btn');
const imgpic = document.getElementById('img-pic');
const img = document.getElementById('img');
const fileNme = document.querySelector('.file-name');
const wrapper = document.querySelector('.wrapper');
const cancelBtn = document.querySelector('.cancel-btn');

defaultBtn.addEventListener('click',uploadActive);

 function uploadActive(e){

     imgpic.style.display="none"; 
     img.style.display="block";

     uploadButton.click();
     
     e.preventDefault();
 }
 uploadButton.addEventListener('change',(e)=>{
     const readerImg = new FileReader();
     readerImg.onload = ()=>{
         if(readerImg.readyState==2){
             img.src=readerImg.result;
             wrapper.classList.add('active');
         }
         cancelBtn.addEventListener('click',()=>{
              img.src="";
             img.style.display="none";
             imgpic.style.display="block"; 

             wrapper.classList.remove('active');
         })

     }
     readerImg.readAsDataURL(e.target.files[0]);

     if(uploadButton.value){
        
         let valueStore = uploadButton.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
         fileNme.textContent = valueStore;

     } else {
        fileNme.textContent = "No file edited, yet";
    }
 })


    


   
    
    
    
 



    

