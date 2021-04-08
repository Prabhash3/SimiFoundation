
"use strict";
var add_folder = document.getElementById("add_folder");
var main_box = document.getElementById("main_box");
var first_fold = document.getElementById("first_fold");
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 
// var add_folder = document.getElementById("add_folder"); 



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


add_folder.addEventListener("click", () => {

    let temp = document.createElement("div");
    temp.className = "new_folder";
    temp.id = "folder-no-" + (main_box.childElementCount + 1);
    temp.innerHTML = `
      <img class="new_folder_img" src="public\\image\\new_folder.png" alt="new_folder_img" draggable="false">
      <div class="folder_name" id=${"folder_name_no-" + (main_box.childElementCount + 1)} contenteditable="">New folder </div>
   `;
    main_box.appendChild(temp);
    selectElementText(main_box.lastElementChild.lastElementChild);


    // main_box.lastElementChild.lastElementChild.focus();

    // main_box.lastElementChild.lastElementChild
});

main_box.addEventListener("focusout", (e) => {
    if (e.target.className == "folder_name") {


        send_ajax("type=up_fold&f_id=" + e.target.id, "./create_folder.php", "post").then((data) => {
            console.log((data));
        }).catch(error => {
            console.log(error);
        });


    }
    console.log(e.target.id);

});

// main_box.addEventListener("focusin", (e)=>{
//     if(e.target.className=="folder_name"){

//     }
//     console.log(e.target.className + "foucs in "); 

// }); 