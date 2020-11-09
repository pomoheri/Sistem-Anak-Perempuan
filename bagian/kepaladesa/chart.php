<?php

mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("satgas") or die(mysql_error());
$nmbln = ['2018','2019','2020'];

for($bulan = 0;$bulan < 4;$bulan++)
{
  $tahun=$nmbln[$bulan];
   
  $query = mysql_query("SELECT count(idkasus) AS total,YEAR(tglkas) as tahun FROM datkas WHERE YEAR(tglkas)='$tahun'");
  $row = mysql_fetch_array($query);
  $query1 = mysql_query("SELECT count(idkasus) AS total,YEAR(tgltin) as tahun FROM dattin WHERE YEAR(tgltin)='$tahun'");
  $row1 = mysql_fetch_array($query1);
  

  $jumlahkasus[] = $row['total'];
  $jumlahtindakan[] = $row1['total'];
 
}
?>

  <script>
    var ctx = document.getElementById("barkejadian").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($nmbln); ?>,
        datasets: [{
          label: 'Jumlah Kejadian',
          data: <?php echo json_encode($jumlahkasus); ?>,
           backgroundColor: [
                'rgba(60,141,188,0.4)',
                'rgba(60,141,188,0.4)',
                'rgba(60,141,188,0.4)'
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)'

              ],
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById("bartindakan").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($nmbln); ?>,
        datasets: [{
          label: 'Jumlah Tindakan',
          data: <?php echo json_encode($jumlahtindakan); ?>,
           backgroundColor: [
                'rgba(60,141,188,0.4)',
                'rgba(60,141,188,0.4)',
                'rgba(60,141,188,0.4)'
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)'

              ],
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById("bartindakankat").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Anak-anak", "Perempuan"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_anak = mysql_query("select * from datkas where kategori='anak-anak'");
          echo mysql_num_rows($jumlah_anak);
          ?>, 
          <?php 
          $jumlah_perempuan = mysql_query("select * from datkas where kategori='perempuan'");
          echo mysql_num_rows($jumlah_perempuan);
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
        }]
      }
    });
  </script>