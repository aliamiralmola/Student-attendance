// دالة لاخفاء جزء واظهار جزء اخر
function hid4show(hid, show, none){
    // hid = id العنصر المراد اخفاؤه
    // show = id العنصر المراد اظهاره
    // none is bolean: if none = true --> يخفي جميع العناصر التي لها class = none
    // if none = false --> لا يخفي سوى العنصر المطلوب اخفاؤه
    if(none !== false){
        var num = document.getElementsByClassName('none').length;
        for(var i=0; i < num; i++){
            document.getElementsByClassName('none')[i].style.display = 'none';
        }
    }
    document.getElementById(hid).style.display="none";
    document.getElementById(show).style.display="block";
}

function searcher( inputId, tableId ){
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("tr");
    
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}

// onload = function allTime(cla, re){
//     var all_m = 0,  all_h = 0;
//     var clas = document.getElementsByClassName(cla);
//     var len = clas.length;
//     for( var i=0; i<len; i++ ){
//         var time = clas[i];
//         time = toString(time);
//         var h = time[0]; 
//         var m;
//         m[0] = time[2];
//         if( time[3] ){
//             m[1] = time[3];
//         }
//         all_h = all_h + h;
//         all_m = all_m + m;
//         if(all_m >= 60){
//             all_m = all_m - 60;
//             all_h = all_h + 1;
//         }
//     }
//     document.getElementById(re).innerText = all_h + "ساعة و " + all_m + "دقيقة.";
// }


// ajax 
// function ajax(path, resin) {
//     var ajax = new XMLHttpRequest();
//     ajax.onload = function() {
//         document.getElementById(resin).innerHTML = this.responseText;
//     }
//     ajax.open("GET", "./ajax/"+path, true);
//     ajax.send();
// }

// ajax
// function ajax() {
//     const ajax = new XMLHttpRequest();
//     ajax.onload = function() {
//         document.getElementById("ajaxresult").innerHTML = this.responseText;
//     }
//     ajax.open("GET", "./ajax/pass.php?id=10", true);
//     ajax.send();
// }