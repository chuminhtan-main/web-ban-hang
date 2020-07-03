<div>
    <form action="/doan/RAM/ThemRAM" method="post">
  <div class="form-group">
    <label for="RAM">Bộ nhớ</label>
    <input type="text" class="form-control" id="ten-hang-sx" placeholder="Dung lượng bộ nhớ..." name="RAM" required>
  </div>

  <button type="submit" class="btn btn-primary">Tạo Mới</button>
  <p>
  <?php if(isset($data["kq"])){ ?>
      <?php
      if( $data["kq"])
      echo "Tạo thành công";
      else
        echo "Không thành công";
  ?>
  <?php } ?>
  </p>
</form>
</div>
<!-- Danh sách RAM -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Mã RAM</th>
      <th scope="col">RAM</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
      if (isset($data["dsRAM"])) {
        //print_r($data["dsCPU"]);
        $stt = 1;
        foreach ($data["dsRAM"] as $RAM) {
      ?>
          <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $RAM['BO_NHO'].' GB' ?></td>
            <td>
              <button type="button" class="btn btn-danger btn-thao-tac">Xóa</button>
              <button type="button" class="btn btn-warning btn-thao-tac">Chỉnh Sửa</button>
            </td>
          </tr>
      <?php
          $stt++;
        }
      }
      ?>
  </tbody>
</table>