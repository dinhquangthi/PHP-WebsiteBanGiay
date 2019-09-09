
     function load_thanhPho() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST','http://localhost:5000/PHP-WebsiteBanGiay/tinh_tp.json',true);
        xhr.onload = function ()
          {
            var thanhPho = JSON.parse(xhr.responseText);
           
           $.each(thanhPho,function()
              {
                var key = Object.keys(this)[0];
                var value = this[key];
                var code = Object.keys(this)[4];
                var value2 = this[code];
  
                var op1 = document.createElement('option');
                op1.innerText = value;
                op1.setAttribute('value',value2);
                $('#thanhPho-list').append(op1);
  
              });
          }
          xhr.send();
      };
  
      function load_quan() {
        $('#quan-list').innerHTML = '';
        var xhr = new XMLHttpRequest();
        xhr.open('POST','http://localhost:5000/PHP-WebsiteBanGiay/quan_huyen.json',true);
        xhr.onload = function (id)
          {
            var quan = JSON.parse(xhr.responseText);
           $.each(quan,function()
              {
                var key = Object.keys(this)[0];
                var value = this[key];
                var code = Object.keys(this)[6];
                var value2 = this[code];
                console.log(value2);
                var op1 = document.createElement('option');
                op1.innerText = value;
                op1.setAttribute('value',value2);
                $('#quan-list').append(op1);
  
              });
          }
          xhr.send();
      };
