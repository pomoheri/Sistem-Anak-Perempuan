<table width="100%" class="table table-striped table-bordered table-hover data">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM datwg JOIN datrt ON datrt.idrt=datwg.idrt ORDER BY nik");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Kelamin</th>
                                                        <th>Tgl Lahir</th>
                                                        <th>Pendidikan</th>
                                                        <th>Alamat</th>
                                                        <th>Status Keb</th>
                                                        <th>RT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                while($user_data = mysql_fetch_array($result)){
                                                  echo "
                                                  <tr>
                                                    <td>".$no++."</td>
                                                    <td>".$user_data['nik']."</td>
                                                    <td>".$user_data['nama']."</td>
                                                    <td>".$user_data['kelamin']."</td>
                                                    <td>".$user_data['tglh']."</td>
                                                    <td>".$user_data['pendd']."</td>
                                                    <td>".$user_data['alamat']."</td>
                                                    <td>".$user_data['stkeb']."</td>
                                                    <td>".$user_data['idrt']."</td>
                                                  ";
                                               ?>
                                                </tr>
                                                 <?php }?> 
                                                </tbody>
                                            </table>