<?php 
    class taoKyThiView{

        private $data; // danh sach cac ky thi
        private $toJson;
        
        public function __construct($data) {
            $this->data = $data;
            $this->toJson = json_encode($data);
        }

        
        public function view(){
            $html=null;
            $html .= "<h1> Tạo lịch thi</h1>";
            $html .= '<div>
            <form id="taocathi-form">
            <table>
            <tr>
            <th>
            Chọn môn:
            </th>
            <th>
            <select name="mahp" id="mahp">';

            foreach ($this->data as $r) {
                //$val = json_encode($r);
                $html .= '<option value='.$r["MAHP"].'>'.$r["MAHP"]."   ".$r["TENHP"].'</option>';
            }

            
            $html .='</select>
            </th>
            </tr>';
            $html .='<tr><th>Nhập mã kỳ thi: </th><th><input type="text" placeholder="Mã kỳ thi" name="makythi" id="makythi" required></th></tr>
            <tr><th>Chọn lịch thi:</th><th><input id="lichthi" type="datetime-local" name="lichthi" required></th></tr>
            <tr><th>Nhập số lượng: </th><th><input type="number" placeholder="Số lượng" name="soluong" id="soluong" required></th></tr>
            <tr><th>Nhập phòng thi: </th><th><input type="text" placeholder="Phòng thi" name="phongthi" id="phongthi" required></th></tr>
            <tr><th></th><th><input type="submit" value="Tạo lịch thi"></th></tr></table>
          </form>
          
            </div>
            ';
            echo $html;
        }

        
        
    }
?>
