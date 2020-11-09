<script type="text/javascript">
      $(document).ready(function(e)
      {
        getData(1);
      })
      $(document).on('click','.nav-btn',function(e)
      {
        let page= $(this).data('page');
        getData(page);
      })
      $(document).on('change','#kat',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })

       function getData(page=1)
       {
        let kategori = $("#kat").val();
        let th = $("#th").val();
        let jum_kasus = $("#jum_kasus").val();

        $.ajax({
          url : 'get_data1.php?page='+page,
          type : 'post',
          data : {
            kat : kategori,
            tahun : th,
            jum_kasus : jum_kasus,
          },
          beforeSend : function(e)
          {
            $("#result").html('<tr> <td class="text-center" colspan="7">Memproses ....<td><tr>');
          },

          success : function(xhr)
          {
            console.log(xhr.data);
            let result= '';
            let no = ((xhr.current_page-1)*xhr.per_page)+1;
            if (xhr.data.length>0) {
              $.each(xhr.data,function(d,i)
              {
              result += `<tr><td>${no++}</td><td>${i.tahun}</td><td>${i.jum_kasus}</td></tr>`;

            })
            }else{
              result = "<tr> <td class='text-center' colspan='7'>Tidak ada hasil<td><tr>";
            }
            $("#result").html(result);
         
          }
        })
       }
    </script>