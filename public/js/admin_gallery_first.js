
"use strict";
var add_folder = document.getElementById("add_folder");
var main_box = document.getElementById("main_box");
var first_fold = document.getElementById("first_fold");
var img_close_modal_but = document.getElementById("img_close_modal_but"); 
var body = document.getElementById("body"); 
// var add_folder = document.getElementById("add_folder"); 


var test = document.getElementById("test"); 
    test.addEventListener("click",    (e)=>{
        
        console.log("Df");
          console.log(e.target.className)
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

main_box.addEventListener("focusout", (e) => {
    if (e.target.className == "folder_name") {
       
           
      
        let f_id_part  = e.target.id.split("-"); 
        let f_id = f_id_part[0]; 
        let f_id_name = f_id_part[1]; 
        let  type=  f_id_name=="new_fold"? "creat_fold" :"update_fold";; 
       
        let f_name  =  String( e.target.innerHTML) ;
        // console.log("before repl = ",f_name)
        f_name = f_name.replace(/&nbsp;/g,"") ;
        f_name =f_name.replace(/<div>/g,"") ;
        f_name = f_name.replace(/<\/div>/g,"") ;
        f_name = f_name.replace(/<br>/g,"") ;
        f_name = f_name.replace(/[!@#$%^&*]/g,"-") ;
        f_name= f_name.trim(); 
        e.target.innerHTML=f_name; 
        // console.log("after repl = ",f_name)
      

        send_ajax("req_type="+type+ "&f_name="+f_name+"&f_id=" + f_id, "./create_folder.php", "post").then((data) => {
            console.log((data));
        }).catch(error => {
            // console.log(error);
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
    if(e.target.id ){
      folder_id =  e.target.id.split("-")[1]; 
      console.log( " id = " + folder_id ); 
      console.log( " class = '" + class_name+ "'" ); 
    }else{
        console.log("no id found ");  
        return; 
    }

    if (  class_name == "new_folder_img" ||  class_name == "fa fa-folder fa-fw") {
    //this is folder image 
         window.location="./admin_gallery_second.html?f_id=" + ( folder_id); 
    }
    else  if (  class_name == "hide-folder" ||  class_name == "fas fa-eye") {
        //this is   hide-folder
        console.log("->  hide-folder"); 
        send_ajax("req_type=hide&f_name="+f_name+"&f_id=" + f_id, "./admin_gallery_first.php", "post").then((data) => {
            console.log((data));
        }).catch(error => {
            // console.log(error);
        });

       
    }
    else  if (  class_name == "unhide-folder" ||  class_name == "fas fa-eye-slash") {
            //this is   unhide-folder
            console.log("->  Unhide-folder"); 
            send_ajax("req_type=unhide&f_name="+f_name+"&f_id=" + f_id, "./admin_gallery_first.php", "post").then((data) => {
                console.log((data));
            }).catch(error => {
                // console.log(error);
            });
       
    }
    else  if (  class_name == "edit-folder-img" ||  class_name == "far fa-edit") {
        //this is edit folder 
        console.log("->  edit-folder"); 
        
        
     }
    else  if (  class_name == "delete-folder" ||  class_name == "fa fa-trash") {
         //this is delete folder 
         console.log("->  delete-folder"); 
    }

    // console.log(e.target.id.split("-"));
    // console.log(e.target);


});

// main_box.addEventListener("focusin", (e)=>{
//     if(e.target.className=="folder_name"){

//     }
//     console.log(e.target.className + "foucs in "); 

// }); 