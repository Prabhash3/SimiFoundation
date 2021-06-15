
"use strict";
var add_folder = document.getElementById("add_folder");
var main_box = document.getElementById("main_box");
var first_fold = document.getElementById("first_fold");
var img_close_modal_but = document.getElementById("img_close_modal_but"); 
var body = document.getElementById("body"); 

var  default_img_path = "public\\image\\default_upoad_img.svg"; 
var upload_file_data ; 
var input_file = document.getElementById("input_file"); 
var display_up_img = document.getElementById("display_up_img"); 
var select_img_but = document.getElementById("select_img_but"); 
var display_up_img_name = document.getElementById("display_up_img_name"); 
var upload_img_but = document.getElementById("upload_img_but"); 
var prog_bar = document.getElementById("prog_bar"); 
var modal_out_box = document.getElementById("modal_out_box"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 

//to check if the folder is new or already created folder 
var is_create_folder=false; 




var test = document.getElementById("test"); 
    test.addEventListener("click",    (e)=>{
        
        // console.log("Df");
        //   console.log(e.target.className)
    }); 


function send_ajax(param, url, method = "post", set_header = true) {

    return new Promise((resolve, reject) => {
        var xhttp = new XMLHttpRequest();

        xhttp.open(method, url, true);
        if (set_header) {

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        }

        xhttp.onreadystatechange = () => {
            // console.log(xhttp.readyState);

            if (xhttp.readyState == 4) {
                // console.log(xhttp.responseText);
                // console.log("founded"); 
                if (xhttp.status >= 200 && xhttp.status < 300) {

                    resolve(xhttp.response);
                }
                else {
                    reject("not able to fetch");
                }
            }
        }
        xhttp.send(param);

    });

}

// send_ajax("name=mohan&age=33","./create_folder.php?name=get&age=33","post").then((data)=>{
//     console.log((data));
// }).catch(error=>{
//     console.log(error); 
// })


// send_ajax("2","https://jsonplaceholder.typicode.com/posts/2","get").then((data)=>{
//     console.log((data));
// }).catch(error=>{
//     console.log(error); 
// })

// fetch('https://jsonplaceholder.typicode.com/posts')
//   .then(response => response.json())
//   .then(data => console.log(data));



//stackoverflow function  to select  text of souce id
function selectElementText(el, win) {
    win = win || window;
    var doc = win.document, sel, range;
    if (win.getSelection && doc.createRange) {
        sel = win.getSelection();
        range = doc.createRange();
        range.selectNodeContents(el);
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (doc.body.createTextRange) {
        range = doc.body.createTextRange();
        range.moveToElementText(el);
        range.select();
    }
}

function scrollToBottom (id) {
    var div = document.getElementById(id);
    div.scrollTop = div.scrollHeight - div.clientHeight;
 }









 
add_folder.addEventListener("click", () => {
    is_create_folder= true; 
    let curr_fold_no = main_box.childElementCount; 
    let temp = document.createElement("div");
    temp.className = "new_folder";
    temp.id = "folder-box-no-" + (curr_fold_no );
//     temp.innerHTML = `
//       <img class="new_folder_img" id=${"folder_img_no-" + (curr_fold_no + 1)}  src="public\\image\\new_folder.png" alt="new_folder_img" draggable="false">
//       <i class="fa fa-folder fa-fw"  style="color:rgb(37, 196, 37)"></i>
//       <div class="folder_name" id=${"folder_name_no-" + (curr_fold_no + 1)} contenteditable="">New folder</div>
//    `;

temp.innerHTML=` 
<span  title="Open Folder" class="new_folder_img" id=${"f_img_no-" + (curr_fold_no )} ><i class="fa fa-folder fa-fw" id=${"f_img_c_no-" + (curr_fold_no )} ></i></span>

<span title="Edit Objective name " class="folder_name"  contenteditable="true" id=${"folder_name_no-" + (curr_fold_no )}>Objective Title </span>
<span title="Hide Folder" class="hide-folder" id=${"f_vis_no-" + (curr_fold_no )} ><i class="fas fa-eye" id=${"folder_vis_c_no-" + (curr_fold_no )}></i> </span>
<span title="Change Image" class="edit-folder-img" id=${"f_edit_no-" + (curr_fold_no )}> <i class="far fa-edit" id=${"f_edit_c_no-" + (curr_fold_no )}></i> </span>
<span title="Delete Folder" class="delete-folder" id=${"f_name_no-" + (curr_fold_no )}><i class="fa fa-trash" aria-hidden="true" id=${"f_name_c_no-" + (curr_fold_no )}></i> </span>

`;

console.log(temp.childElementCount); 
    main_box.appendChild(temp);
    selectElementText(main_box.lastElementChild.children[1]);
   
    window.scrollTo(0,document.body.scrollHeight);
    // main_box.lastElementChild.lastElementChild.focus();

    // main_box.lastElementChild.lastElementChild
}); 
 
upload_img_but.addEventListener("click", (e) => {
    

//    console.log(e.target.innerHTML); 
     

     let is_error= false; 
     if (  !(upload_file_data) || !(upload_file_data[0] )){
        display_mess("file not present ",3000 ); 
        // console.log("file not present ");  
        is_error = true;  

     }
   
     else if(upload_file_data[0].size<=0 ){
         //to samll 
        //  console.log(" too small ");  
        display_mess("too small file to upload  ",3000 ); 
        is_error = true;  

 
     }
     else if(upload_file_data[0].size>=40000000 ){

        //to samll 
        console.log("too big  ");  
        display_mess("too big file to upload  ",3000 ); 
        is_error = true;  
      
    }
     
    if(is_error){
        display_up_img.src = default_img_path; 
        display_up_img_name.textContent ="No File Selected" ; 
        return; 
    }
     upload_img_but.innerHTML ="Uploading..."; 
    
     let xhttp = new XMLHttpRequest();
     let f_id = img_close_modal_but.getAttribute("f_id"); 
     let url = `./api_file/admin_gallery_first.php?f_id=${f_id}&req_type=edit`;
    // console.log("url = ", url);
    xhttp.open("POST", url, true);
   


    let form_data = new FormData();
    form_data.append("upload_file", upload_file_data[0]);
    prog_bar.style.display="block"; 

    // xhttp.setRequestHeader("Content-type", "ap");\
    xhttp.upload.onprogress = function (e) {
        
        
            let frac = e.loaded / e.total;
            console.log(e.loaded);

            prog_bar.firstElementChild.style.width = Math.round(frac * 100) + "%"; 

    }

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status >= 200 && this.status < 300) {

            display_mess(JSON.parse(this.response),3000 )
            // console.log("resrpn->", this.response);
            let res_data;
            // let res_data = JSON.parse(this.response);
            // console.log("resrpn->",res_data );
            
            // if (res_data.status == "ok") {
            
            // }
            // else {
            //       console.log(res_data.error);
            // }

            upload_img_but.innerHTML ="Upload"; 
            prog_bar.firstElementChild.style.width =  "0%"; 
            prog_bar.style.display="none"; 
        
            upload_file_data = null; 
            setTimeout( ()=>{
                img_close_modal_but.click(); 
                display_up_img.src = default_img_path; 
                display_up_img_name.textContent ="No File Selected" ; 
            },500); 
        }
    }

    xhttp.send(form_data);

}); 

input_file.addEventListener("change", (e) => {
    // if (e.target.className == "folder_name") {
       
    // }
    upload_file_data = e.target.files; 
    console.log(upload_file_data); 
   if(!(upload_file_data) || upload_file_data.length<1){
      console.log("file not found");    
      display_up_img.src = default_img_path; 
      display_up_img_name.textContent ="No File Selected" ; 
    return; 
   }   
   display_up_img.src =  URL.createObjectURL(upload_file_data[0]); 
   display_up_img_name.textContent = upload_file_data[0].name ; 
}); 

select_img_but.addEventListener("click", () => {
    input_file.click(); 
});   
modal_out_box.addEventListener("click", (e) => {
    // console.log(e.target.className )
    if (e.target.className == "modal-dialog") {
    img_close_modal_but.click(); 
    }
});  



main_box.addEventListener("focusout", (e) => {
   console.log("kdfj"); 
    console.log(e.target.className); 
    if (e.target.className == "folder_name") {
       

           
        let temp_f_id ; 
        let f_id_part  = e.target.id.split("-"); 
        let f_temp_id = f_id_part[0]; 
        // let temp_name
        let f_id_name = f_id_part[1]; 
        let  type=     is_create_folder== true ? "creat_fold" :"update_fold";; 
    //    console.log(f_name[f_name.length-1]);
        let f_name  =  String( e.target.innerHTML) ;
        // console.log("before repl = ",f_name)
        f_name = f_name.replace(/&nbsp;/g,"") ;
        f_name =f_name.replace(/<div>/g,"") ;
        f_name = f_name.replace(/<\/div>/g,"") ;
        f_name = f_name.replace(/<br>/g,"") ;
        f_name = f_name.replace(/[!@#$%^&*]/g,"-") ;
        temp_f_id = f_name; 
        f_name = f_name.replace(/\"/g,"\'") ;
        f_name = f_name.replace(/\'/g,"\\'") ;

        f_name= f_name.trim(); 
        // f_name = encodeURIComponent(f_name); 
        e.target.innerHTML=f_name; 
        // console.log("after repl = ",f_name)
       
        is_create_folder= false; 
        send_ajax("req_type="+type+ "&f_name="+f_name+"&f_temp_id=" + f_temp_id +"&f_id_name=" + f_id_name , "./api_file/create_obj_folder.php", "post").then((data) => {
            console.log((data));
            if(type=="creat_fold"){
                window.location ="./admin_gallery_first.php"; 
            }
            else{ 
                display_mess(JSON.parse(data),3000 )

            }
        }).catch(error => {
            console.log(error);
            // display_mess(JSON.parse(error),3000 )
        });


    }
    console.log(e.target.innerHTML);

});



// main_box.addEventListener("dblclick", (e) => {
//     if (e.target.className == "new_folder_img" || e.target.className ==  "fa fa-folder fa-fw") {
       
//      window.location="./admin_gallery_second.html?f_id=" + ( e.target.id.split("-")[1])


//     }
//     // console.log(e.target.id.split("-"));

// });


main_box.addEventListener("click", (e) => {
    let class_name = e.target.className; 
    let folder_id ; 
    let f_name ; 
    let f_id; 
    let url = "./api_file/admin_gallery_first.php";


    if(e.target.id ){
      folder_id =  e.target.id.split("-")[1]; 
    //   console.log( " id = " + folder_id ); 
    //   console.log( " class = '" + class_name+ "'" ); 
    }else{
        console.log("no id found ");  
        return; 
    }
    // console.log(( "tilte " + ));
    if (  class_name == "new_folder_img" ||  class_name == "fa fa-folder fa-fw") {
    //this is folder image 
         window.location="./admin_gallery_first_b.php?f_id=" + ( folder_id); 
    }
    else  if (  class_name == "hide-folder" ||  class_name == "fas fa-eye") {
        //this is   hide-folder
        console.log("->  hide-folder"); 
        send_ajax("req_type=hide&f_name="+f_name+"&f_id=" + folder_id, url, "post").then((data) => {
            // console.log((data));
            display_mess(JSON.parse(data),3000 )
            let temp_elem = document.getElementById("f_vis_no-" + folder_id); 
            if(temp_elem){
                temp_elem.className = "unhide-folder"; 
                temp_elem.setAttribute('title',"Unhide Folder"); 
                temp_elem.firstElementChild.className="fas fa-eye-slash";

            }


        }).catch(error => {
            display_mess(JSON.parse(error),3000 )
            // console.log(error);
        });
  
       
    }
    else  if (  class_name == "unhide-folder" ||  class_name == "fas fa-eye-slash") {
            //this is   unhide-folder
            console.log("->  Unhide-folder"); 
            send_ajax("req_type=unhide&f_name="+f_name+"&f_id=" + folder_id, url, "post").then((data) => {
                console.log((data));
                display_mess(JSON.parse(data),3000 )
                let temp_elem = document.getElementById("f_vis_no-" + folder_id); 
                if(temp_elem){
                    temp_elem.className = "hide-folder"; 
                    temp_elem.setAttribute('title',"Hide Folder"); 
                    temp_elem.firstElementChild.className="fas fa-eye";
    
                }
          
            }).catch(error => {
                // console.log();
                display_mess(JSON.parse(error),3000 )
              
            });
       
    }
    else  if (  class_name == "edit-folder-img" ||  class_name == "far fa-edit") {
        //this is edit folder 
        // console.log("->  edit-foldsser"); 
        // send_ajax("req_type=edit&f_name="+f_name+"&f_id=" + folder_id, url, "post").then((data) => {
        //     console.log((data));
        // }).catch(error => {
        //     console.log(error);
        // });
        img_close_modal_but.setAttribute("f_id",folder_id); 
        // console.log(img_close_modal_but.getAttribute("f_id") ); 
     
        // console.log(img_close_modal_but.className); 
        img_close_modal_but.click(); 
        
     }
    else  if (  class_name == "delete-folder" ||  class_name == "fa fa-trash") {
         //this is delete folder 
        //  console.log("->  delete-folder"); 
    }

    // console.log(e.target.id.split("-"));
    console.log(e.target.id);


});

// main_box.addEventListener("focusin", (e)=>{
//     if(e.target.className=="folder_name"){

//     }
//     console.log(e.target.className + "foucs in "); 

// }); 