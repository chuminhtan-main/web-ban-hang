<div>
    <form action="/doan/CPU/ThemCPU" method="post">
  <div class="form-group">
    <label for="CPU">Tên CPU</label>
    <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên CPU" name="CPU" required>
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
<!-- Danh sách CPU -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Mã CPU</th>
      <th scope="col">Tên CPU</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
      if (isset($data["dsCPU"])) {
        //print_r($data["dsCPU"]);
        $stt = 1;
        foreach ($data["dsCPU"] as $CPU) {
      ?>
          <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $CPU['TEN_CPU'] ?></td>
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