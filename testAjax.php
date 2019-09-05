<?php
require_once __DIR__ . "/user/autoload/autoload.php";




?>
<script language="javascript">
    function load_thanhPho() {
        $.ajax({
            url: "tinh_tp.json",
            type: "post",
            dataType: "json",
            success: function(thanhpho) {
                $.each(thanhpho,function(index, value){
                    $('#result .thanh-pho').append('<option value="'+value.code+'">'+value.name+'</option>');
                });
            },
            
        });
    };
    function load_quan() {
        $.ajax({
            url: "quan_huyen.json",
            type: "post",
            dataType: "json",
            success: function(quan) {
                $.each(quan,function(index, value){
                    $('#result .quan').append('<option value="'+value.parent_code+'">'+value.name+'</option>');
                });
            },
            
        });
    };
    function load_phuong() {
        $.ajax({
            url: "xa_phuong.json",
            type: "post",
            dataType: "json",
            success: function(phuong) {
                $.each(phuong,function(index, value){
                    $('#result .quan').append('<option id="'+value.code+'">'+value.name+'</option>');
                });
            },
            
        });
    };
  //==============================================//
  function changeTP(event){
      
  }
</script>

<?php require_once __DIR__ . "/user/layouts/header.php"; ?>

<main class="my-form">
    <div id="result">
        <label for="exampleFormControlInput1">Thành Phố</label>
            <select class="form-control col-md-3 thanh-pho" id="thanhPho" onchange="changeTP(this)">
           
            </select>

        <label for="exampleFormControlInput1">Quận</label>
            <select class="form-control col-md-3 quan" >

            </select>

        <label for="exampleFormControlInput1">Phường</label>
            <select class="form-control col-md-3">
    
            </select>
    </div>
    <br />
    <input type="button" name="clickme" id="clickme" onclick="load_thanhPho(),load_quan()" value="Click Me" />
    </body>

    </html>

</main>

<?php require_once __DIR__ . "/user/layouts/footer.php"; ?>