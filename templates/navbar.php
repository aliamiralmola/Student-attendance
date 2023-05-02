<nav id="thenavbar" dir="ltr" class="navbar navbar-expand-lg navbar-dark">
    <div class="bg-dark p-5 brd opacity-60"></div>
    <a class="navbar-brand" href="#">
        <img class="img1" src="./images/4.png" alt="الصورة غير موجودة">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="webkit-box">
            <a class=" block  " href="./index.php"> 
                <li  class=" block  "> الصفحة الرئيسية <i class=" fa fa-home"></i></li>
            </a>
            <a class=" block  " href="./registers.php">
                <li class=" block "> السجلات <i class=" fa fa-history"></i></li>
            </a>
            <a class=" block  " href="./manage.php">
                <li class=" block  "> الإدارة <i class=" fa fa-edit"></i></li>
            </a>
        </ul>
        <form class="form-inline my-2 my-lg-0 search-form">
            <input class="form-control mr-sm-2 search-input" type="search"
            oninput="ajaxforsearch(this.value)"
            placeholder="ابحث عن طالب" aria-label="ابحث عن طالب">
            <!-- <button class="btn my-2 my-sm-0 search-button" type="submit"><i class="fa fa-search fa-3x"></i></button> -->
            <div id="searchresult"></div>
        </form>

    </div>
</nav>
<!-- bottom margin for navbar -->
<div class="p-5 mb-5"></div>
<script>
// ajax
function ajaxforsearch(name) {
    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        document.getElementById("searchresult").innerHTML = this.responseText;
    }
    ajax.open("GET", "./includes/search.php?name="+name, true);
    ajax.send();
}
</script>
