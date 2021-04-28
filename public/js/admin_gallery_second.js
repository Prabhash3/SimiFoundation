
"use strict";
// var upload_img_but = document.getElementById("upload_img_but");
var main_box = document.getElementById("main_box");
// var drop_zone = document.getElementById("drop_zone");
var browser_file_but = document.getElementById("browser_file_but"); 
var upload_file_input = document.getElementById("upload_file_input"); 

var disp_uploadable_file_box = document.getElementById("disp_uploadable_file_box"); 
var disp_uploadable_file = document.getElementById("disp_uploadable_file"); 
var back_button_img = document.getElementById("back_button_img"); 
var cancel_upload_but = document.getElementById("cancel_upload_but"); 
var cancel_upload_file_but = document.getElementById("cancel_upload_file_but"); 
var upload_file_but = document.getElementById("upload_file_but"); 
var add_fold_img = document.getElementById("add_fold_img"); 
 var launch_box = document.getElementById("launch_box"); 
var top_close = document.getElementById("top_close"); 


var display_up_img = document.getElementById("display_up_img"); 
var display_up_img_name = document.getElementById("display_up_img_name"); 
var prog_bar = document.getElementById("prog_bar"); 
var img_close_modal_but = document.getElementById("img_close_modal_but"); 

// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 

var not_upload_file_table = {}; 
var not_upload_file_count = 0; 
var upload_file_data ; 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 



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
                    reject(xhttp.response);
                }
            }
        }
        xhttp.send(param);

    });

}

// send_ajax("","./api_file/upload_file.php" ).then(data=>{
//     console.log(data); 
// }).catch(error=>{
//     console.log(error); 
// })

function byte_to_unit(size) {
    if (size <= 1000) return { divi: 1, unit: "B" };
    if (size <= 100000) return { divi: 1000, unit: "KB" };
    if (size <= 100000000) return { divi: 1000000, unit: "MB" };
    if (size <= 100000000000) return { divi: 1000000000, unit: "GB" };
    if (size <= 100000000000000) return { divi: 1000000000000, unit: "TB" };



}


function upload_file_to_server(i, total_file_count,curr_file_no ) {
    try {

   // i => i'th no of file to be uploaded 

    // console.log("files aare ", upload_file_data);
    console.log( "------------------------------------"); 
    console.log( " i = "+ i +  " total file count   " + total_file_count + " curr file no " + curr_file_no); 
   
    img_close_modal_but
    prog_bar.style.display="block"; 
    // for (let i = 0; i < upload_file_data.length; i++) {
        //generate upload id 

     
        let xhttp = new XMLHttpRequest();
        let url = `./api_file/upload_file.php?p_f_id=${p_f_id}&p_p_f_id=${p_p_f_id}`;

        // console.log("url = ", url);
        xhttp.open("POST", url, true);
       


        let form_data = new FormData();
        form_data.append("upload_file", upload_file_data[i]);


        // xhttp.setRequestHeader("Content-type", "ap");\
        xhttp.upload.onprogress = function (e) {
            
            
            let frac = e.loaded / e.total;
            console.log(e.loaded);

            prog_bar.firstElementChild.style.width = Math.round(frac * 100) + "%"; 

        }

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status >= 200 && this.status < 300) {
               
          
                // console.log("resrpn->", this.response);
                // let res_data = JSON.parse(this.response);
                let res_data = (this.response);
                console.log("resrpn->",res_data );
                
                if (res_data.status == "ok") {
                
                }
                else {
                      console.log(res_data.error);
                }
                // upload_img_but.innerHTML ="Upload"; 
                
                
                // prog_bar.firstElementChild.style.width =  "0%"; 
                prog_bar.style.display="none"; 
                prog_bar.innerHTML = `<div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>`;
             

            // upload next valid file 
            i++
            while ( i<total_file_count ){
                if( not_upload_file_table[i]==true ||  upload_file_data[i].size < 1   ){
                    console.log( "---skippiing file no " + i  + "--"); 
                    i++; 
                }else{

                    display_up_img.src =  URL.createObjectURL(upload_file_data[i]); 
                    display_up_img_name.textContent = upload_file_data[i].name ; 
                    console.log("uploading file no " + (curr_file_no+ 1 )); 
                    upload_file_to_server( i, total_file_count,curr_file_no+1); 
                    break; 
                }
            }
           if( i>=total_file_count){
               //at end of last upload ""\
                console.log("upload completed"); 
           }

            }
        }

     xhttp.send(form_data);
    
    }      

 catch (error) {
     console.log(error); 
 }
}
     
   
//upload button function 
upload_file_but.addEventListener("click",    ()=>{

     if (upload_file_data && upload_file_data.length > 0) {
        // total_file_count = upload_file_data.length  - Object.keys(not_upload_file_table).length;
    }else {
        console.log("no filees found upload function "); 
        return  ; 
    }
    let i =0; 
    while ( i<upload_file_data.length ){
        if( not_upload_file_table[i]==true  ||  upload_file_data[i].size < 1){
            console.log( "---skippiing file no " + i  + "--"); 
            i++; 
        }else{
            top_close.click(); 
            img_close_modal_but.click(); 
            console.log("(((((((started"); 
            prog_bar.innerHTML = `<div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25"
            aria-valuemin="0" aria-valuemax="100"></div>`;
            display_up_img.src =  URL.createObjectURL(upload_file_data[i]); 
            display_up_img_name.textContent = upload_file_data[i].name ; 
            upload_file_to_server( i,upload_file_data.length,1); 
            console.log("end(((((((("); 
            break; 
        }
    }

}); 



cancel_upload_but.addEventListener("click", () => {
    console.log("remove d files "); 
    upload_file_data=null; 
    disp_uploadable_file.innerHTML=""; 
    // drop_zone.style.display="none"; 
}); 

cancel_upload_file_but.addEventListener("click", () => {
    console.log("canceling uploading ... files "); 
    upload_file_data=null; 
    disp_uploadable_file.innerHTML=""; 
    disp_uploadable_file_box.style.display="none"; 
}); 




add_fold_img.addEventListener("click", () => {

    upload_file_input.click(); 
    
}); 
// ##
// launch_box.click(); 


upload_file_input.addEventListener("change", (e) => {
    upload_file_data = e.target.files; 
    console.log(upload_file_data); 
    // drop_zone.style.display="none"; 
     disp_uploadable_file_box.style.display="block"; 
   if(!(upload_file_data) || upload_file_data.length<1){
      console.log("file not found");    
    return; 
   }   
   launch_box.click(); 
   disp_uploadable_file.innerHTML=""; 
   for(let i = 0; i<upload_file_data.length ; i++){

            let temp = document.createElement("div"); 
                temp.className = "upload_img_box"; 
                
                temp.innerHTML =  `<div title="folder" class="upload_img"> </div>
                                  ${ upload_file_data[i].size>=40000000 ?`<div class="upload-file-err"> This File is Too Large  </div>`:""}
                                  ${ upload_file_data[i].size<=0 ?`<div class="upload-file-err"> This File is Too Small  </div>`:""}
                                 <div class="upload_img_name">${upload_file_data[i].name}</div>
                                        <div class="rm_img_but" id="f_no-${i}">

                                            <img  id="f_img_no-${i}" class="rm_img_icon" src="public\\image\\remove_file_icon.svg" alt="">
                                    </div>`; 
          temp.firstElementChild.style.backgroundImage = "url('"+URL.createObjectURL(upload_file_data[i]) + "')";
// temp.children[2].firstElementChild.src  = URL.createObjectURL(upload_file_data[i]); 
            console.log(); 
             disp_uploadable_file.appendChild(temp); 
   }

    
 
    
}); 

// upload_img_but.addEventListener("click", () => {

//     drop_zone.style.display="block"; 
// }); 
back_button_img.addEventListener("click", () => {

    window.location = "./admin_gallery_first.html";

}); 
disp_uploadable_file.addEventListener("click", (e) => {

    if( e.target.className=="rm_img_but" || e.target.className == "rm_img_icon"  ){

          console.log(e.target.className); 
    let file_id = e.target.id.split("-")[1] ; 
    console.log(file_id); 
    not_upload_file_table[file_id]=true; 
    console.log(not_upload_file_table);
    document.getElementById("f_no-"+file_id).parentElement.remove(); 
    }
    // document.getElementById("f_no-1").parentElement.remove(); 
   
}); 

main_box.addEventListener("focusout", (e) => {
    if (e.target.className == "folder_name") {
        let type="cr_fd" ; 
        let f_id  = e.target.id.split("-")[1]; 
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
            console.log(error);
        });


    }
    console.log(e.target.innerHTML);

});



main_box.addEventListener("dblclick", (e) => {
    if (e.target.className == "new_folder_img") {
       
     window.location="./admin_gallery_second.html?f_id=" + ( e.target.id.split("-")[1])


    }
    // console.log(e.target.id.split("-"));

});

// main_box.addEventListener("focusin", (e)=>{
//     if(e.target.className=="folder_name"){

//     }
//     console.log(e.target.className + "foucs in "); 

// }); 