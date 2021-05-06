
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
var delete_img_icon = document.getElementById("delete_img_icon"); 
var img_box_img_part = document.getElementById("img_box_img_part"); 
var select_fold_img = document.getElementById("select_fold_img"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 
// var upload_img_but = document.getElementById("upload_img_but"); 

var img_id_to_del_table = {}; 
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
                window.location = window.location.pathname + window.location.search;
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

    window.location = "./admin_gallery_first_b.php?f_id="+ p_p_f_id ;

}); 



delete_img_icon.addEventListener("click", (e) => {
 
     
    // console.log(img_box_img_part.firstElementChild.firstElementChild.style.display); 
    // console.log(main_box.children); 
    // window.location = "./admin_gallery_first.html";
    let s_data =  Object.keys(img_id_to_del_table); 
    if( s_data.length==0){
        console.log("no data"); 
        return ; 
    }
    if( img_box_img_part.firstElementChild && img_box_img_part.firstElementChild.firstElementChild.style.display != "inline-block" ){
        console.log( "no file selected ");  
        return; 
    }

    if (confirm("Are you sure you want to delete " +  s_data.length + (s_data.length>1? " Files" : " File"))) {


 
    var param = "s_data="+ JSON.stringify(s_data)+"&f_id="+p_f_id +"&req_type=delete";
    console.log(param); 



    send_ajax(param,"./api_file/admin_gallery_second.php")
     .then((data) => {
        // console.log((data));
        window.location = window.location.pathname + window.location.search;
    }).catch(error => {
        console.log(error);
    });
}

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
    console.log( "out "); 
 let type="" ; 
    if (e.target.className == "img-title"  && (type ="title") ||  e.target.className == "img-desc"  && (type ="desc")) {
        
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
      
        // console.log("tyep + ",type); 
        let url = './api_file/admin_gallery_second.php'; 
        send_ajax("req_type="+type+ "&f_name="+f_name+"&f_id=" + p_f_id+ "&img_id="+f_id, url, "post")
        .then((data) => {
            console.log((data));
        }).catch(error => {
            console.log(error);
        });


    }
    console.log(e.target.className);
    console.log(e.target.id);

});



// main_box.addEventListener("change", (e) => {
//     console.log("checke"); 
//     if (e.target.className == "img-select-box") {
       
//      img_id_to_del_table 

//     }
//     // console.log(e.target.id.split("-"));

// });
// var txt; 
// if (confirm("Press a button!")) {
//     txt = "You pressed OK!";
//   } else {
//     txt = "You pressed Cancel!";
//   }
//   console.log(txt)
select_fold_img.addEventListener("click", (e) => {
      
    let elem_arr = img_box_img_part.children; 
    let prop,bord ; 
    if( elem_arr && elem_arr[0] && elem_arr[0].firstElementChild.style.display== "inline-block"){
        prop = "none"; 
        bord = "none" ; 
    }else{
        prop = "inline-block"; 
        bord = "1px solid #00000070"
    } ; 
    for(let i=0 ; i<elem_arr.length; i++){
        elem_arr[i].firstElementChild.style.display=prop; 
        elem_arr[i].style.border=bord; 
    }

    
    console.log(img_box_img_part.children[0]); 
    // window.location = "./admin_gallery_first.html";

}); 


main_box.addEventListener("click", (e) => {
    if (e.target.className == "img-select-box") {
        let img_id= e.target.id.split("-")[1]; 
        console.log(e.target.value ,img_id); 

        if(e.target.value=="on" ){
               img_id_to_del_table[img_id] = true; 
               e.target.value="off"; 
        }
        else{
            delete img_id_to_del_table[img_id] ; 
            e.target.value="on"; 
        }
        console.log(img_id_to_del_table );
            
        
      

    }
    // console.log(e.target.id.split("-"));

});

// main_box.addEventListener("focusin", (e)=>{
//     if(e.target.className=="folder_name"){

//     }
//     console.log(e.target.className + "foucs in "); 

// }); 