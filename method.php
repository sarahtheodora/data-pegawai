    <?php

    require_once('koneksi.php');

    class Method {
        public function get_mhss(){
            global $mysqli;
            $query = "SELECT * FROM tbl_mahasiswa";
            $data = array();
            $result = $mysqli->query($query);

            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }

            $response = array(
                'status' => 200,
                'message' => 'Get List Mahasiswa Successfully',
                'data' => $data
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function get_mhs($id){
            global $mysqli;
            $query = "SELECT * FROM tbl_mahasiswa WHERE id = ".$id." LIMIT 1 ";
            $data = array();
            $result = $mysqli->query($query);

            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }

            $response = array(
                'status' => 200,
                'message' => 'Get List Mahasiswa Successfully',
                'data' => $data
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function insert_mhs(){
            global $mysqli;
            $arrcheckpost = array(
                'nim' => '',
                'nama' => '',
                'jk' => '',
                'alamat' => '',
                'jurusan' => ''
            );

            $hitung = count(array_intersect_key($_POST, $arrcheckpost));

            if($hitung == count($arrcheckpost)){
                $result = $mysqli->query("INSERT INTO tbl_mahasiswa (nim, nama, jk, alamat, jurusan) VALUES ('".$_POST['nim']."', '".$_POST['nama']."','".$_POST['jk']."', '".$_POST['alamat']."', '".$_POST['jurusan']."')");

                if($result){
                    $response =array(
                        'status' => 200,
                        'message' => 'Mahasiswa Added Successfully'
                    );
                }
    
                else{
                    $response =array(
                        'status' => 400,
                        'message' => 'Failed to Add Mahasiswa'
                    );
                }
            }

            else{
                $response =array(
                    'status' => 400,
                    'message' => 'PARAMETER MISSING'
                );
            }

            header('Content-Type: application/json');
            echo json_encode($response);
            
        }

        public function update_mhs($id){
            global $mysqli;
            $arrcheckpost = array(
                'nim' => '',
                'jk' => '',
                'alamat' => '',
                'jurusan' => ''
            );

            $hitung = count(array_intersect_key($_POST, $arrcheckpost));

            if($hitung == count($arrcheckpost)){
                $result = $mysqli->query("UPDATE tbl_mahasiswa SET nim = '".$_POST['nim']."', jk = '".$_POST['jk']."', alamat = '".$_POST['alamat']."', jurusan = '".$_POST['jurusan']."' WHERE id = ".$id);

                if($result){
                    $response =array(
                        'status' => 200,
                        'message' => 'Mahasiswa Updated Successfully'
                    );
                }
    
                else{
                    $response =array(
                        'status' => 400,
                        'message' => 'Failed to Update Mahasiswa'
                    );
                }
            }

            else{
                $response =array(
                    'status' => 400,
                    'message' => 'PARAMETER MISSING'
                );
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function delete_mhs($id){
            global $mysqli;
            $query = "DELETE FROM tbl_mahasiswa WHERE id = ".$id;
            if($mysqli->query($query)){
                $response = array(
                    'status' => 200,
                    'message' => 'Mahasiswa Deleted Successfully'
                );
            }

            else{
                $response = array(
                    'status' => 400,
                    'message' => 'Failed to Delete Mahasiswa'
                );
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function patch_mhs($id){
            global $mysqli;
            $arrcheckpost = array(
                'jurusan' => ''
            );

            $hitung = count(array_intersect_key($_POST, $arrcheckpost));

                $result = $mysqli->query("UPDATE tbl_mahasiswa SET jurusan = '".$_POST['jurusan']."' WHERE id = ".$id);

                if($result){
                    $response =array(
                        'status' => 200,
                        'message' => 'Mahasiswa Updated Successfully'
                    );
                }
    
                else{
                    $response =array(
                        'status' => 400,
                        'message' => 'Failed to Update Mahasiswa'
                    );
                }

            header('Content-Type: application/json');
            echo json_encode($response);

        }

        
    }

    ?>